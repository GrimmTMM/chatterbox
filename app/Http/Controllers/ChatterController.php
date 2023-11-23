<?php

namespace App\Http\Controllers;

use App\Models\Chatter;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ChatterController extends BaseController
{
    public function add_chatter(Request $request) {
        $chatter = new Chatter;
        $title = $request->title;
        $content = $request->content;
        $category = $request->category;

        // Validations
        $errors = [];

        if(strlen($title) <= 0) {
            array_push($errors, 'Title can\'t be empty');
        }
        if(strlen($content) <= 0) {
            array_push($errors, 'Content can\'t be empty');
        }
        if($category == '') {
            array_push($errors, 'Category can\'t be empty');
        }

        if(count($errors) > 0) {
            return redirect()->back()->with('errors', $errors);
        }
        // End Validations

        $chatter->title = $title;
        $chatter->content = $content;
        $chatter->category_id = $category;
        $chatter->user_id = $request->session()->get('id');
        $chatter->views = 0;
        $chatter->save();
        return redirect('chatters');
    }

    public function edit_chatter(Request $request) {
        $chatter = Chatter::where('id', $request->id)->first();
        $title = $request->title;
        $content = $request->content;
        $category = $request->category;

        // Validations
        $errors = [];

        if(strlen($title) <= 0) {
            array_push($errors, 'Title can\'t be empty');
        }
        if(strlen($content) <= 0) {
            array_push($errors, 'Content can\'t be empty');
        }
        if($category == '') {
            array_push($errors, 'Category can\'t be empty');
        }

        if(count($errors) > 0) {
            return redirect()->back()->with('errors', $errors);
        }
        // End Validations

        $chatter->title = $title;
        $chatter->content = $content;
        $chatter->category_id = $category;
        $chatter->user_id = $request->session()->get('id');
        $chatter->views = 0;
        $chatter->save();
        return redirect('chatter/'.$chatter->id);
    }

    public function delete_chatter($id) {
        $chatter = Chatter::where('id', $id)->first();
        $chatter->delete();
        return redirect('chatters');
    }
}
