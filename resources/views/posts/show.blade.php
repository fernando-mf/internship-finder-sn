@extends('layouts.app')

@section('content')
    {{--  <a href="{{route('posts.index')}}" class="btn btn-default">Retourner</a>
    <br><br>  --}}
    <div class="well">
        <h1>
            {{$post->title}}
        </h1>
        <br>
        <div class="row">
            <div class="col-md-12">
                <strong>Programme : </strong> {{$post->program->name}}
                <br><br>
                {{$post->body}}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                @include('inc.panels.post.companyInfo')
            </div>
            <div class="col-md-6">
                @include('inc.panels.post.contactInfo')
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-6 text-left">
                <small class="text-muted">Publié par {{$post->getUserName()}} le {{$post->getDateString()}}</small>
            </div>
        </div>
        <hr>
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-default">Éditer</a>

                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Supprimer', ['class' => 'btn btn-danger'])}}
                {!! Form::close() !!}
            @endif
        @endif
    </div>
@endsection