
<form method="POST" action="/canceled/email/{{$id}}/{{$token}}">
	{{csrf_field()}}
	<textarea name="reason"></textarea><br>
	<button type="submit" href="" class="btn btn-default">button</button>
</form>