<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ReplyController extends BaseController
{
    public function add_reply(Request $request) {
        $reply = new Reply;
        $chatter_id = $request->chatter_id;
        $content = $request->content;

        // // Validations
        $errors = [];

        if(strlen($content) <= 0) {
            array_push($errors, 'Reply can\'t be empty');
        }

        if(count($errors) > 0) {
            return redirect()->back()->with('errors', $errors);
        }
        // End Validations

        $reply->content = $content;
        $reply->chatter_id = $chatter_id;
        $reply->user_id = $request->session()->get('id');
        $reply->save();
        return redirect()->back();
    }

    public function delete_reply($id) {
        $chatter = Reply::where('id', $id)->first();
        $chatter->delete();
        return redirect()->back();
    }
}
