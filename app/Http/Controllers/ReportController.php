<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    function viewFaculty() {
        $users = DB::table('users')
            ->where('role', '!=', 'admin')
            ->orderBy('name', 'asc')
            ->get();

        $designations = DB::table('designation')
        ->orderBy('name', 'asc')
        ->get();

        return view('faculties', ['users' => $users, 'designations' => $designations]);
    }

    function deleteFaculty(Request $request) {
        $id = $request->id;
        $deleted = DB::table('users')
            ->where('id', '=', $id)
            ->delete();

        return redirect()->route('faculties');
    }

    function updateFaculty(Request $request) {
        $id = $request->uid;
        $dept = $request->dept;
        $desig = $request->desig;

        $updated = DB::table('users')
            ->where('id', '=', $id)
            ->update(['id' => $id, 'department' => $dept, 'designation' => $desig]);

        return redirect()->route('faculties');
    }

    function viewYears() {
        $years = DB::table('year')
            ->orderBy('year', 'asc')
            ->get();
        return view('years', ['years' => $years]);
    }

    function addYear() {

        return view('addYear');
    }

    function saveYear(Request $request) {
        $year = $request->year;

        for($a = 1; $a < 5; $a++) {
            DB::table('year')->insert([
                'year' => $year,
                'quarter' => $a,
                'status' => 'inactive',
            ]);
        }
        return redirect()->route('years');
    }

    function updateYear(Request $request) {
        $year = $request->year;
        $quarter = $request->quarter;

        $updated = DB::table('year')
            ->update(['status' => 'inactive']);

        $updated = DB::table('year')
            ->where([
                ['year', '=', $year],
                ['quarter', '=', $quarter]
                ])
            ->update(['status' => 'active']);
        return redirect()->route('years');
    }

    function viewDesignations() {
        $designations = DB::table('designation')
            ->orderBy('name', 'asc')
            ->get();
        return view('designations', ['designations' => $designations]);
    }

    function viewProfile() {
        return view('profile');
    }


    function viewReportForm() {
        $activeYear = DB::table('year')
            ->where('status', '=', 'active')
            ->value('id');
            // ->get();
        return view('reportForm', ['activeYear' => $activeYear]);
        // return view('reportForm');
    }

    function saveReport(Request $request) {
        $userID = $request->userID;
        $activeYear = $request->activeYear;
        $year = DB::table('year');

        DB::table('accreditation')->insert([
            'id' => 2,
            'program' => $request->program_IA,
            'date' => $request->date_IA,
            'level' => $request->level_IA,
            // 'program' => 'BSIT',
            // 'date' => '2022-04-20',
            // 'level' => '1',
        ]);

        return redirect()->route('home');
    }
}
