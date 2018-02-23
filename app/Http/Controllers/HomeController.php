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




    public function show($id){
      $todo = Todo::find($id);
      return view('update', ['todo' => $todo]);
    }




    public function update($id, Request $request){
      Todo::where('id', $id)->update(['name' => $request->name, 'description' => $request->description]);
      return redirect('/home');
    }




    public function create(){
      return view('create');
    }




    public function store(Request $request){

      Todo::insert(['name' => $request->name, 'description' => $request->description]);

      return redirect('/home');
    }




    public function destroy($id){
      Todo::where('id', $id)->delete();
      return  redirect('/home');

    }
}
