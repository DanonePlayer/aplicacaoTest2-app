
<h1>User - {{ $user->name }}</h1>

<form action="{{ route("login.destroy", ['login'=> $user->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Delete</button>
</form>

