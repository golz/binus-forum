<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Reply;
use App\Thread;
use App\Topic;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchAll(Request $request, $id){
        $data = $request->all();
        $topic = Topic::find($id);

        $validator = Validator::make($data, [
            'keyword' => 'required|min:3',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //Search threads
        $threads = Thread::where('topic_id',$id)
            ->where('title', 'like', '%'.$data['keyword'].'%')
            ->orWhere('content', 'like', '%'.$data['keyword'].'%')->get();

        //Search replies
        $replies = Reply::join('threads','replies.thread_id','=','threads.id')
            ->where('replies.title', 'like', '%'.$data['keyword'].'%')
            ->orWhere('replies.content', 'like', '%'.$data['keyword'].'%')
            ->select('replies.*')->get();

        return view('search-result', compact('topic', 'data', 'threads', 'replies'));
    }

    public function searchByUser(Request $request, $id){
        $data = $request->all();
        $user = User::find($id);
        $data['keyword'] = $user->nickname;

        $topic = null;

        //Search threads
        $threads = Thread::where('user_id', $user->id)->get();

        //Search replies
        $replies = Reply::where('user_id', $user->id)->get();

        return view('search-result', compact('topic', 'data', 'threads', 'replies'));
    }
}
