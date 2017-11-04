@extends('dashboard.market')

@section('content')
<div class="container ">
    <div class="panel-group" id="faqAccordion">
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: How does Paymiso work?</a>
              </h4>

            </div>
            <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary">Answer</span></h5>

                    <p>Paymiso enables sellers/buyers of bitcoin to trasact secuerly</p>
                    <ul>
                        <li>Seller creates and funds his/her Paymiso bitcoin wallet</li>
                        <li>Seller starts the trasaction and the details are sent to the buyer</li>
                        <li>Buyer confirms the details and makes payment via our payment gateway</li>
                        <li>Buyer instantly gets bitcoin funds in his/her wallet</li>
                        <li>Seller can withdraw from his/her paymiso dashboard instantly</li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: Is there any trasactional cost?</a>
              </h4>

            </div>
            <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary">Answer</span></h5>

                    <p>Paymiso charges 0.75% escrow fee from the transacting parties</p>
                </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: What is network fee?</a>
              </h4>

            </div>
            <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary">Answer</span></h5>

                    <p>The network fee is a very small fee charged by the bitcoin network for the 
                      miners in other to enable smooth transfer of bitcoin between wallets</p>
                </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: Who bears the cost of the network fee?</a>
              </h4>

            </div>
            <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary">Answer</span></h5>

                    <p>The network is fee is deducted from the wallet of the bitcoin seller i.e
                     the seller is responsible for providing enough funds
                      needed to complete the trasaction inclusive of network fee  </p>
                </div>

            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: How can i know the network fee?</a>
              </h4>

            </div>
            <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary">Answer</span></h5>

                    <p>Paymiso provides an estimated network fee, which in most cases will be higher than the actual network fee that you will be eventually charged.This is 
                    to account for fluctuations in network fees  </p>
                </div>

            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: Am i paying the actual network fee or the estimated network fee?</a>
              </h4>

            </div>
            <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary">Answer</span></h5>

                    <p>The network fee is not a paymiso charge so you get to pay the actual network fee.Paymiso 
                      provides the estimated network fee just to make sure there is enough funds in the seller 
                      account even if there is fluctuation in the network fee after some hours  </p>
                </div>

            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: How long does a trasaction last?</a>
              </h4>

            </div>
            <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary">Answer</span></h5>

                    <p>An escrow transaction is open for one(1) hour i.e the buyer is 
                      expected to pay in an hour or the transaction will be closed   </p>
                </div>

            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: As a seller how can i get my money?</a>
              </h4>

            </div>
            <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary">Answer</span></h5>

                    <p>Sellers can withdraw their cash from their dashboard.
                      The amount will be trasanfered to any Nigerian bank account </p>
                </div>

            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: How can i get more information?</a>
              </h4>

            </div>
            <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h5><span class="label label-primary">Answer</span></h5>

                    <p>Reach out to us via support@paymiso.com with further enquiry. </p>
                </div>

            </div>
        </div>
        
    </div>
    <!--/panel-group-->
</div>
@endsection