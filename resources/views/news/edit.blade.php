@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      News <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('news.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <div class="card-body">
            <form action="{{ route('news.update', ['news' => $news->id_news]) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul_news" class="form-control" value="{{ $news->judul_news }}">
              </div>
              <div class="form-group">
                <label>Potongan</label>
                <textarea name="potongan_news" class="form-control">{{$news->potongan_news}}</textarea>
              </div>
              <div class="form-group">
                <label>Isi</label>
                <textarea name="isi_news" class="form-control">{{$news->isi_news}}</textarea>
              </div>
              <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl_news" class="form-control" value="{{ $news->tgl_news }}">
              </div>
              <div class="form-group">
                <label class="control-label">Gambar</label>
                <input name="gambar" type="file" class="form-control" value="{{ url('/image/'.$news->gambar) }}">
                <input name="hidden_image" type="hidden" class="form-control" value="{{$news->gambar}}">
                <img src="{{ URL::to('/')}}/image/{{ $news->gambar }}" class="img-thumbnail" width="150"/>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection(