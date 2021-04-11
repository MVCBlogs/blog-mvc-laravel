@extends('layouts.master')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{__("messages.welcomeTitle")}}</div>

                    <div class="card-body">

                    <a href="post/create" class="btn-enlace">{{__("messages.buttonText")}}</a>
                        
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
