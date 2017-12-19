<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use App\Topic;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
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
        $replies = $replies->paginate(5);

        return view('thread', compact('topic', 'thread', 'replies'));
    }
}
