@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">New wish!  <?php print_r($id);?></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('list_store') }}">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                              <input type="type" name="name" class="form-control" >
                              <input type="hidden" name="id" value="{{ $id }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Describe your wish!</label>

                            <div class="col-md-6">
                              <input type="type" name="description" class="form-control" >


                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Create!
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
