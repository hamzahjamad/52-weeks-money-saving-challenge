<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompleteChallenge extends Model
{
	protected $fillable = [
        'challenge_id', 'user_id', 'created_at', 'updated_at',
    ]; 
}
