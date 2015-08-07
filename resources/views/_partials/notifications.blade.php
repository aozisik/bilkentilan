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