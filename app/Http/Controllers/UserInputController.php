<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserInput;
use Illuminate\Http\Request;
use app\Models;
use Illuminate\Support\Facades\Redirect;

class UserInputController extends Controller
{

    public function index(Request $request){
        $query=UserInput::query();
        if($request->has('search')){
            $search=$request->search;
            $query->where('brand','like',"%{$search}%")->orWhere('fabric','like',"%{$search}%");
        }
        $users = $query->get();
        return view ('user_list' , compact('users'));
    }
    public function create(){
        return view('user_form');
    }

    public function store(Request $request){
        $validated=$request->validate([
            'brand'=>'required|string',
            'shade'=>'nullable|integer',
            'image'=>'required|image',
            'fabric'=>'required|string',
            'color'=>'required|string',
            'yards'=>'required|integer',
            'status'=>'required|string|max:255',
        ]);
        $imagepath=$request->file('image')->store('uploads','public');
        UserInput::create([
            'brand'=>$validated['brand'],
            'shade'=>$validated['shade'],
            'image_path'=>$imagepath,
            'fabric'=>$validated['fabric'],
            'color'=>$validated['color'],
            'yards'=>$validated['yards'],
            'status'=>$validated['status'],
        ]);

        return redirect()->route('user.index')->with('success');
    }

    public function destroy($id){
        $user=UserInput::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function edit($id){
        $user=UserInput::findOrFail($id);
        return view('user_edit',compact('user'));
    }

    public function update(Request $request, $id){
        $validated=$request->validate([
             'brand'=>'nullable|string',
             'shade'=>'nullable|integer',
            'image'=>'nullable|image',
            'fabric'=>'nullable|string',
            'color'=>'nullable|string',
            'yards'=>'nullable|integer',
            'status'=>'nullable|string|max:255',  
        ]);

        $user=UserInput::findOrFail($id);
        if($request->hasFile('image')){
        $imagepath=$request->file('image')->store('uploads','public');
        $user->image_path=$imagepath;
    }
        $user->brand=$validated['brand'];
        $user->shade=$validated['shade'];
        $user->fabric=$validated['fabric'];
        $user->color=$validated['color'];
        $user->yards=$validated['yards'];
        $user->status=$validated['status'];
        $user->save();

        return Redirect::to('/userlist')->with('submit');
    }
}

