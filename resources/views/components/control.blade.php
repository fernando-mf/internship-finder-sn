<div class="form-group{{ $errors->has($c_name) ? ' has-error' : '' }}">
	<label for="{{$c_name}}" class="col-md-4 control-label">{{$c_description}}</label>

	<div class="col-md-6">
		{{--  Control slot  --}}
        {{$slot}}
        @if ($errors->has($c_name))
		<span class="help-block">
			<strong>{{ $errors->first($c_name) }}</strong>
		</span>
		@endif
	</div>
</div>