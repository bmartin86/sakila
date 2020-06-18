@extends('layouts.app')
@section('title', 'Detalji filma:')
@section('content_header')
<h1>{{$film->title}}</h1>
@stop


@section('content')
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}
</div>
@endif 

<h4>Detalji filma:</h4>


<div class="border border-info rounded-md">
    <h2><span class="alert-success">{{$film->title}} ({{$film->release_year}})</span></h2><br>
    <p class="alert-success">Opis:<br>"{{$film->description}}"</p>
    <p>
    <div class="alert alert-success" role="alert">
        Originalni jezik filma: <a href="/languages/{{$film->original_language_id}}" class="alert-link">
            {{$film->lang_orig()->first()->name}}</a>
    </div>
    <div class="alert alert-success" role="alert">
        Prijevod filma:         <a href="/languages/{{$film->language_id}}" class="alert-link">
            {{$film->lang_trans()->first()->name}}</a>
    </div>
    Duljina najma: {{$film->rental_duration}}<br>
    Cijena najma po danu: €{{$film->rental_rate}}<br>
    Ukupna cijena: €{{$film->rental_rate*$film->rental_duration}}<br>
    </p>
    <p class="alert alert-success" role="alert">
    Ukupno glumaca: {{$film->actors()->count()}}
    </p>
    @foreach ($film->actors()->get() as $g)
    <p style="text-indent: 50px;">
        <i class="far fa-user big"></i><a href='{{url("/actors/{$g->actor_id}")}}'> {{$g->first_name }} {{$g->last_name }}</a>
    </p> 
    @endforeach
</div>
<a href='{{route("films.index")}}'>
    <i class="fas fa-angle-double-left"></i> Natrag na listu filmova</a>
@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop