@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hellow, {{ Auth::user()->name }}
                    <form method="post" action="{{route('new')}}">
                      {{csrf_field()}}
                      <input type="submit" value="Create!" class="btn btn-secondary">
                    </form>
                </div>

                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>name</th>
                      <th>You`re going to do =)</th>
                      <th>Status</th>
                      <th>Change Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 0; ?>
                    @foreach ($todos as $todo)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$todo->name}}</td>
                      <td>{{$todo->description}}</td>
                      <td>{{$todo->status}}</td>
                      <td>
                        <form method="post" action="{{ route('change_status')}}">
                          {{csrf_field()}}
                          <input type="hidden" name="id" value="{{$todo->id}}">
                          <input type="submit" class="btn btn-primary" value="Change">
                        </form>
                      </td>
                      <td>
                        <form method="post" action="{{ route('edit')}}">
                          {{ csrf_field() }}
                          <input type="hidden" name="id" value="{{$todo->id}}">
                          <input type="submit" value="Edit" class="btn btn-success">
                        </form>
                      </td>
                      <td>
                        <form method="post" action="{{ route('delete')}}">
                          {{ csrf_field() }}
                          <input type="hidden" name="id" value="{{$todo->id}}">
                          <input type="submit" class="btn btn-danger" value="Delete">
                        </form>

                      </td>

                    </tr>
                    @endforeach;
                  </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
