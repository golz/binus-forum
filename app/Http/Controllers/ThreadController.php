<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Reply;
use App\Thread;
use App\Topic;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public $paginateLimit = 5;

    public function index(Request $request, $topicId, $id){

        $topic = Topic::find($topicId);
        $thread = Thread::find($id);
        $replies = Reply::where('thread_id', $id);

        if(isset($request['sk']) && isset($request['sd'])){ //Sort Value
            $sortByValue = $request['sk'];
            $orderByValue = $request['sd'];

            if($sortByValue == 't')
                $sortBy = 'updated_at';
            else if($sortByValue == 's')
                $sortBy = 'title';
            else if($sortByValue == 'v')
                $sortBy = 'view';

            if($orderByValue == 'a')
                $orderBy = 'asc';
            else if($orderByValue == 'd')
                $orderBy = 'desc';

            $replies = $replies->orderBy($sortBy, $orderBy);
        }
        $replies = $replies->paginate($this->paginateLimit);

        return view('thread', compact('topic', 'thread', 'replies'));
    }

    public function reply(Request $request, $topicId, $id){
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
            'content' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Reply::create([
            'thread_id' => $id,
            'user_id' => Auth::user()->id,
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        $lastPage = Reply::where('thread_id', $id)->paginate($this->paginateLimit)->lastPage();
        return redirect('topic/'.$topicId.'/thread/'.$id.'?page='.$lastPage);
    }

    public function showEditorForm(Request $request, $topicId, $id){

        $topic = Topic::find($topicId);
        $thread = Thread::find($id);
        $replies = Reply::where('thread_id', $id);

        $content = '';
        if(isset($request['quote'])){
            $content = Reply::find($request['quote']);
        }

        return view('editor-reply', compact('topic', 'thread', 'replies', 'content'));
    }
}
