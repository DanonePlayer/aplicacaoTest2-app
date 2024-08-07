@extends("master")

@section("content")


<h2>Register</h2>

@if (session()->has("message"))
    {{ session()->get("message") }}

@endif


<form action="{{ route("register.store") }}" method="post">
    
    @csrf
    <input type="text" name="name" placeholder="Your name" value="Carlos">

    <input type="text" name="email" placeholder="Your email" value="ce6519@gmail.com">

    <input type="text" name="password" placeholder="Your password" value="12345678">
    <button class="btn btn-success" type="submit">Create</button>
</form>

@endsection
