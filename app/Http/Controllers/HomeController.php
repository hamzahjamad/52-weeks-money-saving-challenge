<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $year = date('Y');

        if ($request->year) {
            $year = $request->year;
        }

        $challenges = Challenge::all();
        $completed_challenges_ids = Auth::user()->completedChallenges()
                                                ->where('created_at', 'LIKE', $year .'%')
                                                ->get()
                                                ->pluck('challenge_id')
                                                ->toArray();

        $current_week_number = $this->getCurrentWeek();                                                                            
        return view('home', compact('challenges', 'completed_challenges_ids', 'current_week_number', 'year'));
    }

    private function getCurrentWeek()
    {
        $current_date = date('Y-m-d');
        $date = new \DateTime($current_date);
        return $date->format("W") + 0; //change to integer
    }
}
