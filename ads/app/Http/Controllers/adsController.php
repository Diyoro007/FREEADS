<?php

namespace App\Http\Controllers;

// use App\Http\Middleware\User;
use Illuminate\Http\Request;
use App\Models\ads;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class adsController extends Controller
{
    public function liste_ads()
    {
        $ad = ads::paginate(6); 
        
        return view('ads.liste', compact('ad'));
    }

    public function search()
    {
        $mot = request()->input('mot');
        // dd($mot);
        $ad = ads::where('title','LIKE',"%$mot%")
            ->orWhere('category','LIKE',"%$mot%")
            ->orWhere('description','LIKE',"%$mot%")
            ->orWhere('location','LIKE',"%$mot%")
            ->orWhere('users_name','LIKE',"%$mot%")
            ->orWhere('condition','LIKE',"%$mot%")
            ->paginate(3);

        return view('ads.search', compact('ad'));

    }

    public function liste_user_ads()
    {
        $userid = Auth::id();
        $ads = ads::where('users_id', $userid)->get();
        $user = User::find($userid);
        return view('ads.listeUser', ['userid' => $userid, 'ads' => $ads,'user'=> $user]);
    }

    public function ajouter_ads()
    {
        return view('ads.ajouter');
    }

    public function traitement_ads(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:1024',
            'price' => 'required',
            'location' => 'required',
            'condition' => 'required',
            
            // 'user_id'=> 'required',
        ]);
        // dd(Auth::id());
        // dd(Auth::user()->name);


        $ads = new ads();
        $ads->title = $request->title;
        $ads->category = $request->category;
        $ads->description = $request->description;
        // $ads->image = $request->image;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/ads/', $filename);
            $ads->image = $filename;
        }
        else{
            return $request;
            $ads->image = '';
        }
        $ads->price = $request->price;
        $ads->location = $request->location;
        $ads->condition = $request->condition;
        $ads->users_id = Auth::id();
        $ads->users_name = Auth::user()->name;
        $ads->save();

        return redirect('/ajoutAds')->with('status', 'Ad successfully added');
    }

    public function update_ads($id){
        $ads = ads::find($id);
        return view('ads.update', compact('ads'));
    }

    public function update_ads_traitement(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:1024',
            'price' => 'required',
            'location' => 'required',
            'condition' => 'required',
        ]);

        $ads = ads::find($request->id);
        $ads->title = $request->title;
        $ads->category = $request->category;
        $ads->description = $request->description;
        // $ads->image = $request->image;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/ads/', $filename);
            $ads->image = $filename;
        }
        else{
            return $request;
            $ads->image = '';
        }
        $ads->price = $request->price;
        $ads->location = $request->location;
        $ads->condition = $request->condition;
        $ads->update();

        return redirect('/')->with('status', 'Ad successfully update');

    }

    public function delete_ads($id){
        $ads = ads::find($id);
        $ads->delete();

        return redirect('/ads')->with('status', 'Ad successfully deleted');

    }
    public function listeIndex()
    {
        $ads = ads::all();
    }
}


