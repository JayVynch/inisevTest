<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function index()
    {
        
    }

    public function store(Request $request,$site)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors() ], 422);
        }

        $user = User::where('email',$request->email)->first();
        $site = Website::where('id',$site)->first();

        $user->subscriptions()->attach($site);

        return response()->json([
            'message' => "$user->email has subscribed to $site->site"
        ], 201);
        
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete(Request $request, $id)
    {
        //
    }
}
