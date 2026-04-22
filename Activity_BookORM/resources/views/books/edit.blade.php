<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <div class="container py-5 flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="w-100" style="max-width: 500px;">

            <div class="mb-4">
                <a href="{{ route('books.index') }}" class="text-decoration-none text-muted medium fw-medium">&larr; Back to Inventory</a>
            </div>

            <div class="card card-custom p-4 p-md-5 bg-white">
                <h2 class="fs-4 fw-bold text-dark mb-4">Edit Book</h2>

                <form action="{{ route('books.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Book Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Author Name</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="published_date" class="form-label">Published Date</label>
                        <input type="date" class="form-control" id="published_date" name="published_date" value="{{ $book->published_date }}" required>
                    </div>

                    <button type="submit" class="btn btn-dark-modern w-100">SAVE</button>
                </form>
            </div>

        </div>
    </div>

    @include('books.footer')

</body>

</html>