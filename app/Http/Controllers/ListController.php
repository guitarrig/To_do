<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;
use App\Todo;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){

       $this->middleware('auth');
     }


    public function index()
    {
        $lists = Lists::all();
        return view('lists.index', ['lists' => $lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('lists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = \Auth::id();
      if($request->private){
        Lists::insert(['name' => $request->name,  'user_id' => $user, 'private' => 1]);
      }else{
        Lists::insert(['name' => $request->name,  'user_id' => $user]);
      }

      return redirect('/lists');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todos = Todo::where('list_id', $id)->get();
        return  view('lists.todos', ['todos' => $todos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = Lists::find($id);
        return view('lists.edit', ['list' => $list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
      if ($request->private) {
        Lists::where('id', $id)->update(['name' => $request->name, 'private' => $request->private]);
      }else {
        Lists::where('id', $id)->update(['name' => $request->name, 'private' => 0]);

      }
      return redirect('/lists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lists::where('id', $id)->delete();
        return redirect('/lists');
    }
}
