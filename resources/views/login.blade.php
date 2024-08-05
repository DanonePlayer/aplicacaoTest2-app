@extends("master")

@section("content")

<a href="{{ route("home") }}">Home</a>


<a href="{{ route("login.create") }}">Register</a>
<hr>

<h2>Login</h2>


<h4>
    @if (@session()->has("success"))
        {{ session()->get("success") }}
    @endif
</h4>

<br>

@if (auth()->check())
    Already logged in {{ auth()->user()->name }} | <a href="{{ route("login.destroy") }}">Logout</a>

    <h3>usuarios ja cadastrados</h3>
    <ul>
        @foreach ($users as $user)
        <li>{{ $user->name }} | <a href="{{ route("login.edit", ["user" => $user->id]) }}">Edit</a> | <a href="{{ route("login.destroy") }}">Delete</a></li>
        @endforeach
    </ul>

@else
    @error("error")
        <span>{{ $message }}</span>
    @enderror

    <form action="{{ route("login.store") }}" method="post">
        @csrf
        <input type="text" name="email" value="ce6519@gmail.com">
        @error("email")
            <span>{{ $message }}</span>
        @enderror
        <input type="password" name="password" value="@carlos1">
        @error("password")
            <span>{{ $message }}</span>
        @enderror
        <button type="submit">Login</button>
    </form>
@endif

@endsection
