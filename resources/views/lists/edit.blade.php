@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">UPDATE</div>

                <div class="card-body">
                    <form method="post"  action="{{ route('lists.update', $list->id) }}">
                        {{csrf_field()}}
                        @method('PUT')
                        <div class="form-group row">
                            <label  class="col-sm-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                              <input type="type" name="name" class="form-control" value="{{$list->name}}" >
                              <label> Private?
                              <input type="checkbox" name='private' value="1"></label>
                            </div>
                        </div>

                        <div class="form-group row">



                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Update!
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
