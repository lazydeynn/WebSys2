<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Evaluation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow border-0" style="width: 400px;">

            <div class="card-header bg-secondary text-white text-center">
                <h4 class="mb-0">Student Evaluation</h4>
            </div>

            <div class="card-body">
                <p class="card-text"><b>Name:</b> {{ $name }}</p>
                <p class="card-text"><b>Prelim:</b> {{ $prelim }}</p>
                <p class="card-text"><b>Midterm:</b> {{ $midterm }}</p>
                <p class="card-text"><b>Final:</b> {{ $final }}</p>
                <hr>

                @php
                $average = ($prelim + $midterm + $final)/3;
                @endphp

                <p class="card-text"><b>Average:</b> {{ number_format($average, 2) }}</p>

                <p class="card-text"><b>Letter Grade: </b>
                    @if($average >= 90) A
                    @elseif($average >= 80) B
                    @elseif($average >= 70) C
                    @elseif($average >= 60) D
                    @else F
                    @endif
                </p>

                <p class="card-text"><b>Remarks:</b>
                    @if($average >= 75)
                    <span class="text-success fw-bold">Passed</span>
                    @else
                    <span class="text-danger fw-bold">Failed</span>
                    @endif
                </p>

                <p class="card-text"><b>Award:</b>
                    @if($average >= 98) With Highest Honors
                    @elseif($average >= 95) With High Honors
                    @elseif($average >= 90) With Honors
                    @else No Award
                    @endif
                </p>
            </div>

            <div class="card-footer text-center fw-bold">
                Lemuel Dane G. Biala
            </div>

        </div>
    </div>

</body>

</html>