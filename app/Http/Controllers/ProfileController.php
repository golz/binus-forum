<?php

namespace App\Http\Controllers;

use App\Signature;
use App\Topic;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id){
        $user = User::find($id);

        $topics = Topic::all();
        $isModerator = false;
        foreach($topics as $topic) {
            if ($topic->topicModerators->find($id) != null){
                $isModerator = true;
            }
        }

        //User Statistics
        $totalPost = $user->threads->count() + $user->replies->count();
        $postPercentage = $this->getPostPercentage($user);

        $mostActiveTopic = null;
        $mostActiveTopicThreadCount = 0;

        $mostActiveThread = null;
        $mostActiveThreadReplyCount = 0;
        foreach(Topic::all() as $top){
            $threadCount = $user->threads->where('topic_id', $top->id)->count();
            if($mostActiveTopic == null || $threadCount > $mostActiveTopicThreadCount){
                $mostActiveTopicThreadCount = $threadCount;
                $mostActiveTopic = $top;
            }

            foreach($top->threads as $thread){
                $replyCount = $user->replies->where('thread_id', $thread->id)->count();
                if($mostActiveThread == null | $replyCount > $mostActiveThreadReplyCount){
                    $mostActiveThreadReplyCount = $replyCount;
                    $mostActiveThread = $thread;
                }
            }
        }

        return view('profile', compact('user', 'isModerator', 'totalPost', 'postPercentage', 'mostActiveTopic', 'mostActiveTopicThreadCount', 'mostActiveThread', 'mostActiveThreadReplyCount'));
    }

    public function getPostPercentage($user){
        $start = $user->created_at;
        $end = Carbon::now();
        $totalDay = $start->diff($end)->days;
        $totalPost = ($user->threads->count() + $user->replies->count()) / ($totalDay + 1);

        return $totalPost;
    }
}
