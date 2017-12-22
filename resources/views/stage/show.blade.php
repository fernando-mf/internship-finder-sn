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
    </div>
@endsection