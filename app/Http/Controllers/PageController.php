<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chatter;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PageController extends BaseController
{
    public function login_page(Request $request) {
        $request->session()->forget('id');
        return view('login');
    }

    public function register_page(Request $request) {
        $request->session()->forget('id');
        return view('register');
    }

    private function check_login(Request $request) {
        if($request->session()->has('id')) {
            return true;
        }
        else {
            return false;
        }
    }

    public function home(Request $request) {
        if($this->check_login($request)) {
            $user_id = $request->session()->get('id');
            $user = User::where('id', $user_id)->get();
            $username = $user->value('username');
            $role = $user->value('role');
            $chatters = Chatter::orderByDesc('views')->orderBy('id')->limit(8)->get();
            return view('home')->with(['username' => $username, 'role' => $role, 'chatters' => $chatters]);
        }
        else {
            return redirect('login')->with('errors', ['Must be logged in to access']);
        }
    }

    public function profile(Request $request) {
        if($this->check_login($request)) {
            $user_id = $request->session()->get('id');
            $user = User::where('id', $user_id)->get();
            $username = $user->value('username');
            $role = $user->value('role');
            $chatters = Chatter::where('user_id', $user_id)->orderBy('created_at')->simplePaginate(8);
            return view('profile')->with(['username' => $username, 'role' => $role, 'chatters' => $chatters]);
        }
        else {
            return redirect('login')->with('errors', ['Must be logged in to access']);
        }
    }

    public function chatters(Request $request) {
        if($this->check_login($request)) {
            $user_id = $request->session()->get('id');
            $user = User::where('id', $user_id)->get();
            $username = $user->value('username');
            $role = $user->value('role');
            $categories = Category::get();
            $chatters = Chatter::orderByDesc('created_at')->simplePaginate(8);
            return view('all_chatters')->with(['username' => $username, 'role' => $role, 'categories' => $categories, 'chatters' => $chatters]);
        }
        else {
            return redirect('login')->with('errors', ['Must be logged in to access']);
        }
    }

    public function search_category(Request $request) {
        if($request->category == '') {
            return redirect('chatters');
        }
        else {
            return redirect('chatters/' . $request->category);
        }
    }

    public function category_chatters(Request $request, $id) {
        if($this->check_login($request)) {
            $user_id = $request->session()->get('id');
            $user = User::where('id', $user_id)->get();
            $username = $user->value('username');
            $role = $user->value('role');
            $categories = Category::get();
            $category = Category::where('id', $id)->value('name');
            $chatters = Chatter::where('category_id', $id)->orderBy('created_at')->simplePaginate(8);
            return view('category_chatters')->with(['username' => $username, 'role' => $role, 'categories' => $categories, 'category' => $category, 'chatters' => $chatters]);
        }
        else {
            return redirect('login')->with('errors', ['Must be logged in to access']);
        }
    }

    public function write_chatter(Request $request) {
        if($this->check_login($request)) {
            $user_id = $request->session()->get('id');
            $user = User::where('id', $user_id)->get();
            $username = $user->value('username');
            $role = $user->value('role');
            $categories = Category::get();
            return view('write_chatter')->with(['username' => $username, 'role' => $role, 'categories' => $categories]);
        }
        else {
            return redirect('login')->with('errors', ['Must be logged in to access']);
        }
    }

    public function edit_chatter(Request $request, $id) {
        if($this->check_login($request)) {
            $user_id = $request->session()->get('id');
            $user = User::where('id', $user_id)->get();
            $username = $user->value('username');
            $role = $user->value('role');
            $chatter = Chatter::where('id', $id)->first();
            $categories = Category::get();
            return view('edit_chatter')->with(['username' => $username, 'role' => $role, 'chatter' => $chatter, 'categories' => $categories]);
        }
        else {
            return redirect('login')->with('errors', ['Must be logged in to access']);
        }
    }

    public function write_category(Request $request) {
        if($this->check_login($request)) {
            $user_id = $request->session()->get('id');
            $user = User::where('id', $user_id)->get();
            $username = $user->value('username');
            $role = $user->value('role');
            return view('write_category')->with(['username' => $username, 'role' => $role]);
        }
        else {
            return redirect('login')->with('errors', ['Must be logged in to access']);
        }
    }

    public function edit_category(Request $request, $id) {
        if($this->check_login($request)) {
            $user_id = $request->session()->get('id');
            $user = User::where('id', $user_id)->get();
            $username = $user->value('username');
            $role = $user->value('role');
            $category = Category::where('id', $id)->first();
            return view('edit_category')->with(['username' => $username, 'role' => $role, 'category' => $category]);
        }
        else {
            return redirect('login')->with('errors', ['Must be logged in to access']);
        }
    }

    public function chatter(Request $request, $id) {
        if($this->check_login($request)) {
            $user_id = $request->session()->get('id');
            $user = User::where('id', $user_id)->get();
            $username = $user->value('username');
            $role = $user->value('role');
            $chatter = Chatter::where('id', $id)->first();
            $replies = $chatter->replies()->get();
            if($request->session()->get('id') != $chatter->user->id) {
                $chatter->views = $chatter->views + 1;
                $chatter->save();
            }

            return view('chatter')->with(['username' => $username, 'role' => $role, 'chatter' => $chatter, 'replies' => $replies]);
        }
        else {
            return redirect('login')->with('errors', ['Must be logged in to access']);
        }
    }

    public function category_list(Request $request) {
        if($this->check_login($request)) {
            $user_id = $request->session()->get('id');
            $user = User::where('id', $user_id)->get();
            $username = $user->value('username');
            $role = $user->value('role');
            $categories = Category::simplePaginate(8);

            return view('category_list')->with(['username' => $username, 'role' => $role, 'categories' => $categories]);
        }
        else {
            return redirect('login')->with('errors', ['Must be logged in to access']);
        }
    }

    public function user_list(Request $request) {
        if($this->check_login($request)) {
            $user_id = $request->session()->get('id');
            $user = User::where('id', $user_id)->get();
            $username = $user->value('username');
            $role = $user->value('role');
            $users = User::where('role', 'user')->simplePaginate(8);

            return view('user_list')->with(['username' => $username, 'role' => $role, 'users' => $users]);
        }
        else {
            return redirect('login')->with('errors', ['Must be logged in to access']);
        }
    }
}
