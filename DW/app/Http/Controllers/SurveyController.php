<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function comment(Request $request){
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "phone"=>"required",
            "comment"=>"required"
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
