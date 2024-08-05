@extends("master")

@section("content")

<a href="">Voltar</a>

<h2>Register</h2>

@if (session()->has("message"))
    {{ session()->get("message") }}

@endif

<form action="{{ route("login.store") }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Your name">
    <input type="text" name="email" placeholder="Your email">

    <input type="text" name="password" placeholder="Your password">
    <button type="submit">Create</button>
</form>

@endsection
