@extends('layouts.app')
@section('title', 'Detalji glumice/glumca')
@section('content_header')
<h1>Glumica/glumac</h1>
@stop


@section('content')
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}
</div>
@endif 

<h3>Detalji glumice/glumca:</h3>

<div class="border border-info rounded-md">
    <table>
        <thead>
            <tr>
                <th>{{$actor->first_name}} {{$actor->last_name}}</th>
            </tr>
            <tr>
                <th><i class="fas fa-user-tie"></i></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="{{asset('storage/actor.jpg')}}" alt=""/></td>
            </tr>  
            <tr>
                <td>{{$actor->actor_id}} {{$actor->last_update}}<br>
                    "Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s 
                    with the release of Letraset sheets containing Lorem Ipsum passages, 
                    and more recently with desktop publishing software like Aldus PageMaker 
                    including versions of Lorem Ipsum."
                </td>
            </tr>
            <tr>
                <td style="padding: 20px">
                    <ul class="list-group">
                        <li class="list-group-item  list-group-item-success">Lista filmova u kojima glumi:</li>
                        @foreach ($actor->films()->get() ?? '' as $f)
                        <li class="list-group-item"><a href='{{url("/films/{$f->film_id}")}}'>
                                {{Str::title($f->title)}} ({{$f->release_year }})</a></li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<a href='{{route("actors.index")}}'>
    <i class="fas fa-angle-double-left"></i> Natrag na popis glumaca</a>
@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop