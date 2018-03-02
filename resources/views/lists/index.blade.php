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
                    <br><form action="{{route('lists.create')}}">
                      @method('GET')
                      <input type="submit" value="Create!" class="btn btn-secondary">
                    </form>
                </div>
                    <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>User</th>
                      <th>Name</th>
                      <th>Private</th>
                      <th>№ todos</th>
                      <th>Change Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 0; ?>
                    @foreach ($lists as $list)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$list->user->name }}</td>
                      <td><a href="{{ route('lists.show', $list->id)}}">{{$list->name}}</a></td>
                      @if ($list->private)
                      <td>Private</td>
                      @else
                      <td>Public</td>
                      @endif
                      <td>
                        <form method="post" action="{{ route('lists.destroy', $list->id)}}">
                          {{ csrf_field() }}
                          @method('DELETE')
                          <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                      </td>
                      <td>
                      <form method="post" action="{{ route('lists.edit', $list->id)}}">
                        {{ csrf_field() }}
                        @method('GET')
                        <input type="submit" value="Edit" class="btn btn-success">
                      </form>
                      </td>
                    </tr>
                    @endforeach;
                  <div class="pagination">  </div>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
