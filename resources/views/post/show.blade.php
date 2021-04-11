@extends('layouts.master')

@section("title", $data["posts"]->getName())

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @include('util.message')
                <div class="card-header">{{__('messages.postNumber')}} {{ $data["posts"]->getId() }}</div>

                <div class="card-body">
                    <b>{{__("messages.postnameText")}}:</b> {{ $data["posts"]->getName() }}<br />
                    <br>
                    <b>{{__("messages.postdescriptionText")}}:</b> {{ $data["posts"]->getDescription() }}<br/><br/>
                    <b>{{__("messages.postdateText")}}:</b> {{ $data["posts"]->created_at->format('y-m-d')}} - {{ $data["posts"]->created_at->format('h:i') }}<br/><br/>

                    <b>{{__("messages.postcommentText")}}:</b> <br/>
                        @foreach($data["posts"]->comments as $comment)
                            <br>
                            <i> {{ $comment->getMessage() }}</i>
                            <br>
                             <i class="datetime">- Date: {{ $comment-> created_at->format('y-m-d H:i:s')}} <br/></i>
                        @endforeach
                   
                    <form method="POST" action="{{ route('post.saveComment') }}">
                    @csrf
                    <input type="hidden" placeholder="{{__('messages.placeholderpostText')}}" name="post_id" value="{{ $data['posts']->getId() }}" />
                    <br>
                    <textarea  name="message" rows="4" cols="50" placeholder="{{__('messages.placeholdercommentText')}}"></textarea>
                    <br>
                    <input type="submit" value="{{__('messages.buttoncommentText')}}" />
                    </form>
                    <br>
                    <a href="../create">{{__("messages.backButton")}}</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
  <!-- <input type="int" placeholder="Enter Stars (0 to 5)" name="stars" value="{{ old('name') }}" />
                    <br> -->
