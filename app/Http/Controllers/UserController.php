<?php

namespace App\Http\Controllers;

use App\Models\chatter;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login(Request $request) {
        if(empty($request->except("_token"))) {
            return redirect('login')->with('errors', ['Must login to access page']);
        }

        $user = new User;
        $username = $request->username;
        $password = $request->password;

        // Validations
        $errors = [];

        if(strlen($username) <= 0) {
            array_push($errors, 'Username can\'t be empty');
        }
        if($user->where('username', $username)->count() <= 0) {
            array_push($errors, 'Email/username not found');
        }
        elseif(!Hash::check($password, $user->where('username', $username)->value('password'))) {
            array_push($errors, 'Incorrect password');
        }
        if(strlen($password) <= 0) {
            array_push($errors, 'Password can\'t be empty');
        }

        if(count($errors) > 0) {
            return redirect()->back()->with('errors', $errors);
        }

        $request->session()->put('id', $user->where('username', $username)->value('id'));
        // End Validations
        
        return redirect('home');
    }

    public function register(Request $request) {
        $user = new User;
        $email = $request->email;
        $username = $request->username;
        $password = $request->password;
        $confirm = $request->confirm;

        // Validations
        $errors = [];

        if($password != $confirm) {
            array_push($errors, 'Password does not match');
        }
        if(strlen($email) <= 0) {
            array_push($errors, 'Email can\'t be empty');
        }
        if(strlen($username) <= 0) {
            array_push($errors, 'Username can\'t be empty');
        }
        if(strlen($password) <= 0) {
            array_push($errors, 'Password can\'t be empty');
        }
        elseif(strlen($password) < 8) {
            array_push($errors, 'Password must at least be 8 characters long');
        }
        if($user->where('email', $email)->count() != 0) {
            array_push($errors, 'Email already in use');
        }
        if($user->where('username', $username)->count() != 0) {
            array_push($errors, 'Username is taken');
        }

        if(count($errors) > 0) {
            return redirect()->back()->with('errors', $errors);
        }
        // End Validations

        $user->email = $email;
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->save();
        return redirect('login');
    }

    public function logout(Request $request) {
        $request->session()->forget('id');
        return redirect('login');
    }

    public function remove_user($id) {
        $chatter = User::where('id', $id)->first();
        $chatter->delete();
        return redirect()->back();
    }
}
