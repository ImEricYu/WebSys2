<html>

<head>
    <title>Student Management | Add</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 40%;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 25px;
            border-radius: 12px;
            text-align: center;
        }

        h2 {
            margin-bottom: 15px;
            color: #333;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .btn-submit {
            background-color: #007BFF;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add Student</h2>

        <form action="/create" method="post">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="stud_name" required />
            </div>
            <input type="submit" value="Add Student" class="btn-submit" />
        </form>
    </div>
</body>

</html>
