<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index($id){
        $topic=Topic::find($id);
        return view('topic')->with('topic',$topic);
    }
}
