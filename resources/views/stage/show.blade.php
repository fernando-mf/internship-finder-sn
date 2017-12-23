@extends('layouts.app')

@section('content')
    <div class="well">
        <h1>
            {{$job->title}}
        </h1>
        <br>
        <div class="row">
            <div class="col-md-12">
                <strong>Catégorie : </strong> {{$job->category->name}}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <strong>Programme : </strong> {{$job->category->program->getName()}}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <strong>Entreprise : </strong> <a href="{{route('companies.show', ['company' => $job->company->id ])}}">{{$job->company->name}}</a>
            </div>
        </div>
        <br>
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <br>
                    {!!$job->description!!}
                    <br>
                </div>
            </div>
        </div>
        <hr>
        @auth('admin')
                <a href="{{route('stages.edit', ['stage' => $job->id])}}" class="btn btn-default">Éditer</a>
                <div class="pull-right">
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#smallModal">Supprimer</a>
                </div>

                <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><strong>Êtes-vous sûr de vouloir supprimer cette offre de stage?</strong></h4>
                            </div>
                            <div class="modal-body text-center">
                                {!!Form::open(['action' => ['JobController@destroy', $job->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                                {{Form::submit('Oui', ['class' => 'btn btn-danger'])}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
        @endauth
    </div>
@endsection