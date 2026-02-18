<?php

use Illuminate\Support\Facades\Route;

Route::get('student/{id}/{name}', function ($id, $name) {
    return view(
        'student',
        [
            'id' => $id,
            'name' => $name
        ]
    );
});

Route::get('course/{course}/{year?}', function ($course, $year = 'N/A') {
    return view('course', [
        'course' => $course,
        'year' => $year
    ]);
});

Route::get('ojt/{company}/{city}/{allowance?}', function ($company, $city, $allowance = null) {

    if ($allowance != null) {
        $allowance = 'Yes';
    } else {
        $allowance = 'No';
    }

    return view('ojt', [
        'company' => $company,
        'city' => $city,
        'allowance' => $allowance
    ]);
});

Route::get('event/{eventName}/{participant}/{year}', function ($eventName, $participant, $year) {
    return view('event', [
        'eventName' => $eventName,
        'participant' => $participant,
        'year' => $year
    ]);
});
