@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>User</h1>
  </div>
  @if ($message = Session::get('success'))
    <div class="card">
        <div class="card-body">
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
        </div>
    </div>
  @endif
  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
              </div>
            </form>
            <a href="{{ route('user.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $user)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {!! $data->appends(request()->except('page'))->render() !!}
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
            </nav>
          </div>
        </div>
      </div>  
  </div>

</section>

@endsection()