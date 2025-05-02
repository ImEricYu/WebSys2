

<!DOCTYPE html>
<html>

<head>
    <title>Laravel Image Upload (Single + Multiple)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f3ff;
        }

        .btn-purple {
            background-color: #6f42c1;
            color: white;
        }

        .btn-purple:hover {
            background-color: #5a32a3;
            color: white;
        }

        .card-purple {
            border: 1px solid #6f42c1;
        }

        .text-purple {
            color: #6f42c1;
        }

        .border-purple {
            border-color: #6f42c1 !important;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center mb-4">
            <div class="col-md-5">
                <div class="card shadow-sm p-4 card-purple">
                    <h4 class="mb-3 text-purple">Single Image Upload</h4>
                    <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input type="file" class="form-control border-purple" name="image" required>
                            <button class="btn btn-purple" type="submit">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shadow-sm p-4 card-purple">
                    <h4 class="mb-3 text-purple">Multiple Images Upload</h4>
                    <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input type="file" class="form-control border-purple" name="images[]" multiple required>
                            <button class="btn btn-purple" type="submit">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center mb-4">
            <h4 class="fw-bold text-purple">Uploaded Images</h4>
        </div>

        <div class="row justify-content-center">
            @foreach($photos as $photo)
                <div class="col-md-3 col-sm-6 mb-4 d-flex flex-column align-items-center">
                    <div class="card shadow-sm card-purple">
                        <img src="{{ asset('images/' . $photo->image) }}" alt="Photo" class="img-fluid rounded" style="height: 200px; object-fit: cover;">
                    </div>
                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $photos->links() }}
        </div>
    </div>
</body>

</html>
