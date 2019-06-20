<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class TopupController extends Controller
{
    public function topupPayment(Request $request)
    {

        // // return 'hilo gudmorneng ' . $request->input('paymentAmount');
        // if($request->input('paymentAmount') =='custom'){
        //     return 'hilo gudmorneng ' . $request->input('paymentAmountCustom');
            
        // } else {
            
        //     return 'hilo gudmorneng ' . $request->input('paymentAmount');
        // }
        $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    'AV4pZ8l9kaSH4vHa3AMW-Rh1PgWAWMSmOPlnzmu-4QtqNdLVZTuHsdhQpMbHzeePYcPh4HQWa1I2WcCd',     // ClientID
                    'EG4ClaUzceHcRyA91H5e3E6igZm95salJB1pk3Zo9HGWmELn6A4tuKmtzeUwU2f8b2-Y7NZvVLZul8w-'      // ClientSecret
                )
        );        
        // return 'hilo gudmorneng ' . $request->input('paymentAmount');
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName('Topup Amount')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Topup Amount 2')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setSku("321321") // Similar to `item_number` in Classic API
            ->setPrice(2);
        
        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));

        $details = new Details();
        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);
            
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(20)
            ->setDetails($details);            

            
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());  
            
        // $baseUrl = getBaseUrl();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('/reseller/topup/success'))
            ->setCancelUrl(route('/reseller/topup/cancel'));        

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
            
        $payment->create($apiContext);            
                
        // return $approvalUrl = $payment->getApprovalLink();
        return redirect($approvalUrl = $payment->getApprovalLink());
        // $approvalUrl = $payment->getApprovalLink();
        // return $payment;
            
    }
    public function executePayment()
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AV4pZ8l9kaSH4vHa3AMW-Rh1PgWAWMSmOPlnzmu-4QtqNdLVZTuHsdhQpMbHzeePYcPh4HQWa1I2WcCd',     // ClientID
                'EG4ClaUzceHcRyA91H5e3E6igZm95salJB1pk3Zo9HGWmELn6A4tuKmtzeUwU2f8b2-Y7NZvVLZul8w-'      // ClientSecret
            )
        ); 
        // return request('paymentId');
        $paymentId = request('paymentId');
        // $payment = Payment::get($paymentId, $apiContext);

        // $excecution = new PaymentExecution();
        // $excecution->setPayerId(request('PayerID'));
        return redirect()->back()->with('success', "Topup Success. Payment ID: $paymentId");

    }

    public function cancelPayment(){
        return redirect()->back()->with('error', 'Topup Cancelledt');
        // return 'topup canceledt';
    }
    public function execute()
    {
        return request('paymentId');
    }
    public function dragonPayTest()
    {
        return view('testing.dragonpayTest');
    }

}
