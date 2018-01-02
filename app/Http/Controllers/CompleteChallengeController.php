<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\CompleteChallenge;

class CompleteChallengeController extends Controller
{
    public function changeState(Request $request)
    {
        $request->validate([
            'challengeid' => 'required',
            'year' => 'required|integer',
        ]);

 		$user = Auth::user();
        $year = $request->year;
    	$is_completed = CompleteChallenge::where('user_id', $user->id)
    									 ->where('challenge_id', $request->challengeid)
    									 ->where('created_at', 'LIKE', $year.'%')
    									 ->first();
        //Todo fix bug : somehow we cannot save the data on 2039 and above
        //also cannot save the data on 1969 and below                                 
        $date =  date_create($year . date('-m-d H:i:s'));                                

    	if (!$is_completed) {
    		CompleteChallenge::create([
	    		'user_id' => $user->id,
	    		'challenge_id' => $request->challengeid,
                'created_at' => $date,
                'updated_at' => $date,
	    	]);
    	} else {
    		$is_completed->delete();
    	}
   

    	return back();
    }
}
