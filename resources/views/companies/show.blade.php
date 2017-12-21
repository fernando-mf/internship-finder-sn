@extends('layouts.app')

@section('content')
    {{--  <a href="{{route('companies.index')}}" class="btn btn-default">Retourner</a>
    <br><br>  --}}
    <div class="well">
        <h1><strong>{{$company->name}}</strong></h1>

        <div class="row">
            <div class="col-md-12">
                <strong>Site web : </strong> <a href="{{$company->website}}" target="_blank">{{$company->website}}</a>
            </div>
        </div>
        <br>

        @if($company->phone != null)
            <div class="row">
                <div class="col-md-12">
                    <span class="glyphicon glyphicon-earphone icon-sp" aria-hidden="true"></span>
                    <a href="tel:{{$company->phone}}" target="_top">{{$company->phone}}</a>
                </div>
            </div>
            <br>
        @endif
        
         @include('inc.panels.company.contact')
          
        {{--  Amin controls  --}}
        {{--  @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Éditer</a>
                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Supprimer', ['class' => 'btn btn-danger'])}}
                {!! Form::close() !!}
            @endif
        @endif  --}}
    
    @if(count($company->posts) > 0)
        <h4 style="text-decoration:underline;"><strong>Publications liées à cette entreprise</strong></h4>
        <div class="row">
            <div class="col-md-12">
                <div class="list-group"> 
                    @foreach($company->posts as $post)
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
            </div>
        </div>
    @endif
        <hr>
    </div>
@endsection