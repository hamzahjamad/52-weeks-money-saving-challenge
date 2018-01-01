<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\CompleteChallenge;

class CompleteChallengeController extends Controller
{
    public function changeState(Request $request)
    {
 		$user = Auth::user();
    	$is_completed = CompleteChallenge::where('user_id', $user->id)
    									 ->where('challenge_id', $request->challengeid)
    									 ->first();

    	if (!$is_completed) {
    		CompleteChallenge::create([
	    		'user_id' => $user->id,
	    		'challenge_id' => $request->challengeid
	    	]);
    	} else {
    		$is_completed->delete();
    	}
   

    	return back();
    }
}
