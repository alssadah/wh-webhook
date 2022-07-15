<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Command;
use App\Models\CommandText;
use Illuminate\Http\Request;
class ContentController extends Controller
{
    public $data;
    public function index()
    {
//        $this->data['commands'] =Command::paginate(2);
        $this->data['commands'] =Command::paginate(20);
        return view('index',$this->data);
    }

    public function ClientMsg()
    {
        $this->data['messages'] =Client::select("id","message","number")->get()->unique("number");
//        dd($this->data['messages']);
        return view('clientMsg',$this->data);
    }

    public function commandStatus($id,$status)
    {
         Command::where('command_id',$id)->update(['status' => $status==1?$status=0:$status=1]);
//         return redirect()->route('index');
        return redirect('/index')->with('status', 'تم تحديث الحاله!');
    }

    public function commandStrict($id,$strict)
    {
        Command::where('command_id',$id)->update(['strict' => $strict==1?$strict=0:$strict=1]);

        return redirect('/index')->with('status', 'تم تحديث النمط!');
    }


    public function add()
    {
        $this->data['replies']=Command::select('command_reply','command_id')->get();
        return view('addCommand',$this->data);
    }


    public function insertReply(Request $request)
    {
//        dd($request->all());
        for ($i = 0; $i < count($request->command); $i++) {
            $answers[] = [
                'command_name' => $request->command[$i],
                'command_reply' => $request->reply,
                'status' => 1,
                'lang' => $request->lang
            ];
        }

        Command::insert($answers);

        return redirect('/add')->with('status', 'تم إضافه الأمر!');
    }


    public function insertCommand(Request $request)
    {
        CommandText::insert(['command_id'=>$request->replyId,'content'=>$request->commandOptions,'status'=>'1']);

        return redirect('/add')->with('status', 'تم إضافه الأمر!');
    }

    public function delCommand($id)
    {
//        dd($id);
        Command::where('command_id',$id)->delete();
        return redirect('/index')->with('status', 'تم حذف الأمر!');
    }
}
