<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="card shadow-sm mt-5 ms-5" style="width: 350px;">
        <div class="card-body">
            <h5 class="card-title text-purple mb-4">Student Profile</h5>
            <p class="card-text mb-2">
                <b>Student ID:</b> {{ $id }}
            </p>
            <p class="card-text">
                <b>Student Name:</b> {{ $name }}
            </p>
        </div>
    </div>

</body>

</html>