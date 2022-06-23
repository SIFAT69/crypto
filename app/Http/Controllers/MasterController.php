<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Dapp;
use App\Models\History;
use App\Models\Advertisement;

class MasterController extends Controller
{
    public function index(Request $request)
    {
      $categories = Category::get();
      $category = Category::limit(4)->latest()->get();
      $dapps = Dapp::get();
      $favorites = Dapp::where('favorte_status', 1)->get();
      $history = History::limit(4)->latest()->get();
      return view('welcome',[
        'categories' => $categories,
        'dapps' => $dapps,
        'favorites' => $favorites,
        'history' => $history,
        'category' => $category,
      ]);
    }
}
