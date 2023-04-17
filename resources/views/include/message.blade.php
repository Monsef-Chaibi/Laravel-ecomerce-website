@if ($message=Session::get('success'))
<div class="alert alert-primary" role="alert">
        {{$message}}
    </div>
@endif
@if ($message=Session::get('error'))
    <div class="alert alert-danger">
        {{$message}}
    </div>
@endif