<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            border-radius: 50%;
            width: 70px;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Random Users</h2>

    @if (count($users) > 0)
        <table>
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td><img src="{{ $user['picture']['large'] }}" alt="User Picture"></td>
                        <td>{{ $user['name']['first'] }} {{ $user['name']['last'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['location']['country'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align:center;">No users found.</p>
    @endif
</body>
</html>
