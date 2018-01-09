<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestSheepForm;
use App\Spending;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spendings = Spending::orderBy('created_at', 'DESC')->with('users')->paginate(env('APP_PAGINATE'));

        return view('back.spending.index',compact('spendings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id')->all();
        return view('back.spending.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestSheepForm $request)
    {
        $part = count($request->users); // nombre de personne qui ont été coché

        /*if($part === 0) {
        // throw new \DivisionByZeroError("Impossible de diviser par zéro");

      return back()->with('message', ['type' => 'alert', 'content' => 'Impossible de diviser par zéro']);
   }	*/

        $spending = Spending::create($request->all()); // assignation de masse

        $spending->users()->attach($request->users, ['price' => $request->price/$part]);

        return redirect()->route('spending.index')->with('message', 'Create Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spending = Spending::find($id);

        return view('back.spending.show',compact('spending'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spending = Spending::find($id);
        $users = User::pluck('name','id')->all();
        return view('back.spending.edit',compact('spending','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestSheepForm $request, $id)
    {


        $spending = Spending::find($id);

        $part = count($request->users); // nombre de personne qui ont été coché

        $spending->update($request->all());
        $spending->users()->detach();
        $spending->users()->attach($request->users, ['price' => $request->price/$part]);

        return redirect()->route('spending.index')->with('message', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spending = Spending::find($id);
        $spending->delete();

        return redirect()->route('spending.index')->with('message', 'deleted success');
    }
}
