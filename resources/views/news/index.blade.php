@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>News</h1>
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
            <a href="{{ route('news.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{route('news.create')}}">
              <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</button>
            </a>
            &nbsp;
            <a href="export_news">
              <button type="button" class="btn btn-success"><i class="fa fa-print"></i> Export Excel</button>
            </a>
            &nbsp;
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Potongan</th>
                  <th scope="col">Isi</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $news)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $news->judul_news }}</td>
                  <td>{{ $news->potongan_news }}</td>
                  <td>{{ substr($news->isi_news, 0,  100) }}</td>
                  <td>{{ $news->tgl_news }}</td>
                  <td><img width="120px" src="{{ url('/image/'.$news->gambar) }}"></td>
                  <td>
                    <form action="{{ route('news.destroy', $news->id_news) }}" method="POST">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-warning edit_modal color" href="{{ route('news.edit', $news->id_news) }}"><i class="fas fa-pen"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger delete color" onclick="return confirm('Are you sure to delete this data ?');"><i class="fas fa-trash"></i></button>
                        </div>
                    </form>
                  </td>
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