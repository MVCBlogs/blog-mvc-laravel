@extends('layouts.master')
 
@section("title", $data["title"])
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header">{{__("messages.postCreateTitle")}}</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
 
                <form method="POST" action="{{ route('post.save') }}">
                    @csrf
                    <input type="text" placeholder="{{__('messages.placeholderTitleText')}}" name="name" value="{{ old('name') }}" />
                    <input type="text" placeholder="{{__('messages.placeholderDescriptionText')}}" name="description" value="{{ old('price') }}" />
                    <input type="submit" value="{{__('messages.sendButtonText')}}" />
                </form>
 
                </div>
            </div>
        </div>
        <div class="row p-5">
            <div class="col-md-12">
                <ul id="errors">
                    <h1>{{__('messages.allPostsTitle')}}:</h1>
                    @foreach($data["posts"] as $post)
                    <br>
                     <li>Post N. {{ $post->getId() }} - Title: {{$post->getName()}} - <a href="{{route('post.show',['id' => $post->getId()])}}"> {{__("messages.showDetails")}} </a></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection
