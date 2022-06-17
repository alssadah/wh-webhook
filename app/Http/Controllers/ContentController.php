<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\CommandText;
use Illuminate\Http\Request;
class ContentController extends Controller
{
    public $data;
    public function index()
    {
        $this->data['commands'] =CommandText::all();
        return view('index',$this->data);
    }

    public function commandStatus($id,$status)
    {
         CommandText::where('id',$id)->update(['status' => $status==1?$status=0:$status=1]);
         return redirect()->route('index');
    }


    public function add()
    {
        $this->data['replies']=Command::select('command_reply','command_id')->get();
        return view('addCommand',$this->data);
    }


    public function insertReply(Request $request)
    {
        Command::insert(['command_name'=>$request->command,'command_reply'=>$request->reply,'lang'=>$request->lang,'status'=>1]);
        $get_id=Command::select('command_id')->where('command_name',$request->command)->first();
        CommandText::insert(['command_id'=>$get_id->command_id,'content'=>$request->command,'lang'=>$request->lang,'status'=>'1']);

        return back();
    }


    public function insertCommand(Request $request)
    {
        CommandText::insert(['command_id'=>$request->replyId,'content'=>$request->commandOptions,'status'=>'1']);

        return back();
    }

    public function delCommand($id)
    {
//        dd($id);
        CommandText::where('id',$id)->delete();
        return back();
    }
}
