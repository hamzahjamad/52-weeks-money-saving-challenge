<?php

use Illuminate\Database\Seeder;
use App\Challenge;

class ChallengeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 51; $i++) { 
        	$challenge = Challenge::where('week', $week = $i+1)->first();
        	if (!$challenge) {
        		Challenge::create([
        			'week' => $week,
        			'deposit' => $week,
        			'total' => ((1/2)*$week)*($week+1),
        		]);
        	}
        }
    }
}