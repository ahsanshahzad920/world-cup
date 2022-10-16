<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Faq;
use App\FaqCategory;
use App\GroupMatch;
use App\Guideline;
use App\Models\Service;
use App\Models\Feature;
use App\Models\Content;
use App\Models\Banner;
use App\News;
use App\Review;
use App\WritingPoint;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Messages;
use App\ParticipantPoint;
use App\Policy;
use App\RankingTournament;
use App\RankingUser;
use App\Slider;
use App\Term;
use App\Tournament;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('client.home');
    }
    public function home()
    {
        $world_cup = GroupMatch::orderBy('date','ASC')->where('win',null)->paginate('10');
        $point = ParticipantPoint::orderBy('points','DESC')->where('status',0)->get();
        $slider = Slider::orderBy('id','DESC')->get();
        $service = Service::orderBy('id','ASC')->get();
        $blog = Blog::orderBy('id','ASC')->get();
        return view('welcome',compact('world_cup','point','slider','service','blog'));
    }
    // public function FaqSearch(Request $request){
    //     $service = Service::orderBy('created_at','ASC')->get();
    // 	$writing_point = WritingPoint::orderBy('created_at','ASC')->get();
    // 	$review = Review::orderBy('created_at','ASC')->get();
    // 	$faq_category = FaqCategory::orderBy('created_at','ASC')->get();
    // 	$faq = Faq::where('heading', 'LIKE', '%'.$request->search.'%')->orWhere('description', 'LIKE', '%'.$request->search.'%')->get();
    // 	$news = News::orderBy('created_at','DESC')->get();
    //     return view('welcome',compact('service','writing_point','review','faq_category','faq','news'));
    // }
    public function redirect()
    {
        if (auth()->user()->is_admin) {
        
            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return redirect('tournament')->with('status', session('status'));
    }

    public function HowToPlay()
    {
        $guideline = Guideline::orderBy('created_at','ASC')->get();
        return view('how-to-play',compact('guideline'));
    }

    public function About()
    {
        return view('about');
    }

    public function fame()
    {
        $tournament = RankingTournament::all();
        $point = RankingUser::orderBy('point','DESC')->get();
        return view('hall-of-fame',compact('tournament','point')); 
    }

    public function contact()
    {
        return view('contact-us'); 
    }

    public function term()
    {
        $term = Term::orderBy('created_at','ASC')->get();
        return view('term-condition',compact('term')); 
    }
    public function policy()
    {
        $policy = Policy::orderBy('created_at','ASC')->get();
        return view('privacy-policy',compact('policy')); 
    }

    public function matches()
    {
        $world_cup = GroupMatch::orderBy('date','ASC')->where('win',null)->paginate('10');
        
        return view('matches',compact('world_cup')); 
    }

    public function prediction()
    {
        return view('prediction'); 
    }

    public function chat($id = null)
    {
        if(auth::user()){
                $user_id = auth()->user()->id;
                
                $groups = DB::select('select chat_id from chat_group_members where user_id='.$user_id);
                $chats = Chat::with(['user1', 'user2'])
                ->where('user1_id', $user_id)
                ->orWhere('user2_id', $user_id);
                $gr = array();
                foreach($groups as $g){
                    $chats->orWhere('id',$g->chat_id);
                }
                $chats = $chats->get();
                Messages::where('receiver_id', $user_id)
                    ->update(['read' => 1]);
                
                if ($id) {
                    $chat_id = $id;
                } elseif ($chats->count()) {
                    $chat_id = $chats->first()->id;
                } else {
                    $chat_id = null;
                }
                
                $messages = $chat_id ? Messages::where('chat_id', $chat_id)->get() : [];
                $chat_open = Chat::find($chat_id);
                
                //$role =auth()->user()->is_admin; 
                $role="customer";
                // auth()->user()->hasRole('Admin');
                //dd($role);
                return view('chat', compact('chats', 'messages', 'chat_open'));
            }else{
                return redirect()->route('login');
            }
    }
    
    public function sendMsg(Request $request)
    {
        $chat = Chat::findOrFail($request->chat_id);
        $receiver_id = $chat->user1_id == auth()->user()->id ? $chat->user2_id : $chat->user1_id;
        
        Messages::create([
            'text' => $request->msg,
            'chat_id' => $chat->id,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $receiver_id
        ]);
    }

    public function refreshMsgs($chat_id)
    {
        $messages = Messages::where('chat_id', $chat_id)->get();
        $response = view('messages', compact('messages'))->render();
        
        return $response;
    }
}