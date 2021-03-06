@extends('layouts.app')
@section('title', 'Svi glumci')
@section('content_header')
<h1>Glumci</h1>
@stop


@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Laravel > 7.* -->
@error('success') 
<div class="alert alert-success">{{ $success }}</div>
@enderror

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h3>Lista glumaca:</h3>
{{--
//print_r($glumci);
//dd($glumci); //display and die
--}}

{{ $glumci->links() }}
<ol start="{{ $glumci->firstItem() }}" > 
    @foreach ($glumci as $g)


    <li>
        <a href='{{url("/actors/{$g->actor_id}/edit")}}'>
            <i class="fas fa-edit"></i></a>
   
        <form style="display:inline" name="actor_delete" action="{{url("/actors/{$g->actor_id}")}}" method="POST" enctype="multipart/form-data">
            @method('delete')
            @csrf
            <button type="submit" style="color: blue">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </form>  

        &nbsp;&nbsp;<a href='{{url("/actors/{$g->actor_id}")}}'> {{$g->first_name }} {{$g->last_name}}</a>
    </li>

    @endforeach
</ol>
{{ $glumci->links() }}
<a href='{{route('actors.create')}}'>
    <i class="fas fa-plus"></i> Dodaj novu glumicu/glumca</a>
@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop
