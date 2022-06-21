<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use App\Models\Dapp;
use App\Models\Category;

class SearchController extends Controller
{
    public function search_result(Request $request)
    {
      $keyword = $request->keyword;
      $dapps = Dapp::where('dapp_name', 'LIKE', "%{$keyword}%")->get();
      return view('all',[
        'dapps' => $dapps,
        'keyword' => $keyword,
      ]);
    }
}
