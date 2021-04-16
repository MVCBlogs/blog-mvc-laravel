@extends('layouts.master')

@section("title", $data["title"])
@section("description", $data["description"])

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p><span class="font-bold">Application developed by:</span> Angel Ramos - Daniel Correa - Paola Vallejo</p>
      <p>EAFIT University<br />
      Medellín, Colombia<br />
      2021
      </p>
    </div>
  </div>
</div>
@endsection
