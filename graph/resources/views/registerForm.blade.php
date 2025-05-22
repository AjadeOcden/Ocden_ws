<h1>registration Form</h1>
<form action="{{route('registerStudent')}}" method="post">
    @csrf 
    <label>Firstname: </label>
    <input type="text" name="fname" value="{{old('fname')}}">
    @error('fname')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror

    <br>

    <label>Lastname: </label>
    <input type="text" name="lname" value="{{old('lname')}}">
    @error('lname')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror
    <br>

    <label>Address: </label>
    <input type="text" name="addr" value="{{old('addr')}}">
    @error('addr')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror
    <br>

    <label>Birthday: </label>
    <input type="date" name="bday" value="{{old('bday')}}">
    @error('bday')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror
    <br>

    <label>Photo: </label>
    <input type="file" name="photo" value="{{old('photo')}}">
    @error('photo')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror
    <br>

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

     <input type="checkbox" name="receipt" value="1">

    <input type="submit">
   
</form>