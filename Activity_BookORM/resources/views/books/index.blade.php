<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <div class="container py-5 flex-grow-1" style="max-width: 1000px;">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fs-4 fw-bold text-dark mb-0">All Books</h2>
            <a href="{{ route('books.create') }}" class="btn btn-dark-modern text-decoration-none">Add New Book</a>
        </div>

        <div class="table-card shadow-sm border border-light">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-muted small fw-semibold tracking-wider">Title</th>
                        <th class="text-uppercase text-muted small fw-semibold tracking-wider">Author</th>
                        <th class="text-uppercase text-muted small fw-semibold tracking-wider">Published Date</th>
                        <th class="text-uppercase text-muted small fw-semibold tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                    <tr>
                        <td class="fw-medium text-dark">{{ $book->title }}</td>
                        <td class="text-muted">{{ $book->author }}</td>
                        <td class="text-muted">{{ \Carbon\Carbon::parse($book->published_date)->format('M d, Y') }}</td>
                        <td class="">
                            <div class="d-flex justify-content gap-2">
                                <a href="{{ route('books.edit', $book->id) }}" class="action-btn btn-edit mr-2">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn btn-delete">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            No books found in the inventory.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    @include('books.footer')

</body>

</html>