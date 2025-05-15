@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="/login">
    @csrf
    <label>Email:</label>
    <input type="text" name="email"><br>
    <label>Password:</label>
    <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>
