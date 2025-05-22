<h1>Receipt</h1>
<p>Firstname: {{ $student->fname}}</p>
<p>Lastname: {{ $student->lname}}</p>
<p>Address: {{ $student->addr}}</p>
<p>Birthday: {{ $student->bday}}</p>
<p>Age: {{ $student->age}}</p>
<p>photo: {{ $student->photo}}</p>
<p>email: {{ $student->email}}</p>
<p>password: {{ $student->pwd}}</p>

<a href="{{route('loginForm')}}">Next</a>