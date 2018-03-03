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
                    <br><form method="post" action="{{route('list_create', $list_id)}}">
                      {{csrf_field()}}
                      @method('GET')
                      <input type="submit" value="Create new todo!" class="btn btn-secondary">
                    </form>
                </div>
                    <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>User</th>
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
                  <div class="pagination"> </div>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
          <div id="disqus_thread"></div>
            <script>

                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                    // var disqus_config = function () {
                    // this.page.url = {{ Request::url()}};  // Replace PAGE_URL with your page's canonical URL variable
                    // this.page.identifier = {{ $list_id}}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    // };

                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://practice-13.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    </div>
</div>
@endsection
