<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Adsclick;
use Image;
use Auth;

class AdvertisementController extends Controller
{
    public function index(Request $request)
    {
      $ads = Advertisement::where('owner_id', Auth::id())->get();
      $ads_click = Adsclick::where('owner_id', Auth::id())->count();
      return view('Dashboard.Ads.index',[
        'ads' => $ads,
        'ads_click' => $ads_click,
      ]);
    }
    public function all_ads(Request $request)
    {
      $ads = Advertisement::get();
      $ads_click = Adsclick::count();
      return view('Dashboard.Ads.all_ads',[
        'ads' => $ads,
        'ads_click' => $ads_click,
      ]);
    }

    public function update(Request $request)
    {
      $info = $request->validate([
        'ads' => "bail|sometimes|file|image|mimes:jpeg,jpg,png,svg|max:3300",
        'link' => "bail|required",
      ]);

      $this_ads = Advertisement::findOrFail($request->id);

      if (!empty($request->ads)) {
        $ads = $request->file('ads');
        $ads_rename = uniqid().'.'.$ads->getClientOriginalExtension();
        $newLocation = public_path('/uploads/ads/'.$ads_rename);
        Image::make($ads)->fit(850 ,315 ,function ($constraint) { $constraint->upsize(); $constraint->upsize();})->save($newLocation);
      }else {
        $ads_rename = $this_ads->ads;
      }

      $info['ads'] = $ads_rename;
      $info['link'] = $request->link;
      $info['click_limits'] = $request->click_limits;
      if ($info['click_limits'] > 0) {
        $info['status'] = "Active";
      }


      Advertisement::where('id', $request->id)->update($info);
      return back()->with('success', 'You just update your ads!');
    }

    public function save(Request $request)
    {
      $info = $request->validate([
        'ads' => "bail|sometimes|file|image|mimes:jpeg,jpg,png,svg|max:3300",
        'link' => "bail|required",
      ]);

      $ads = $request->file('ads');
      $ads_rename = uniqid().'.'.$ads->getClientOriginalExtension();
      $newLocation = public_path('/uploads/ads/'.$ads_rename);
      Image::make($ads)->fit(850 ,315 ,function ($constraint) { $constraint->upsize(); $constraint->upsize();})->save($newLocation);

      $info['ads'] = $ads_rename;
      $info['link'] = $request->link;
      $info['owner_id'] = Auth::id();
      $info['click_limits'] = 500;
      Advertisement::create($info);
      return back()->with('success', 'You just created your ads!');
    }

    public function delete(Request $request)
    {
      $ads = Advertisement::findOrFail($request->id);
      $ads->delete();
      return back()->with('success', 'You just deleted a ads.');
    }

    public function ads_click(Request $request)
    {
      $ads = Advertisement::findOrFail($request->id);
      Advertisement::where('id', $request->id)->update(['click_limits' => $ads->click_limits-1]);
      if ($ads->click_limits <= 1) {
        Advertisement::where('id', $request->id)->update(['status' => "Closed"]);
      }
      $info['ads_id'] = $request->id;
      $info['clicks'] = 1;
      $info['owner_id'] = $ads->owner_id;
      Adsclick::create($info);
      return redirect($ads->link);
    }
}
