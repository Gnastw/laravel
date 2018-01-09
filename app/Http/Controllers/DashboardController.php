<?php

namespace App\Http\Controllers;

use App\Part;
use App\Spending;
use App\User;
use Illuminate\Http\Request;
use App\TraitSpending;

class DashboardController extends Controller
{
    use TraitSpending;

    public function index()
    {
        $total = $this->totalSpending();
        $spendings = $this->totalSpendingByUser();
//        echo '<div class="grid">'.PHP_EOL;
//        foreach($spendings as $user_info){
//            $username = $user_info->name;
//            $user_pourcent = number_format($user_info->total/$total*100).'%';
//            echo $username.' '.$user_pourcent.'<br/>';
//        }
//        echo '</div>'.PHP_EOL;
        $lastSpendings = Spending::orderBy('created_at', 'DESC')->take(3)->get();

        return view('back.dashboard',compact('total','spendings','lastSpendings'));
    }

    public function balance(){
        $users = User::all();
        $totalspending = Spending::sum('price');
        $totalpart = Part::sum('days');
        $pricepart = $totalspending/$totalpart;
        return view('back.balance', compact('users','pricepart','totalspending'));
    }
}
