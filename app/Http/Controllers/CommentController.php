<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function index(){
        $comments=Comment::all();
        return view('comments.index');

    }

    public function create(){

    }

    public function store(CommentRequest $request){

        $data=$request->all();
        Comment::create($data);
        return redirect(route('site.welcome'));
    }

    public function delete($id){
        $comment=Comment::find($id);
        $comment->delete();
        return redirect(route('comments.index'));

    }

}
