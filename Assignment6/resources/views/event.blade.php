<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="card shadow-sm mt-5 ms-5" style="width: 350px;">
        <div class="card-body">
            <h5 class="card-title text-purple mb-4">Event Registration</h5>
            <p class="card-text mb-2">
                <b>Event Name:</b> {{ $eventName }}
            </p>
            <p class="card-text">
                <b>Participant Name:</b> {{ $participant }}
            </p>
            <p class="card-text">
                <b>Year Level:</b> {{ $year }}
            </p>
        </div>
    </div>

</body>

</html>