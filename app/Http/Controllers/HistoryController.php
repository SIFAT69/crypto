<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Dapp;
use App\Models\Category;
use App\Models\History;
use Image;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function history_index(Request $request)
    {
      $info['dapp_id'] = $request->id;
      History::create($info);
      $link = Dapp::findOrFail($request->id);
      return redirect($link->dapp_link);
    }
}
