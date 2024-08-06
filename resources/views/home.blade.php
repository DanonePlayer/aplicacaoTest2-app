@extends("master")

@section("content")

<a href="{{ route("login.index") }}">Login</a>

<a href="{{ route("register.create") }}">Register</a>

<hr>
<h2>Home</h2>

@endsection
