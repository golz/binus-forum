<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(Request $request, $id){
        $topic = Topic::find($id);
        $announcements = $topic->threads->where('is_announcement', true);
        //$threads = $topic->threads->where('is_announcement', false);
        $threads = Thread::where('topic_id', $id)->where('is_announcement', false);


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

            $threads = $threads->orderBy($sortBy, $orderBy);
        }
        $threads = $threads->paginate(5);

        return view('topic', compact('topic', 'announcements', 'threads'));
    }
}
