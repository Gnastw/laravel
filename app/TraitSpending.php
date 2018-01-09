<?php

namespace App;

use DB;

trait TraitSpending{

    public function totalSpending():int{
        return DB::table('spendings')
                ->selectRaw('SUM(price) as total')
                ->first()->total?? O;
    }

    public function totalSpendingByUser(){
        return DB::table('users')
            ->join('spending_user', 'users.id' , '=', 'spending_user.user_id')
            ->selectRaw('SUM(price) as total, users.name as name')
            ->groupBy('name')
            ->get();
    }
}