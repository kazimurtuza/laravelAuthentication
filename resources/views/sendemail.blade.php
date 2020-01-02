@extends('layouts.app')

@section('content')
<div class="container">
<h1>all email iuereritiueruteuwuti </h1>
<div class="bg-info">
<h2>login parson information</h2>
{{Auth::user()}}
</div>
</div>
<br><br>

<div class="container">
<table class="table table-bordered">
<thead>
<tr>
<th>id</th>
<th>email</th>
<th>action</th>
</tr>
</thead>
@foreach(\App\user::all() as $user)
<tbody>
<tr>
<td>{{$user->id}}</td>
<td>{{$user->email}}</td>
<td>  
<form action="{{route('sendtoemail')}}" method="post">
@csrf
<input class="btn btn-success" type="hidden" name="id" value="{{$user->id}}">
<input class="btn btn-success" type="submit"  value="send email">
</form>
</td>

</tr>

</tbody>
@endforeach

</table>

</div>




@endsection