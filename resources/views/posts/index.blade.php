@extends('layouts.app') 

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="main">Toutes les publications</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <a href="{{route('posts.create')}}" class="btn main">Ajouter votre expérience de stage</a>
        </div>
    </div>
    <br>

    @if(count($posts) > 0)
        <div class="list-group"> 
            @foreach($posts as $post)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-6 col-xs-6 text-left">
                            <small class="text-muted">Publié par {{$post->getUserName()}} </small>
                        </div>
                        <div class="col-md-6 col-xs-6 text-right">
                             <span class="badge text-muted">{{$post->getDateString()}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('posts.show', ['index' => $post->id ])}}">{{$post->title}}</a>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
        <div class="text-center">
            {{$posts->links()}}
        </div> 
    @else
        <p>Il n'y pas des publications pour l'instant</p>
    @endif 
@endsection