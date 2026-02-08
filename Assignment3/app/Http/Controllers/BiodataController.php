<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        $name = "Lemuel Dane G. Biala";
        $position = "Developer";
        $age = 23;
        $gender = "Male";
        $nationality = "Filipino";
        $bio = "Driven software engineer eager to leverage coding skills to improve quality and help the company grow.";
        $path = "images/pfp.jpg";

        $contacts = [
            'phone' => '09123456789',
            'email' => '23ur0581@psu.edu.ph',
            'address' => 'Mapandan, Pangasinan',
            'linkedin' => 'linkedin.com/in/deynn/',
            'github' => 'github.com/lazydeynn',

        ];

        $education = [
            'tertiary' => [
                'year' => 'Tertiary: 2023-Present',
                'degree' => 'Bachelor of Science in Information Technology',
                'school' => 'Pangasinan State University',
                'details' => 'Major in Web & Mobile Technologies'
            ],
            'secondary' => [
                'year' => 'Secondary: 2015-2023',
                'school' => 'Mapandan National High School',
                'details' => '',
            ],
            'primary' => [
                'year' => 'Primary: 2009-2015',
                'school' => 'Jimenez Elementary School',
                'details' => '',
            ]
        ];

        $experience = "N/A";

        $skills = ['Flutter', 'Dart', 'Java', 'PHP', 'Laravel', 'HTML/CSS', 'MySQL'];

        return view('biodata', compact(
            'name',
            'position',
            'age',
            'nationality',
            'gender',
            'contacts',
            'education',
            'experience',
            'skills',
            'bio',
            'path'
        ));
    }
}
