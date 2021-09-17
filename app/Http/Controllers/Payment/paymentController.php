<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class paymentController extends Controller
{

    public function payment_form(Request $request){
        $status = $request->status;
        return view('payment.payment_form', compact('status'));
    }

    public function payment_confirm(Request $request){

        $input = $request->all();
        $currentDate = date('M d, Y');

        // dd($input);

        $order_id = DB::table('ktc_order')
        ->latest()
        ->first();

        $run_order = sprintf("%09d",$order_id->order_id+1);

        if($request->package == 'gold'){
            $discount = 1500.00;
        }else{
            $discount = 3100.00;
        }

        DB::table('ktc_order')
        ->insert([
            'id' => $request->id,
            'order_id' => $run_order,
            'order_ref' => $run_order,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')
        ->where('id', $request->id)
        ->update([
            'level' => $request->package,
            'status' => 'wait',
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        
        $data = [
           'id' =>  $input['id'],
           'orderRef' => $run_order,
           'amount' => $input['orderRef'],
           'currentDate' => $currentDate,
           'package' => $input['package'],
           'address' => $input['address'],
           'discount' => $discount,
           'payMethod' => $input['payMethod'],
        ];

        return view('payment.payment_confirm', compact('data'));
    }

    public function check_data_payment()
    {

        $user = Auth::user();
        $created_at = str_split(strval($user->created_at),10);

        // // dd(date("Y-m-d", strtotime("+1 month", $created_at)));

        $time = strtotime($created_at[0]);
        $date = date("Y-m-d", strtotime("+1 month", $time));
        $expire_date = $date .$created_at[1];

        return view('payment.send_email', compact('user','expire_date'));
    }

    public function send_email_payment(Request $request)
    {
        $data = array(
            'subject'=>"User Detail",
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'username'=>$request->get('username'),
            'expire_date'=>$request->get('expire_date'),
            'package'=>$request->get('level'),
            'created_at'=>$request->get('created_at'),
        );
        Mail::to($request->get('email'))->send(new SendMail($data));
        DB::update('update users set expire_date = ? where id = ?', [$request->get('expire_date'),$request->get('id')]);
        return redirect('user_home');
    }

}
