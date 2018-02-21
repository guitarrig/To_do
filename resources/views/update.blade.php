@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Update your plans!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{route('update')}}">
                      {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$todo->id}}">
                    <input type="text" name="name" value="{{$todo->name}}">
                    <input type="text" name="description" value="{{$todo->description}}">
                    <input type="submit" value="Update" class="btn btn-success">
                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
