<h1>Edit Form</h1>
<form action="{{route('editStudent')}}" method="post">
    @csrf 

    <input type="hidden" name="id" value="{{$student->id}}">
    <label>Firstname: </label>
    <input type="text" name="fname" value="{{old('fname', $student->fname)}}">
    @error('fname')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror

    <br>

    <label>Lastname: </label>
    <input type="text" name="lname" value="{{old('lname',  $student->lname)}}">
    @error('lname')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror
    <br>

    <label>Address: </label>
    <input type="text" name="addr" value="{{old('addr',  $student->addr)}}">
    @error('addr')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror
    <br>

    <label>Birthday: </label>
    <input type="date" name="bday" value="{{old('bday',  $student->bday)}}">
    @error('bday')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror
    <br>

    <label>Photo: </label>
    <input type="file" name="photo" value="{{old('photo',  $student->photo)}}">
    @error('photo')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror
    <br>

    <label>email: </label>
    <input type="email" name="email" value="{{old('email',  $student->email)}}">
    @error('email')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror
    <br>

    <label>Password: </label>
    <input type="password" name="pwd" value="{{old('pwd',  $student->pwd)}}">
    @error('pwd')
    <span style="color:red">
        {{ $message}}
    </span>
    @enderror
    <br>


    <input type="submit">
   
</form>