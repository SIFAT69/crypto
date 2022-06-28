<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {
      $categories = Category::get();
      return view('Dashboard.Dapp.Category.index',[
        'categories' => $categories,
      ]);
    }
    public function web3()
    {
      $categories = Category::where('created_by', Auth::id())->get();
      return view('Dashboard.Dapp.Category.web3',[
        'categories' => $categories,
      ]);
    }

    public function category_save(Request $request)
    {
      $info = $request->validate([
        'category' => "required|unique:categories",
      ]);
      $info['category'] = $request->category;
      $info['created_by'] = Auth::id();
      Category::create($info);
      return back()->with('success', 'You just saved an category.');
    }

    public function category_update(Request $request)
    {
      $info = $request->validate([
        'category' => "required|unique:categories",
      ]);
      $info['category'] = $request->category;
      Category::where('id', $request->id)->update($info);
      return back()->with('success', 'You just update your category');
    }

    public function category_delete(Request $request)
    {
      Category::where('id', $request->id)->delete();
      return back()->with('success', 'You just deleted a category.');
    }


}
