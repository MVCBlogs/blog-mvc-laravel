@extends('layouts.master')

@section("title", $data["title"])
@section("description", $data["description"])

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <div class="post-preview">
        <h2 class="post-title">
          {{ $data["post"]->getTitle() }}
        </h2>
        <p class="post-meta">Posted by
          <span class="font-bold">Admin</span>
          on {{ $data["post"]->getCreatedAt() }}</p>
        <p class="post-subtitle font-300">
          {{ $data["post"]->getDescription() }}
        </p>
      </div>
      <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <h2 class="post-title">Comments</h2>
      <ul>
      @foreach($data["post"]->comments as $comment)
        <li>{{ $comment->getMessage() }} - {{ $comment->getCreatedAt()}}
          <form method="POST" action="{{ route('posts.deleteComment',['id' => $comment->getId()]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure to delete this comment?');" class="submit-delete">
                <i class="fa fa-trash-alt" aria-hidden="true"></i>
            </button>
          </form>
        </li>
      @endforeach
      </ul>
      <hr>
      <br />
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      @include('util.message')
      <div class="card">
        <div class="card-header">
          Create a new comment
        </div>
        <div class="card-body">
          @if($errors->any())
            <ul class="errors">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          @endif
          <form method="POST" action="{{ route('posts.saveComment') }}">
            @csrf
            <div class="form-group">
              <label>Comment message:</label>
              <textarea class="form-control" name="message" value="{{ old('message') }}" rows="3" placeholder="Enter message"></textarea>
            </div>
            <input type="hidden" name="post_id" value="{{ $data['post']->getId() }}" />
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
