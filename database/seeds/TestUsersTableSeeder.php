<?php

use Illuminate\Database\Seeder;

class TestUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
    {
    	$default_users = $this->defaultUsers();
    	foreach ($default_users as $default_user) {
    		   	$check_user = App\User::where('email', $default_user['email'])->first();
		    	if (!$check_user) {
		    		factory(App\User::class)->create(['email'=>$default_user['email'], 'name'=>$default_user['name']]);
		    	}
    	}
 
        factory(App\User::class, 500)->create();
    }


    private function defaultUsers()
    {
    	return [
    		['email'=>'johnwick@mailinator.com', 'name'=>'John Wick'],
    	];
    }
}
