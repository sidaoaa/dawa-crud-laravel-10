@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-12 mt-5">
      <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
          <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label class="font-weight-bold">GAMBAR</label>
              <input type="file" class="form-control" name="image">
            </div>

            <div class="form-group">
              <label class="font-weight-bold">JUDUL</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title', $post->title) }}" placeholder="Masukkan Judul Post">

              <!-- error message untuk title -->
              @error('title')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label class="font-weight-bold">KONTEN</label>
              <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                placeholder="Masukkan Konten Post">{{ old('content', $post->content) }}</textarea>

              <!-- error message untuk content -->
              @error('content')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-md btn-success">Update</button>
            <button type="reset" class="btn btn-md btn-danger">Reset</button>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
