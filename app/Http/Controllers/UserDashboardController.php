<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use MyEscrow\SellCoin;
use MyEscrow\User;
use MyEscrow\Transaction;
use MyEscrow\BankDetail;
use MyEscrow\CreateAddress;
use MyEscrow\BlockIoTest;
use MyEscrow\ExchangeRate;
use MyEscrow\CancledMail;
use MyEscrow\MarketPlace;
use MyEscrow\withdrawal;
use MyEscrow\Mail\transactionEmail;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Mail;
use Send;
use Auth;
use Illuminate\Support\Str;

class UserDashboardController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

        // $btc_wallet_id = CreateAddress::where('user_id', Auth::User()->id)->first();
        // $btc_wallet = $btc_wallet_id->btc_wallet_id;

        // $btc_balance   = new BlockIoTest();
        // $balance  = $btc_balance->getbalance($btc_wallet);

        // $current_price = new BlockIoTest();
        // $current_price_usd = $current_price->CurrentPriceInUsd();

        // $ExchangeRate = new ExchangeRate();
        // $presentRateNaira   = $ExchangeRate->rate();

       // $cancel = CancledMail::where('user_id',Auth::User()->id)->get();
        $market = MarketPlace::where('user_id',Auth::User()->id)->get();

        $amount_balance = DB::table('authorizations')
                            ->where('authorizations.seller_id','=', Auth::User()->id)
                            ->select(DB::raw('sum(fee) as total'))
                            ->get();
        $amount_balance_total = $amount_balance['0']->total;


        $withdrawal =  DB::table('withdrawals')
                            ->where('withdrawals.user_id', '=', Auth::User()->id)
                            ->select(DB::raw('sum(amount) as total'))
                            ->get();
        $withdrawal_total  = $withdrawal['0']->total;

        $total_balance = $amount_balance_total - $withdrawal_total;

        // return view('dashboard.home',compact('btc_wallet_id','balance','current_price_usd','presentRateNaira','cancel','market', 'total_balance'));
         return view('dashboard.home');
    }

    public function sellCoinCreate(){

        $this->validate(request(),[
            'wallet_id'     => 'required',
            'buyer_email'   => 'required',
            'buyer_phone'   => 'required',
            'amount_dollar' => 'required',
            'amount_btc'    => 'required',
            'rate'          => 'required',
             ]);

            $amount_btc     = request('amount_btc');
            $amount         = request('amount_dollar');
            $amount_rate    = request('rate');
            $amount_naira   = $amount * $amount_rate;
            $escrow_fee     = $amount_naira * (0.75/100);

            $btc_wallet = CreateAddress::where('user_id', Auth()->User()->id)->first();
            $btc_wallet_id = $btc_wallet->btc_wallet_id;

            $btc_balance        = new BlockIoTest();
            $balance            = $btc_balance->getbalance($btc_wallet_id);
            $total_balance_btc  = $balance->data->available_balance;

            $client = new Client();
            $res = $client->get(
                'https://bitcoinfees.21.co/api/v1/fees/recommended'
                );
            $contents = $res->getBody()->getContents();
            $json = json_decode($contents);
            $jsonFee =  $json->fastestFee;
            $pendingFee = DB::table('transactions')
                    ->where([
                    ['transactions.user_id', '=', Auth::User()->id],
                    ['transactions.transaction_status', '=', 0],
                    ['transactions.transaction_token', '<>', Null]
                    ])
                    ->join('sell_coins','sell_coins.id','=','transactions.sell_coin_id')
                    ->select(DB::raw('sum(amount_btc) as total'), DB::raw('count(amount_btc) as count'))
                    ->get();
                 
        $pendingFee_total       = $pendingFee['0']->total;
        $pendingFee_count       = $pendingFee['0']->count * $jsonFee * 226 * 0.00000001;
        $pendingFeeTotalAmount  = $pendingFee_total + $pendingFee_count;
        $total_amount_btc       = $pendingFeeTotalAmount + ($amount_btc + ($jsonFee * 226 * 0.00000001));

        if ($total_balance_btc > $total_amount_btc) {

            return bacK()->withErrors([
                'insufficient fund'
                ]);
        }else{

            $sellCoin =  SellCoin::create([
            'user_id'       => Auth::User()->id,
            'wallet_id'     => request('wallet_id'),
            'buyer_email'   => request('buyer_email'),
            'buyer_phone'   => request('buyer_phone'),
            'amount_dollar' => request('amount_dollar'),
            'amount_btc'    => request('amount_btc'),
            'rate'          => request('rate')         
            ]);
                      
          $sellCoins = $sellCoin->id;
          $transaction= Transaction::create([    
         'sell_coin_id' =>$sellCoins,
         'user_id'      => Auth::User()->id,
         'transaction_token'=>Str::random(22), 
             ]); 

          $user = SellCoin::where('user_id', Auth::user()->id)->latest()->first();
            return view('dashboard.confirmpage',compact('user', 'amount_naira', 'escrow_fee'));
        }
           
    }

    public function editConfirm(){
        $user = SellCoin::where('user_id',Auth::user()->id)->latest()->first();
        
        return view('dashboard.confirmEditPage',compact('user'));
    }

    public function updateConfirm(){

        $sellcoin = SellCoin::where('user_id',Auth::user()->id)->latest()->first();
        $id = $sellcoin->id;
            $wallet_id     = input::get('wallet_id');
            $buyer_email   = input::get('buyer_email');
            $buyer_phone   = input::get('buyer_phone');
            $amount_dollar = input::get('amount_dollar');
            $amount_btc    = input::get('amount_btc');
            $rate          = input::get('rate');

            $amount_btc     = request('amount_btc');
            $amount         = request('amount_dollar');
            $amount_rate    = request('rate');
            $amount_naira   = $amount * $amount_rate;
            $escrow_fee     = $amount_naira * (0.75/100);

            $btc_wallet = CreateAddress::where('user_id', Auth()->User()->id)->first();
            $btc_wallet_id = $btc_wallet->btc_wallet_id;

            $btc_balance        = new BlockIoTest();
            $balance            = $btc_balance->getbalance($btc_wallet_id);
            $total_balance_btc  = $balance->data->available_balance;

            $client = new Client();
            $res = $client->get(
                'https://bitcoinfees.21.co/api/v1/fees/recommended'
                );
            $contents = $res->getBody()->getContents();
            $json = json_decode($contents);
            $jsonFee =  $json->fastestFee;

            $pendingFee = DB::table('transactions')
                    ->where([
                    ['transactions.user_id', '=', Auth::User()->id],
                    ['transactions.transaction_status', '=', 0],
                    ['transactions.transaction_token', '<>', Null]
                    ])
                    ->join('sell_coins','sell_coins.id','=','transactions.sell_coin_id')
                    ->select(DB::raw('sum(amount_btc) as total'), DB::raw('count(amount_btc) as count'))
                    ->get();

        $pendingFee_total       = $pendingFee['0']->total;
        $pendingFee_count       = $pendingFee['0']->count * $jsonFee * 226 * 0.00000001;
        $pendingFeeTotalAmount  = $pendingFee_total + $pendingFee_count;
        $total_amount_btc       = $pendingFeeTotalAmount + ($amount_btc + ($jsonFee * 226 * 0.00000001));

        if ($total_balance_btc > $total_amount_btc) {

            return bacK()->withErrors([
                'insufficient fund'
                ]);
        }else{

        $user = SellCoin::where('id',$id)->update([
            'wallet_id'         => $wallet_id,
            'buyer_email'       => $buyer_email,
            'buyer_phone'       => $buyer_phone,
            'amount_dollar'     => $amount_dollar,
            'amount_btc'        => $amount_btc,
            'rate'              => $rate
            ]);
          $user = SellCoin::where('user_id', Auth::user()->id)->latest()->first();
            return view('dashboard.confirmpage',compact('user', 'amount_naira', 'escrow_fee'));
        }
    }

    public function history(){

        return view('dashboard.history');
    }


    public function bankDetails(){
        $withdraw = BankDetail::where('user_id', Auth::User()->id)->first();

        return view('dashboard.bank_details', compact('withdraw'));
    }

    public function bankDetailsCreate(){
        $this->validate(request(),[
            'bank_name'     => 'required',
            'account_name'  => 'required',
            'account_number' => 'required' 
            ]);
       $bankDetail = BankDetail::where('user_id', Auth::User()->id)->update([
            'bank_name'     => request('bank_name'),
            'account_name'  => request('account_name'),
            'account_number' => request('account_number'),
            ]);
        return redirect('/userDashboard')->with('status', 'Bank details have been saved');

    }

    public function withdrawCash(){

       $withdraw = BankDetail::where('user_id', Auth::User()->id)->first();
       
        return view('dashboard.withdraw', compact('withdraw'));
    }

    public function createWithdrawal(){
        $this->validate(request(),[
            'bank_name'     => 'required',
            'account_name'  => 'required',
            'account_number' => 'required', 
            'amount'        => 'required'
            ]);

        $amount_balance = DB::table('authorizations')
                            ->where('authorizations.seller_id','=', Auth::User()->id)
                            ->select(DB::raw('sum(fee) as total'))
                            ->get();
        $amount_balance_total = $amount_balance['0']->total;

        $withdrawal =  DB::table('withdrawals')
                            ->where('withdrawals.user_id', '=', Auth::User()->id)
                            ->select(DB::raw('sum(amount) as total'))
                            ->get();
        $withdrawal_total  = $withdrawal['0']->total;
        $amount = request('amount');
        $total = $amount_balance_total - $withdrawal_total;

        if ($total < $amount) {
            return back()->with('status', 'insufficient fund');
        }else{
                withdrawal::create([
                    'bank_name'     => request('bank_name'),
                    'account_name'  => request('account_name'),
                    'account_number'=> request('account_number'),
                    'amount'        => request('amount'),
                    'user_id'       => Auth::User()->id
                    ]);
                return redirect('/userDashboard')->with('status', 'your money will sent soon');
        }
        
    }

    public function sellCoin(){
        
        return view('dashboard.sell');
    }

    public function transactionMail(){

        $sellcoin = SellCoin::where('user_id', Auth::User()->id)->latest()->first();

        Mail::to($sellcoin['buyer_email'])->send(new transactionEmail($sellcoin));
        
        return redirect('/userDashboard')->with('status', 'Comfirmation email has been sent successfully');

    }
}
