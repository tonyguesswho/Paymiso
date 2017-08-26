<?php

namespace MyEscrow\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use MyEscrow\SellCoin;
use MyEscrow\Transaction;
use MyEscrow\BankDetail;
use MyEscrow\CreateAddress;
use MyEscrow\BlockIoTest;
use MyEscrow\ExchangeRate;
use MyEscrow\CancledMail;
use MyEscrow\MarketPlace;
use MyEscrow\withdrawal;
use MyEscrow\Mail\transactionEmail;
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

        $btc_wallet_id = CreateAddress::where('user_id', Auth::User()->id)->first();
        $btc_wallet = $btc_wallet_id->btc_wallet_id;

        $btc_balance   = new BlockIoTest();
        $balance  = $btc_balance->getbalance($btc_wallet);

        $current_price = new BlockIoTest();
        $current_price_usd = $current_price->CurrentPriceInUsd();

        $ExchangeRate = new ExchangeRate();
        $presentRateNaira   = $ExchangeRate->rate();

        $cancel = DB::table('sell_coins')
                    ->join('users', 'users.id', '=', 'sell_coins.user_id')
                    ->join('cancled_mails', 'cancled_mails.sellcoin_id', '=', 'sell_coins.id') 
                    ->get();
        $market = MarketPlace::where('user_id',Auth::User()->id)->get();

        $amount_balance = DB::table('authorizations')
                            ->where('authorizations.seller_id','=', Auth::User()->id)
                            ->select(DB::raw('sum(fee) as total'))
                            ->get();

        $amount_balance_total = $amount_balance['0']->total;
    	return view('dashboard.home',compact('btc_wallet_id','balance','current_price_usd','presentRateNaira','cancel','market', 'amount_balance_total'));
    }

    public function sellcoin(){

        return view('dashboard.sell');
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
         'transaction_token'=>Str::random(22), 
             ]); 

         return redirect('/confirmTransaction') ;  

    }

    public function confirm(){
        $user = SellCoin::where('user_id', Auth::User()->id)->latest()->first();

        $amount_btc=$user->amount_btc;
        $btc_wallet_id=$user->wallet_id;

        $amount = $user->amount_dollar;
        $amount_rate = $user->rate;

        $amount_naira = $amount * $amount_rate;

        $escrow_fee = $amount_naira * (0.75/100);

        $btc_balance   = new BlockIoTest();
        $balance  = $btc_balance->getbalance($btc_wallet_id);
        $total_balance = $balance->data->available_balance;

        if ($total_balance < $amount_btc) {

            return bacK()->withErrors([
                'insufficient fund'
                ]);
        }else{

            return view('dashboard.confirmpage',compact('user', 'amount_naira', 'escrow_fee'));

        }
        //dd($networkFee);
        
         }

    public function editConfirm(){
        $user = sellCoin::where('user_id',Auth::user()->id)->latest()->first();
        
        return view('dashboard.confirmEditPage',compact('user'));
    }

    public function updateConfirm(){

        $sellcoin = sellCoin::where('user_id',Auth::user()->id)->latest()->first();
        $id = $sellcoin->id;
            $wallet_id     = input::get('wallet_id');
            $buyer_email   = input::get('buyer_email');
            $buyer_phone   = input::get('buyer_phone');
            $amount_dollar = input::get('amount_dollar');
            $amount_btc    = input::get('amount_btc');
            $rate          = input::get('rate');

        $user = SellCoin::where('id',$id)->update([
            'wallet_id'         => $wallet_id,
            'buyer_email'       => $buyer_email,
            'buyer_phone'       => $buyer_phone,
            'amount_dollar'     => $amount_dollar,
            'amount_btc'        => $amount_btc,
            'rate'              => $rate
            ]);
        return redirect('/confirmTransaction');
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
                            ->select(DB::raw('sum(account) as total'))
                            ->get();
        $withdrawal_total  = $withdrawal['0']->total;

        $amount = 'amount'
        
        $total = $amount_balance_total - $withdrawal_total;
        dd($total);
    }

    public function transactionMail(){

        $sellcoin = SellCoin::where('user_id', Auth::User()->id)->latest()->first();

        Mail::to($sellcoin['buyer_email'])->send(new transactionEmail($sellcoin));
        
        return redirect('/userDashboard')->with('status', 'Comfirmation email has been sent successfully');

    }
}
