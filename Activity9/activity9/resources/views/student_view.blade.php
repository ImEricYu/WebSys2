<html>

<head>
    <title>View Student Records</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 60%;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 25px;
            border-radius: 12px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .add-btn {
            text-decoration: none;
            color: white;
            background-color: green;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .add-btn:hover {
            background-color: darkgreen;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            background: white;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background: #007BFF;
            color: white;
        }

        .edit-btn, .delete-btn {
            text-decoration: none;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            display: inline-block;
        }

        .edit-btn {
            background-color: #FFC107;
        }

        .delete-btn {
            background-color: #A50000;
        }

        .edit-btn:hover {
            background-color: #e0a800;
        }

        .delete-btn:hover {
            background-color: #820000;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <span>Student Records</span>
            <a href="/insert" class="add-btn">Add Student</a>
        </div>

        @if (session('success'))
            <div style="color: green; font-size: 15px;">{{ session('success') }}</div>
        @endif

        <br>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td><a href="/edit/{{$user->id}}" class="edit-btn">Edit</a></td>
                        <td><a href="/delete/{{$user->id}}" class="delete-btn">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
