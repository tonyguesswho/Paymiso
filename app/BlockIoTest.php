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
        $sendcoin = SellCoin::find($id);
        $SellCoin_user_id = $sendcoin->user_id;

        $createAddress = CreateAddress::where('user_id', $SellCoin_user_id)->first();

    	$amounts = $sendcoin->amount_btc;
        $fromAddresses = $createAddress->btc_wallet_id;
    	$toAddresses = $sendcoin->wallet_id;

    	return LaraBlockIo::withdrawFromAddressesToAddresses($amounts, $fromAddresses, $toAddresses);

        return 'your coin will be sent in 20min';
    }

    public function sendInstantly($id,$wallet_id){
        $id;
        $fromAddresses = $wallet_id;
        $sendInstantly = SendInstantly::find($id);
        $amounts = $sendInstantly->amount_btc;
        $toAddresses = $sendInstantly->wallet_id;

        return LaraBlockIo::withdrawFromAddressesToAddresses($amounts, $fromAddresses, $toAddresses);

        return 'Transaction complete';
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
