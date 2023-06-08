<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateForm;
use App\Http\Requests\Form;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $user = Auth::user();
        $categories = Category::paginate(7);
        $msg = '';
        return view('gourmetLog.categoryIndex', ['user' => $user, 'categories' =>$categories, 'msg' => $msg]);
    }

    public function store(CateForm $request) {
        $category = new Category();
        $category->name = $request->cateName;
        $category->save();
        return redirect()->route('category');
    }

    public function delete(Request $request, string $id) {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category');
    }

    public function edit(Request $request, string $id) {
        $user = Auth::user();
        $category = Category::find($id);
        return view('gourmetLog.categoryEdit', ['user' => $user, 'category' => $category]);
    }

    public function update(CateForm $request, string $id) {
        $category = Category::find($id);
        $category->name = $request->cateName;
        $category->save();
        return redirect()->route('category');
    }
}
