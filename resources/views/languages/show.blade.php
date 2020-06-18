@extends('layouts.app')
@section('title', 'Detalji jezika')
@section('content_header')
<h1>Jezik</h1>
@stop


@section('content')
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}
</div>
@endif 

<h4>Detalji jezika {{$jez->name}}:</h4>

<h5>Broj filmova ciji je originalni jezik {{$jez->name}}: 
    <a href="/films/lang/{{$jez->language_id}}"> <span class="badge badge-secondary">
            {{$jez->films()->count()}} </span> list ></a></h5>

<h5>Broj filmova koji je preveden na {{$jez->name}}: 
    <a href="/films/langtrans/{{$jez->language_id}}"><span class="badge badge-secondary"> 
            {{$jez->films_prevedeni()->count()}} </span> list ></a></h5>


<div class="border border-info rounded-md">

    <span class="alert-success"> {{$jez->name}} {{$jez->last_update}} </span><br>
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    <br>  

</div>

<a href='{{route("languages.index")}}'>
    <i class="fas fa-angle-double-left"></i> Natrag na popis jezika</a>

@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop