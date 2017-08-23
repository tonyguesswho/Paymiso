<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use LaraBlockIo;
use Auth;
//use MyEscrow\CreateAddress;
use MyEscrow\SellCoin;


class BlockIoTest extends Model
{
    public function createWalletAddress(){
    	$random = Str::random('5');
    	return LaraBlockIo::createAddress($random);
    }

    public function SendCoin($id){
        $id;
        $sendcoin = SellCoin::where('id', $id)
                    ->join('create_addresses', 'create_addresses.user_id', '=', 'sell_coins.user_id')
                    ->get();

    	$amounts =  $sendcoin->amount_btc;
    	$fromAddresses = $sendcoin->btc_wallet_id;
    	$toAddresses = $sendcoin->wallet_id;


    	return LaraBlockIo::withdrawFromAddressesToAddresses($amounts, $fromAddresses, $toAddresses);
    }

    public function AddressInfo(){

    	return LaraBlockIo::getAddressesInfo();
    }

    public function GetUser(){

    	return LaraBlockIo::getUsers();
    }

    public function CurrentPriceInUsd(){

    	return LaraBlockIo::getCurrentPrice('USD');
    }

    public function getbalance($addresses){

        return LaraBlockIo::getAddressesBalanceByAddress($addresses);
    }

    public function NetworkFeeEstimate($amounts, $addresses){
        return LaraBlockIo::getNetworkFeeEstimate($amounts, $addresses);
    }
}
