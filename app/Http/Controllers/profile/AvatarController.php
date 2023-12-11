<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
   public function update(UpdateAvatarRequest $request){


      //check avatar
      if($oldAvatar =$request->user()->avatar){
         //delete old avatar
         Storage::disk('public')->delete($oldAvatar);// delete and update storage
      }

    //store avatar

   //  auth()->user()->update(['avatar' =>'test']);
   //  dd(auth()->user()->fresh());
    // return response()->redirectTo(route('profile.edit'));
    // return back();
    // return back()->with(['message' => 'Avatar is changed']);
   //  $path =$request->file('avatar')->store('avatars','public');
   $path = Storage::disk('public')->put('avatars', $request->file('avatar'));
   //  dd($path);
   //  auth()->user()->update(['avatar'=> storage_path('app')."/$path"]);
    auth()->user()->update(['avatar'=> $path]);
   //  dd($request->all());
   // dd($request->file('avatar')->store('avatars'));//sav?a to file storage
    return redirect(route('profile.edit'))->with('message', 'Avatar is updated');
   }
}