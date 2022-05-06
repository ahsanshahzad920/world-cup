<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomChatController extends Controller
{
    public function fetch(){
        $result = "<ul>";
        foreach(\App\User::where('first_name','like','%'.$_REQUEST['str'].'%')->orWhere('last_name','like','%'.$_REQUEST['str'].'%')->limit(5)->get() as $user){
                $result.='<span><li>'.$user->first_name.' '.$user->last_name.'<button class="btn btn-info" onclick="'."return add($user->id,'$user->first_name".` `.$user->last_name."'".')">ADD</botton>'.'</li></span>';
        }
        $result .= "<ul>";
        return $result;
    }
    public function createGroup(){
        if(!isset($_REQUEST['list'])) return 'error';
        $uid = auth()->user()->id;
        array_push($_REQUEST['list'],$uid);
        $lists = array_unique($_REQUEST['list']);
        if(count($lists)>2){
            $chat = new Chat;
            $chat->user1_id= '0';
            $chat->user2_id= '0';
            $chat->type='group';
            $chat->group_name = $_REQUEST['groupname'];
            $chat->save();
        foreach($lists as $member){
            DB::insert("INSERT INTO `chat_group_members` (`id`, `chat_id`, `user_id`) VALUES (NULL, '$chat->id', '$member')");
        }
        DB::insert("INSERT INTO `chat_group_members` (`id`, `chat_id`, `user_id`) VALUES (NULL, '$chat->id', '$uid')");
        return 'ok';
        }
        return 'Not enough participants';
    }
}
