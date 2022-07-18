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
use App\Models\Dappclick;
use App\Models\History;
use Image;
use Illuminate\Support\Facades\Storage;

class DappController extends Controller
{
    public function index(Request $Request)
    {
      $dapps = Dapp::get();
      $categories = Category::get();
      return view('Dashboard.Dapp.index',[
        'dapps' => $dapps,
        'categories' => $categories,
      ]);
    }
    public function usersdapp(Request $Request)
    {
      $dapps = Dapp::where('created_by', Auth::id())->get();
      $categories = Category::get();
      return view('Dashboard.Dapp.users_dapp',[
        'dapps' => $dapps,
        'categories' => $categories,
      ]);
    }

    public function store(Request $request)
    {


      $dapp_logo = $request->file('dapp_logo');
      $dapp_logo_rename = uniqid().'.'.$dapp_logo->getClientOriginalExtension();
      $newLocation = public_path('/uploads/logo/'.$dapp_logo_rename);
      Image::make($dapp_logo)->fit(65 ,65 ,function ($constraint) { $constraint->upsize(); $constraint->upsize();})->save($newLocation);

      $info['dapp_logo'] = $dapp_logo_rename;
      $info['dapp_name'] = $request->dapp_name;
      $info['dapp_link'] = $request->dapp_link;
      $info['dapp_category'] = $request->web3;
      $info['desc'] = $request->desc;
      $info['click_limits'] = $request->click_limits;
      $info['amount'] = $request->amount;
      $info['package'] = $request->amount;
      $info['txhash'] = $request->txhash;
      $info['created_by'] = Auth::id();

      Dapp::create($info);
      return back()->with('success', 'You just listed a dapp on homepage.');
    }

    public function edit(Request $request)
    {
      $info = $request->validate([
        'dapp_name' => "bail|required",
        'dapp_link' => "bail|required",
        'dapp_category' => "bail|required",
        'desc' => "bail|required",
      ]);
      $this_dapp = Dapp::findOrFail($request->id);
      if (!empty($request->dapp_logo)) {
        $dapp_logo = $request->file('dapp_logo');
        $dapp_logo_rename = uniqid().'.'.$dapp_logo->getClientOriginalExtension();
        $newLocation = public_path('/uploads/logo/'.$dapp_logo_rename);
        Image::make($dapp_logo)->fit(65 ,65 ,function ($constraint) { $constraint->upsize(); $constraint->upsize();})->save($newLocation);
      }else {
        $dapp_logo_rename = $this_dapp->dapp_logo;
      }

      $info['dapp_logo'] = $dapp_logo_rename;
      $info['dapp_name'] = $request->dapp_name;
      $info['dapp_link'] = $request->dapp_link;
      $info['dapp_category'] = $request->dapp_category;
      $info['desc'] = $request->desc;

      Dapp::where('id', $request->id)->update($info);
      return back()->with('success', 'You just updated a dapp on homepage.');
    }

    public function add_favorite(Request $request)
    {
      $check_favorite = Dapp::findOrFail($request->id);
      if ($check_favorite->favorte_status == 1) {
        Dapp::where('id', $request->id)->update(['favorte_status' => 0]);
        return back()->with('success', 'You just mark it as favorite');
      }else {
        Dapp::where('id', $request->id)->update(['favorte_status' => 1]);
        return back()->with('success', 'You just remove it from favorite');
      }
    }

    public function delete(Request $request)
    {
      Dapp::where('id', $request->id)->delete();
      return back()->with('success', 'You just remove a dapp from list.');
    }

    public function dapps_category(Request $request)
    {
      $category = Category::findOrFail($request->id);
      $dapps = Dapp::where('dapp_category', $category->category)->get();
      return view('all',[
        'dapps' => $dapps,
      ]);
    }

    public function dapp_create_one(Request $request)
    {
      $categories = Category::get();
      return view('Dashboard.Dapp.create',[
        'categories' => $categories,
      ]);
    }

    public function ads_click(Request $request)
    {
      $ads = Dapp::findOrFail($request->id);
      Dapp::where('id', $request->id)->update(['click_limits' => $ads->click_limits-1]);
      if ($ads->click_limits <= 1) {
        Dapp::where('id', $request->id)->update(['status' => "Closed"]);
      }
      $info['ads_id'] = $request->id;
      $info['clicks'] = 1;
      $info['owner_id'] = $ads->owner_id;
      Dappclick::create($info);

      $history['dapp_id'] = $request->id;
      History::create($history);

      return redirect($ads->dapp_link);
    }
}
