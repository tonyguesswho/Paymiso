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

    public function Test(){
        $amounts = 0.005;
        $fromAddresses = '2MwVMPoyaTZUrgj49xB3BcL8aA1hYrSzp64';
        $toAddresses = '2NGSUqgRbrb8yxHW2FctyJdWhPNVtWoSbNs';
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
