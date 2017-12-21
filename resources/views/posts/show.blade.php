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
            @if(Auth::user()->id == $post->user_id or auth()->guard('admin')->check())
                <a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-default">Éditer</a>

                @auth('admin')
                    <div class="pull-right">
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#smallModal">Supprimer</a>
                    </div>

                    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"><strong>Êtes-vous sûr de vouloir supprimer cette publication?</strong></h4>
                                </div>
                                <div class="modal-body text-center">
                                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                                    {{Form::submit('Oui', ['class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            @endif
        @endif
    </div>
@endsection