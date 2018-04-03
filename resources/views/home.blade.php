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

                    @lang('new.welcome'), {{ Auth::user()->name }}
                    <br><form action="{{route('todos.create')}}">
                      {{csrf_field()}}
                      @method('GET')
                      <input type="submit" value=@lang('new.create') class="btn btn-secondary">
                    </form>
                </div>
                    <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>@lang('new.user')</th>
                      <th>@lang('new.name')</th>
                      <th>@lang('new.description')</th>
                      <th>@lang('new.status')</th>
                      <th>@lang('new.change_status')</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 0; ?>
                    @foreach ($todos as $todo)
                    <tr>
                      <td>{{++$i}}</td>
                      <td><a href="{{route('show_user', $todo->user)}}">{{$todo->user->name}}</a></td>
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
                        <form method="post" action="{{ route('todos.show', $todo->id)}}">
                          {{ csrf_field() }}
                          @method('GET')
                          <input type="submit" value="Edit" class="btn btn-success">
                        </form>
                      </td>
                      <td>
                        <form method="post" action="{{ route('todos.destroy', $todo->id)}}">
                          {{ csrf_field() }}
                          @method('DELETE')
                          <input type="submit" class="btn btn-danger" value="Delete">
                        </form>

                      </td>

                    </tr>
                    @endforeach;
                  <div class="pagination">  {{$todos->links()}}</div>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
