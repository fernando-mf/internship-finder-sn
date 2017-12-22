@extends('layouts.app')

@section('content')
    @include('inc.errors')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Modifier vos informations</strong></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('user.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Prénom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$user->fname) }}"  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                            <label for="lname" class="col-md-4 control-label">Nom de famille</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname', $user->lname) }}" >

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('program') ? ' has-error' : '' }}">
                            <label for="program" class="col-md-4 control-label">Programme</label>

                            <div class="col-md-6">
                                
                                <select name="program" id="program" class="form-control">
                                    <option value="1">Sélectionnez votre programme</option>
                                    @foreach(App\Program::all()->where('code', '!=', '0') as $program)
                                        @if(old('program',$user->program_id) == $program->id)
                                            <option selected="selected" value="{{$program->id}}">{{$program->name}} - {{$program->code}}</option>
                                        @else
                                            <option value="{{$program->id}}">{{$program->name}} - {{$program->code}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if ($errors->has('program'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('program') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Adresse courriel</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Modifier
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection