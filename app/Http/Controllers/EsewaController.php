<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EsewaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('verified');

    }

    // function to return esewa payment success message
    public function esewaPaymentSuccess(Request $request){
        $url = config('payment.esewa.verify_url');
        $pid = $request->oid;
        $amt = $request->amt;
        $rid = $request->refId;
        $scd = config('payment.esewa.scd');
        if ($amt != null && $pid != null && $rid != null && $scd != null) {
            $response = $this->esewaPaymentVerification($amt, $scd, $rid, $pid, $url);
            if ($response) {
                $payment = Payment::firstOrCreate(
                    ['payment_id' => $pid],
                    ['payment_channel' => 'ESEWA', 
                     'payee_id'        => Auth::user()->id,
                     'merchant_code'   => $scd,
                     'amount'          => $amt,
                     'total_amount'    => $amt,
                     'reference_code'  => $rid
                    ]
                );
                return view('user.payment.esewa-payment-success');
            }else{
                return view('user.payment.esewa-payment-failed');
            }
            
        }else{
            abort(500);
        }
    }
    //function to verify payment details
    public function esewaPaymentVerification($amt, $scd, $rid, $pid, $url){
        $data =[
            'amt'=> $amt,
            'scd'=> $scd,
            'rid'=> $rid,
            'pid'=> $pid,
        ];
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $response_object = new \SimpleXMLElement($response);
        $status = strcmp(strtoupper(trim($response_object->response_code->__toString())), 'SUCCESS');
        return !$status;
    }


    //function to return esewa payment failure message
    public function esewaPaymentFailed(){
        return view('user.payment.esewa-payment-failed');
    }
}
