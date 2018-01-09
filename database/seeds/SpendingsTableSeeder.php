<?php

use Illuminate\Database\Seeder;

class SpendingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Spending::class, 30)->create()->each(function($spending){
            if(($spending->price)<=1000){
                $user_id = [1];
            }else{
                $user_id = [rand(10,20),rand(10,20),rand(10,20)];
                $spending->price= ($spending->price)/3;
            }

            return $spending->users()->attach($user_id,['price'=>$spending->price]);
        });
    }
}
