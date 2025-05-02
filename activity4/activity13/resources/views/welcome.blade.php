{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Activity 13</h1>
    <h3>Photo Uploading</h3>
    <a href="{{route('upload')}}">
        <h3>Go to upload</h3>
    </a>
</body>

</html>
 --}}


 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity 13 - Photo Uploading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f5ff;
            font-family: Arial, sans-serif;
        }

        .purple-text {
            color: #6f42c1;
        }

        .btn-purple {
            background-color: #6f42c1;
            color: white;
        }

        .btn-purple:hover {
            background-color: #5a32a3;
            color: white;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column align-items-center justify-content-center vh-100 text-center">
        <h1 class="purple-text mb-3">Activity 13</h1>
        <h3 class="mb-4">Photo Uploading</h3>
        <a href="{{ route('upload') }}" class="btn btn-purple px-4 py-2">Go to Upload</a>
    </div>
</body>

</html>
