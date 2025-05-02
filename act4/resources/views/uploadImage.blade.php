<!DOCTYPE html>
<html>
<head>
    <title>Laravel Image Upload (Single + Multiple)</title>
</head>
<body>
    <h1>Single Image Upload</h1>
    <form action="{{ route('storeSingle') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>

    <h1>Multiple Images Upload</h1>
    <form action="{{ route('storeMultiple') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="file" name="images[]" multiple required>
        <button type="submit">Upload</button>
    </form>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('success') }}</p>
    @endif
    <hr>
    <h2>Uploaded Images</h2>
    <p>Showing {{ ($page - 1) * $perPage + 1 }} –
        {{ min($page * $perPage, $total) }} of {{ $total }} images</p>


    <div style="display: flex; flex-wrap: wrap;">
    @foreach($images as $image)
        <div style="margin: 10px;">
            <img src="{{ asset('images/' . basename($image)) }}" width="150">
            <form action="{{ route('delete') }}" method="post">
                @csrf
                <input type="hidden" name="filename" value="{{ basename($image) }}">
                <input type="submit" value="DELETE">
            </form>
        </div>
    @endforeach
</div>

<div style="margin-top: 20px;">
    
        <div>
            @if($page > 1)
                <a href="{{ route('create', ['page' => $page - 1]) }}">Previous</a>
            @endif

            @if($page * $perPage < $total)
                <a href="{{ route('create', ['page' => $page + 1]) }}" style="margin-left: 10px;">Next</a>
            @endif
        </div>
</div>


</body>
</html>

