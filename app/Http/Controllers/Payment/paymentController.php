<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Model\KTC;
use App\Model\Price;

class paymentController extends Controller
{

    public function payment_form(Request $request)
    {
        $status = $request->status;
        return view('payment.payment_form', compact('status'));
    }

    public function payment_confirm(Request $request)
    {

        $input = $request->all();
        $currentDate = date('M d, Y');

        $selectId = DB::table('ktc_order')
            ->select('*')
            ->where('id', '=', $input['id'])
            ->first();

        if (empty($selectId)) {
            $order_id = DB::table('ktc_order')
                ->latest()
                ->first();

            $run_order = sprintf("%09d", $order_id->order_id + 1);

            DB::table('ktc_order')
                ->insert([
                    'id' => $input['id'],
                    'order_id' => $run_order,
                    'package' => $input['package'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'pay_type' => $input['payMethod']
                ]);
        } else {
            $run_order = sprintf("%09d", $selectId->order_id);
        }

        switch($input['package']){
            case "gold": 
                $discount = 1500.00;
            break;
            case "platinum": 
                $discount = 3100.00;
            break;
            case "extra": 
                $discount = 1050.00;
            break;
        }

        $expire_date = date("Y-m-d H:i:s", strtotime("+7 day"));

        DB::table('users')
            ->where('id', $input['id'])
            ->update([
                'status' => 'wait',
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'address' => $input['address'],
                'expire_date' => $expire_date,
            ]);

        $data = [
            'id' => $input['id'],
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

    public function payment_success(Request $request)
    {

        DB::table('ktc_order')
            ->where('order_id', '=', $request->Ref)
            ->update([
                'success_code' => '1',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $ref_id = DB::table('ktc_order')
            ->select('success_code')
            ->where('success_code', '=', '1')
            ->count();

        $order_ref = DB::table('ktc_order')
            ->select('*')
            ->where('order_id', '=', $request->Ref)
            ->where('success_code', '=', '1')
            ->first();

        if ($order_ref->success_code == "1") {
            DB::table('ktc_order')
                ->where('order_id', '=', $request->Ref)
                ->update([
                    'order_ref' => sprintf("%09d", $ref_id),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

            if ($order_ref->package == "gold") {
                $expire_date = date("Y-m-d H:i:s", strtotime("+30 day"));
                DB::table('point')
                    ->where('user_id', $order_ref->id)
                    ->update([
                        'writing_point' => 3,
                        'speaking_point' => 2,
                        'club_point' => 0,
                        'tutorial_point' => 0,
                    ]);
            } elseif ($order_ref->package == "platinum") {
                $expire_date = date("Y-m-d H:i:s", strtotime("+44 day"));
                DB::table('point')
                    ->where('user_id', $order_ref->id)
                    ->update([
                        'writing_point' => 5,
                        'speaking_point' => 3,
                        'club_point' => 1,
                        'tutorial_point' => 1,
                    ]);
            }else{
                $expire_date = date("Y-m-d H:i:s", strtotime("+14 day"));
                DB::table('point')
                ->where('user_id', $order_ref->id)
                ->update([
                    'club_point' => 1,
                    'tutorial_point' => 1,
                ]);
            }

            DB::table('users')
                ->where('id', $order_ref->id)
                ->update([
                    'status' => 'paid',
                    'level' => $order_ref->package,
                    'expire_date' => $expire_date,
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);

            return redirect('payment_receipt');

        } else {

            return redirect('payment_fail');

        }
    }

    public function receipt()
    {
        $user = Auth::user();
        // $data = array(
        //     'subject' => "Online IELTS Tips & Practice",
        //     'first_name' => $user->first_name,
        //     'last_name' => $user->last_name,
        //     'expire_date' => date('M d Y', strtotime($user->expire_date)),
        //     'level' => $user->level,
        // );
        // Mail::to($user->email)->send(new SendMail($data));

        $currentDate = date('M d, Y');

        // dd($currentDate);

        $ktc = KTC::get_data_ktc($user->id);
        $price = Price::get_price($user->level);
        $data = [
            'id' => $user->id,
            'orderRef' => $ktc->order_id,
            'orderReceipt' => $ktc->order_ref,
            'amount' => number_format($price->price,2),
            'currentDate' => $currentDate,
            'package' => $user->level,
            'address' => $user->address,
        ];

        return view('payment.receipt', compact('data'));
    }

    public function send_mail()
    {
        $user = Auth::user();
        $data = array(
            'subject' => "Online IELTS Tips & Practice",
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'expire_date' => date('M d Y', strtotime($user->expire_date)),
            'level' => $user->level,
        );
        Mail::to($user->email)->send(new SendMail($data));
        return redirect('user_home');
    }

}
