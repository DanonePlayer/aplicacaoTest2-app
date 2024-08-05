@extends("master")

@section("content")

<a href="{{ route("login.create") }}">Register</a>

<a href="{{ route("login.index") }}">Login</a>

<hr>
<h2>Home</h2>

@endsection
