<h1>Login form</h1>
<form action="{{route('loginStudent')}}" method="post">
    @csrf 

    <label>email: </label>
    <input type="email" name="email" value="{{old('email')}}">
    @error('email')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror
    <br>

    <label>Password: </label>
    <input type="password" name="pwd" value="{{old('pwd')}}">
    @error('pwd')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror
    <br>

    <input type="submit">
</form>