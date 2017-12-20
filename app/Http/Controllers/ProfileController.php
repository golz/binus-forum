<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Signature;
use App\Topic;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    //User Control Panel
    public function profile(){
        $user = Auth::user();
        $dob = Carbon::parse($user->dob);

        return view('cpanel-profile', compact('user', 'dob'));
    }
    public function editProfile(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'fullname' => 'required|string|min:5|max:50',
            'bday_day' => 'required|numeric|min:1',
            'bday_month' => 'required|numeric|min:1',
            'bday_year' => 'required|numeric|min:1',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $dob = $data['bday_year'] . '/' . $data['bday_month'] . '/' . $data['bday_day'];

        $user = User::find(Auth::user()->id);
        $user->fullname = $data['fullname'];
        $user->dob = $dob;
        $user->save();

        return redirect()->back()->with('message','Changes has been saved.');
    }

    public function signature(){
        $user = Auth::user();

        return view('cpanel-signature', compact('user'));
    }
    public function editSignature(Request $request){
        $data = $request->all();
        $user = Auth::user();

        $validator = Validator::make($data, [
            'content' => 'min:0|max:255'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($user->signature == null){
            $newSignature = Signature::create([
                'content' => $data['content']
            ]);
            $user->signature_id = $newSignature->id;
            $user->save();
        } else {
            $updatedSignature = Signature::find($user->signature->id);
            $updatedSignature->content = $data['content'];
            $updatedSignature->save();
        }

        return redirect()->back()->with('message', 'Changes has been saved.');
    }

    public function avatar(){
        $user = Auth::user();

        return view('cpanel-avatar', compact('user'));
    }
    public function editAvatar(Request $request){
        $data = $request->all();
        $user = Auth::user();

        $validator = Validator::make($data, [
            'image' => 'required|image'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file_name = 'default.jpg';
        if(Input::hasFile('image')) {
            if (Input::file('image')->isValid()) {
                $destination_path = public_path('uploads/profile');
                $extension = Input::file('image')->getClientOriginalExtension();
                $file_name = uniqid() . '.' . $extension;

                Input::file('image')->move($destination_path, $file_name);
            }
        }

        $user->image = $file_name;
        $user->save();

        return redirect()->back()->with('message', 'Changes has been saved.');
    }

    public function accountSetting(){
        $user = Auth::user();

        return view('cpanel-account-setting', compact('user'));
    }
    public function editAccountSetting(Request $request){
        $data = $request->all();
        $user = Auth::user();
        $isUpdatePassword = false;


        if(isset($data['nickname']) && $data['nickname'] != $user->nickname) {
            $validator = Validator::make($data, [
                'nickname' => 'required|string|unique:users,nickname|min:3|max:20|alpha_dash',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        if(isset($data['email']) && $data['email'] != $user->email) {
            $validator = Validator::make($data, [
                'email' => 'required|string|email|max:255|unique:users'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        //Another Validating Data
        if(isset($data['new_password'])){
            $validator = Validator::make($data, [
                'new_password' => 'required|string|min:6|max:100|confirmed',
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $isUpdatePassword = true;
        }

        //Check if password is corrected
        if(!isset($data['password'])){
            return redirect()->back()->with('error', 'Please enter your password first.');
        } else if(!Hash::check($data['password'],$user->password)){
            return redirect()->back()->with('error', 'Wrong password.');
        }

        if($isUpdatePassword == true){
            $user->nickname = $data['nickname'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['new_password']);
        } else {
            $user->nickname = $data['nickname'];
            $user->email = $data['email'];
        }
        $user->save();

        return redirect()->back()->with('message', 'Changes has been saved.');
    }
}
