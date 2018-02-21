<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

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
    public function index()
    {
        $todos = Todo::all();
        return view('home', ['todos' => $todos]);
    }

    public function change(Request $request){

      $todo = Todo::find($request->id);
      $todo->status = !$todo->status;
      $todo->save();
      return redirect('/home');
    }

    public function edit(Request $request){
      $todo = Todo::find($request->id);
      return view('update', ['todo' => $todo]);
    }

    public function update(Request $request){
      Todo::where('id', $request->id)->update(['name' => $request->name, 'description' => $request->description]);
      return redirect('/home');
    }

    public function new(){
      return view('create');
    }

    public function create(Request $request){

      Todo::insert(['name' => $request->name, 'description' => $request->description]);

      return redirect('/home');

    }

    public function delete(Request $request){
      Todo::where('id', $request->id)->delete();
      return  redirect('/home');

    }
}
