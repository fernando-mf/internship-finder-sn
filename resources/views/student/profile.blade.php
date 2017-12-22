@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{$user->getName()}}</h4>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <span class="col-md-12"><strong>Programme : </strong>{{$user->program->getName()}}</span>
                    </div>
                    <div class="row">
                        <span class="col-md-12"><strong>Adresse Courriel : </strong>{{$user->email}}</span>
                    </div>
                    <br>
                    <div class="row">
                        <span class="col-md-12">
                            <a href="{{ route('user.edit')}}">Modifer mes informations</a>
                        </span>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            @if(count($user->posts) > 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><strong>Vos publications</strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach($user->posts as $post)
                                            <div class="list-group-item">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="{{route('posts.show', ['index' => $post->id ])}}">{{$post->title}}</a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <span class="col-md-12"><small>Publié le {{$post->getDateString()}}</small></span>
                                                </div>
                                            </div>
                                        @endforeach 
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ route('posts.create') }}">Ajouter une publication</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
