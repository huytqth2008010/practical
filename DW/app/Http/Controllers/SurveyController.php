<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function comment(Request $request){
        $request->validate([
            "name"=>"required",
            "email"=>"required|email",
            "phone"=>"required",
            "comment"=>"required"
        ],[
            "name.required"=>"Vui lòng nhập tên sinh viên",
            "email.required"=>"Vui lòng nhập email sinh viên",
            "phone.required"=>"Vui lòng nhập số điện thoại của sinh viên",
            "comment.required"=>"Vui lòng nhập nhận xét : .!",
        ]);
        Comment::create([
            "name"=>$request->get("name"),
            "email"=>$request->get("email"),
            "phone"=>$request->get("phone"),
            "comment"=>$request->get("comment")
        ]);

        return redirect()->back()->with('success','Bạn đã gửi ý kiến thành công.!');
    }
}
