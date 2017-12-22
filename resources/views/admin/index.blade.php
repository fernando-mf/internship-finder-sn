@extends('layouts.app')

@section('content')
    <h1 class="main text-center">
        Bonjour {{Auth::user()->name}}
    </h1>
@endsection