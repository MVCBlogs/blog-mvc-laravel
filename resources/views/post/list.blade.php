@extends('layouts.master')
 
@section("title", $data["title"])
@section("description", $data["description"])
 
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($data["posts"] as $post)
        <div class="post-preview">
          <a href="{{route('posts.show',['id' => $post->getId()])}}">
            <h2 class="post-title">
              {{ $post->getTitle() }}
            </h2>
          </a>
          <h3 class="post-subtitle font-300">
            {{ $post->getDescription() }}
          </h3>
          <p class="post-meta">Posted by
            <span class="font-bold">Admin</span>
            on {{ $post->getCreatedAt() }}</p>
        </div>
        <hr>
      @endforeach
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <div class="card">
        <div class="card-header">
          Create a new post
        </div>
        <div class="card-body">
          @if($errors->any())
            <ul class="errors">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          @endif
          <form method="POST" action="{{ route('posts.save') }}">
            @csrf
            <div class="form-group">
              <label>Post title:</label>
              <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter title">
            </div>
            <div class="form-group">
              <label>Post description:</label>
              <textarea class="form-control" name="description" value="{{ old('description') }}" rows="3" placeholder="Enter description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
