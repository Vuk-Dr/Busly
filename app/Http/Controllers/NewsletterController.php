<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request){
        try{
            if(Newsletter::where('email', $request->email)->exists()){
                return response()->json(['message' => 'Email already exists'], 400);
            }
            $subscriber = new Newsletter();
            $subscriber->email = $request->email;
            $subscriber->save();
            return response()->json(['message' => 'Subscribed successfully'], 201);
        }catch (\Exception $exception){
            \Log::error($exception->getMessage());
            return response()->json(['message' => 'Try again later'], 500);
        }
    }
}
