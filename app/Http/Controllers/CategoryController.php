<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CategoryController extends BaseController
{
    public function add_category(Request $request) {
        $category = new Category;
        $name = $request->name;

        // Validations
        $errors = [];

        if(strlen($name) <= 0) {
            array_push($errors, 'Category name can\'t be empty');
        }
        if($category->where('name', $name)->count() != 0) {
            array_push($errors, 'Category name already in use');
        }

        if(count($errors) > 0) {
            return redirect()->back()->with('errors', $errors);
        }
        // End Validations

        $category->name = $name;
        $category->save();
        return redirect('chatters');
    }

    public function edit_category(Request $request) {
        $category = Category::where('id', $request->id)->first();
        $name = $request->name;

        // Validations
        $errors = [];

        if(strlen($name) <= 0) {
            array_push($errors, 'Category name can\'t be empty');
        }
        if($category->where('name', $name)->count() != 0) {
            array_push($errors, 'Category name already in use');
        }

        if(count($errors) > 0) {
            return redirect()->back()->with('errors', $errors);
        }
        // End Validations

        $category->name = $name;
        $category->save();
        return redirect('category_list');
    }

    public function delete_category($id) {
        $chatter = Category::where('id', $id)->first();
        $chatter->delete();
        return redirect()->back();
    }
}
