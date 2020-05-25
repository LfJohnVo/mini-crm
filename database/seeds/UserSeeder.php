<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Administrator',
            'email'=> 'admin@admin.com',
            'password'=> Hash::make('password'),
            'created_at' => Carbon::parse('2020-05-25'),
        ]);
    }
}
