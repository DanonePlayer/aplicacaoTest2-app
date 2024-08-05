@extends("master")

@section("content")

<a href="{{ route("login.destroy") }}">Logout</a>

<h2>Edit</h2>

<form action="{{ route("login.update", ["user" => $user->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" value="{{ $user->name }}">
    <input type="text" name="email" value="{{ $user->email }}">
    <input type="text" name="senha" value="{{ $user->password }}">
    <button type="submit">Update</button>
</form>

@endsection
