
                      <h5><span class="cft">Seller's Name:</span><span>{{$sellcoin->User->firstname}}&nbsp&nbsp{{$sellcoin->User->lastname}}</span> </h5>
                      <h5><span class="cft">Buyer's Id:</span><span>{{$sellcoin->wallet_id}}</span> </h5>
                      <h5><span class="cft">Amount BTC:</span><span>{{$sellcoin->amount_btc}}</span> </h5>
                      <h5><span class="cft">Amount USD:</span><span>{{number_format($sellcoin->amount_dollar,2)}}</span> </h5>
                      <h5><span class="cft">Rate:</span><span>{{$sellcoin->rate}}</span> </h5>
                      <h5><span class="cft">Amount NGN:</span><span>{{number_format($sellcoin->amount_dollar*$sellcoin->rate,2)}}</span> </h5>
                      <h5><span class="cft">Escrow fee:</span>{{number_format(($sellcoin->amount_dollar*$sellcoin->rate)*0.0075,2)}}<span></span> </h5>
                      </div>
                      <span class="offset-lg-3"><a href="#"><button class="btn btn-primary">Confirm</button></a>  <a href="#"><button class="btn btn-primary">Cancel</button></a></span>
         
  
 