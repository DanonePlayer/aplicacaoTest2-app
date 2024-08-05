@extends("master")

@section("content")

<a href="{{ route("login.destroy") }}">Logout</a>

<h2>Edit</h2>

@if (session()->has("message"))
    {{ session()->get("message") }}

@endif

<form action="{{ route("login.update", ["user" => $user->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" value="{{ $user->name }}">
    <input type="text" name="email" value="{{ $user->email }}">
    <button type="submit">Update</button>
</form>

@endsection
