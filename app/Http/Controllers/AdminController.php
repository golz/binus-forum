<?php

namespace App\Http\Controllers;

use App\TopicModerator;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addModerator(Request $request, $id){
        $data = $request->all();

        TopicModerator::create([
            'user_id' => $id,
            'topic_id' => $data['topic_id']
        ]);

        return redirect()->back();
    }

    public function removeModerator(Request $request, $id){
        $data = $request->all();

        $topicModerator = TopicModerator::where('topic_id', $data['topic_id'])->where('user_id', $id)->first()->delete();

        return redirect()->back();
    }
}
