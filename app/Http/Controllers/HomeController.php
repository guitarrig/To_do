<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;


use Auth;

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

        $todos = Todo::with('user')->latest('id')->paginate(5);
        return view('home', ['todos' => $todos]);
    }




    public function change(Request $request){
      $todo = Todo::find($request->id);
      $todo->status = !$todo->status;
      $todo->save();
      return \Redirect::back();
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
      $user = Auth::id();
      Todo::insert(['name' => $request->name, 'description' => $request->description, 'user_id' => $user]);

      return redirect('/home');
    }

    public function list_create($id){
      return view('lists.addTodo', ['id' => $id]);
    }

    public function list_store( Request $request){
      $user = Auth::id();
      Todo::insert(['name' => $request->name,
                    'description' => $request->description,
                    'user_id' => $user,
                    'list_id' => $request->id]);
        return redirect('lists/'.$request->id);
    }



    public function destroy($id){
      Todo::where('id', $id)->delete();
      return  \Redirect::back();

    }
}
