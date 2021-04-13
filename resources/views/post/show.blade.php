@extends('layouts.master')

@section("title", $data["post"]->getName())

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @include('util.message')
                <div class="card-header">{{__('messages.postNumber')}} {{ $data["post"]->getId() }}</div>

                <div class="card-body">
                    <b>{{__("messages.postNameText")}}:</b> {{ $data["post"]->getName() }}<br />
                    <br>
                    <b>{{__("messages.postDescriptionText")}}:</b> {{ $data["post"]->getDescription() }}<br/><br/>
                    <b>{{__("messages.postDateText")}}:</b> {{ $data["post"]->getDate()}}<br/><br/>

                    <b>{{__("messages.postCommentText")}}:</b> <br/>
                        @foreach($data["post"]->comments as $comment)
                            <br>
                            <i> {{ $comment->getMessage() }}</i>
                            <br>
                             <i class="datetime">- Date: {{ $comment-> getCommentDate()}} <br/></i>
                        @endforeach
                   
                    <form method="POST" action="{{ route('post.saveComment') }}">
                    @csrf
                    <input type="hidden" placeholder="{{__('messages.placeholderPostText')}}" name="post_id" value="{{ $data['post']->getId() }}" />
                    <br>
                    <textarea  name="message" rows="4" cols="50" placeholder="{{__('messages.placeholderCommentText')}}"></textarea>
                    <br>
                    <input type="submit" value="{{__('messages.buttonCommentText')}}" />
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
