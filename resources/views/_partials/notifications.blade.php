@if($message = Session::get('error'))
<div class="alert alert-danger">
    <p>{{$message}}</p>
</div>
@endif

@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

@if($message = Session::get('status'))
<div class="alert alert-info">
    <p>{{$message}}</p>
</div>
@endif

@if(isset($errors) && $errors->count())
	<div class="alert alert-danger">
		@foreach($errors->toArray() as $error)
		<li>{{{ $error[0] }}}</li>
		@endforeach
	</div>
@endif