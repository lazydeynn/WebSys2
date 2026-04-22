<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <div class="container py-5 flex-grow-1" style="max-width: 1100px;">

        <div class="row g-4 mb-4">

            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-4 rounded-4 h-100 bg-white">
                    <label class="form-label fw-bold small text-muted text-uppercase tracking-wider mb-3">Upload Single Photo</label>
                    <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                        @csrf
                        <input class="form-control me-3 m-0" type="file" name="image" required>
                        <button type="submit" class="btn btn-dark-modern ml-2">Upload</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-4 rounded-4 h-100 bg-white">
                    <label class="form-label fw-bold small text-muted text-uppercase tracking-wider mb-3">Upload Multiple Photos</label>
                    <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                        @csrf
                        <input class="form-control me-3 m-0" type="file" name="images[]" multiple required>
                        <button type="submit" class="btn btn-dark-modern ml-2">Upload</button>
                    </form>
                </div>
            </div>

        </div>
        <h5 class="fs-4 fw-bold text-dark mb-3">Uploaded Images</h5>
        <div class="row g-4">
            @forelse ($photos as $photo)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="gallery-item shadow">
                    <img src="{{ asset('images/' . $photo->image) }}">

                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete-docked" title="Delete image">Delete</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-12 py-5 text-center">
                <h5 class="text-muted fw-normal">No images uploaded yet</h5>
            </div>
            @endforelse
        </div>

        @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mt-4 rounded-3" role="alert">
            {{ session('success') }}
        </div>
        @endif

    </div>

    <footer class="mt-auto py-4 border-top">
        <div class="container text-center">
            <p class="text-muted small mb-0 fw-medium">&copy; LEMUEL DANE G. BIALA</p>
        </div>
    </footer>

</body>

</html>