<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;  // ファサードを読み込み
use Carbon\Carbon;
use Illuminate\Http\Request; // requestには必要
use App\Mail\HelloEmail;



class mailController extends Controller
{
    public function send(Request $request)
    {
        // メールに表示する内容を設定
        $data = array();
        $data['to'] = $request['mailaddress'];
        $data['subject'] = $request['subject'];
        $data['text'] = $request['mailbody'];
        //toは送信先メールアドレス、bccには自分のアドレス
        Mail::to('xxxxx')->bcc('xxxx')->send(new HelloEmail($data));

        session()->flash('success', '送信いたしました！');
        return back();
        // return view('send',['text' => $data['text']]);
    }
    function getForm(){
        // $datetime = new Carbon();
        // $today = Carbon::today();
        // $subject = Carbon::now()->format('m/d');
        $subject = 'yyyy'.Carbon::now()->format('m/d');
        return view('mail',['subject' => $subject]);

    }
}