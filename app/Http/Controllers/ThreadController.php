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
    public $paginateLimit = 10;

    public function index(Request $request, $topicId, $id){

        $topic = Topic::find($topicId);
        $thread = Thread::find($id);
        $replies = Reply::where('thread_id', $id)->orderBy('created_at', 'asc');

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

    public function store(Request $request, $id){

        $data = $request->all();
        $is_announcement = false;

        $validator = Validator::make($data, [
            'title' => 'required',
            'content' => 'required'
        ]);

        if(isset($data['is_announcement']) && $data['is_announcement'] == 'on'){
            $is_announcement = true;
        }

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $newThread = Thread::create([
            'topic_id' => $id,
            'user_id' => Auth::user()->id,
            'title' => $data['title'],
            'content' => $data['content'],
            'view' => 0,
            'rating' => 0,
            'is_announcement' => $is_announcement,
            'status' => 'open',
        ]);

        return redirect('topic/'.$id.'#p'.$newThread->id);

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

        $newReply = Reply::create([
            'thread_id' => $id,
            'user_id' => Auth::user()->id,
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        $lastPage = Reply::where('thread_id', $id)->paginate($this->paginateLimit)->lastPage();
        return redirect('topic/'.$topicId.'/thread/'.$id.'?page='.$lastPage.'#p'.$newReply->id);
    }

    public function showThreadForm(Request $request, $id){

        $topic = Topic::find($id);

        return view('editor-thread', compact('topic'));
    }

    public function showReplyForm(Request $request, $topicId, $id){

        $topic = Topic::find($topicId);
        $thread = Thread::find($id);
        $replies = Reply::where('thread_id', $id);

        $content = '';
        if(isset($request['quote'])){
            $content = Reply::find($request['quote']);
        }

        return view('editor-reply', compact('topic', 'thread', 'replies', 'content'));
    }

    public function destroy($topicId, $id){
        $thread = Thread::find($id);
        if($thread->user->id == Auth::user()->id){
            $thread->delete();
        }

        return redirect('topic/'.$topicId)->back();
    }

    public function close($topicId, $id){
        $thread = Thread::find($id);
        $thread->status = 'close';
        $thread->save();

        return redirect()->back();
    }
}
