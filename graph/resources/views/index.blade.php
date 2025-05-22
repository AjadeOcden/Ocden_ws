<h1>Student List</h1>
<form action="{{route('logout')}}" method="post">
    @csrf 
    <input type="submit" value="logout">
</form>

<form method="GET" action="{{ route('index') }}">
    <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>
<table border="1">
    <thead>
        <tr>
            <td>Id</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Address</td>
            <td>Bday</td>
            <td>Age</td>
            <td>Photo</td>
            <td>Email</td>
            <td>Password</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @if($students->isEmpty())
        <tr>
            <td>no data available</td>
        </tr>
        @else
            @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->fname}}</td>
                <td>{{$student->lname}}</td>
                <td>{{$student->addr}}</td>
                <td>{{$student->bday}}</td>
                <td>{{$student->age}}</td>
                <td>{{$student->photo}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->pwd}}</td>
                <td>
                    <a href="{{route('editForm', ['id' => $student->id])}}">edit</a>
                    <a href="{{route('delete', ['id' => $student->id])}}">delete</a>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>


<h1>Logs</h1>
<table border="1">
    <thead>
        <tr>
            <td>name</td>
            <td>time in</td>
            <td>time out</td>
            <td>date</td>
            <td>remarks</td>
        </tr>
    </thead>

    <tbody>
        @foreach($logs as $log)
        <tr>
            <td>{{$log->name}}</td>
            <td>{{$log->in}}</td>
            <td>{{$log->out}}</td>
            <td>{{$log->date}}</td>
            <td>{{$log->remarks}}</td>
        </tr>
        @endforeach
    </tbody>
</table>