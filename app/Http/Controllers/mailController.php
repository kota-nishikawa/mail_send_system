<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;  // ファサードを読み込み
use Carbon\Carbon;
use Illuminate\Http\Request; // requestには必要
use App\Mail\HelloEmail;
use App\Models\SpreadSheet;



class mailController extends Controller
{
    public function send(Request $request)
    {
        $spread_sheet = new SpreadSheet();

        // dd($request->all());

        $working_day = explode(" ", $request['working_day']);
        $working_day[0] = date('n月j日', strtotime($working_day[0]));
        $working_time =   explode("~", $working_day[1]);
        // スプレッドシートに格納するテストデータです
        $insert_data = [
            'start_time' => $working_time[0],
            'end_time' => $working_time[1],
            'working_day' => $working_day[0],
        ];

        $spread_sheet->insert_spread_sheet($insert_data);

        メールに表示する内容を設定
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
        $subject = Carbon::now()->format('m/d');
        $working_day = Carbon::now()->format('m/d');
        return view('mail',['subject' => $subject,'working_day' => $working_day]);

    }
}