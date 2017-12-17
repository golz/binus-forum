<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use App\Topic;
use App\Type;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        $users = User::all();
        $lastFivePosts = Thread::orderBy('updated_at', 'desc')->take(5)->get();
        $todayBirthdays = User::whereDay('dob', date('d'))->whereMonth('dob', date('m'))->get();
        $totalOnline = $this->getTotalOnlineMembers();
        $totalTopics = Topic::all()->count();
        $totalPosts = $this->getTotalPosts();
        $totalUsers = $users->count();

        return view('home', compact('types', 'users', 'lastFivePosts', 'todayBirthdays', 'totalOnline', 'totalTopics', 'totalPosts', 'totalUsers'));
    }

    public function getTotalOnlineMembers(){
        $totalOnline = 0;

        foreach(User::all() as $user){
            if($user->isOnline()){
                $totalOnline+=1;
            }
        }

        return $totalOnline;
    }

    public function getTotalPosts(){
        $threadsCount = Thread::all()->count();
        $replyCount = Reply::all()->count();

        return $threadsCount + $replyCount;
    }

}
