@if(count($errors))

<div class="alert alert-danger">

@foreach($errors->all() as $error)
<center>
<li>
{{$error}}
</li>
</center>
@endforeach

</div>
@endif