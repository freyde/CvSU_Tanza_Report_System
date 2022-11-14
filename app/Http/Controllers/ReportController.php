<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        $name = Auth::user()->name;
       
        $activeUserID = DB::table('users')
            ->where([
                ['name', '=', $name],
                ])
            ->value('id');

        $submissionRecord = DB::table('submission')
            ->where([
                ['uid', '=', $activeUserID],
                ['year' , '=', $activeYear],
            ])
            ->get();
        error_log($submissionRecord);
        if( count($submissionRecord) == 0 || (Auth::user()->role == 'admin')){
            return view('reportForm', ['activeYear' => $activeYear]);
        }
        else{
            $errorMessage = "You have already submitted accomplishment report this quarter!";
            return view('error')->with('errorMessage', $errorMessage);
        }
        // return view('reportForm');
    }

    function saveReport(Request $request) {
        $uid = $request->userID;
        $activeYear = $request->activeYear;
        $year = DB::table('year');

        //--------------------------------Curriculum---------------------------------
        // Accreditation Table Update
        if($request->program_IA != null) {
            foreach($request->program_IA as $index => $id) {
                DB::table('accreditation')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'program' => $request->program_IA[$index],
                    'date' => $request->date_IA[$index],
                    'level' => $request->level_IA[$index],
                ]);
            }
        }
        // Government Recognition Table Update
        if($request->program_IB != null) {
            foreach($request->program_IB as $index => $id) {
                DB::table('government')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'program' => $request->program_IB[$index],
                    'date' => $request->date_IB[$index],
                ]);
            }
        }
        // Licensure Table Upddate
        if($request->exam_IC != null) {
            foreach($request->exam_IC as $index => $id) {
                DB::table('licensure')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'examination' => $request->exam_IC[$index],
                    'cvsu' => $request->cvsu_IC[$index],
                    'national' => $request->natl_IC[$index],
                ]);
            }
        }

        //-----------------------------OSAS------------------------------------------
        // Enrolment Table Update
        if($request->program_IIA != null) {
            foreach($request->program_IIA as $index => $id) {
                DB::table('enrolment')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'program' => $request->program_IIA[$index],
                    'major' => $request->major_IIA[$index],
                    'enrollee' => $request->enrollee_IIA[$index],
                ]);
            }
        }
        // Foreign_Students Table Update
        if($request->name_IIB != null) {
            foreach($request->name_IIB as $index => $id) {
                DB::table('foreign_students')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'name' => $request->name_IIB[$index],
                    'nationality' => $request->nationality_IIB[$index],
                    'program' => $request->program_IIB[$index],
                ]);
            }
        }
        //Graduates Table Update
        if($request->program_IIC != null) {
            foreach($request->program_IIC as $index => $id) {
                DB::table('graduates')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'program' => $request->program_IIC[$index],
                    'graduates' => $request->graduates_IIC[$index],
                ]);
            }
        }
        //Scholarships_Students Table Update
        if($request->academic_IID == null) $academic = 0;
        else $academic = $request->academic_IID;
        
        if($request->assistance_IID == null) $assistance = 0;
        else $assistance = $request->assistance_IID;

        if($request->government_IID == null) $government = 0;
        else $government = $request->government_IID;
        
        if($request->service_IID == null) $service = 0;
        else $service = $request->service_IID;
        
        if($request->government_IID == null) $private = 0;
        else $private = $request->government_IID;
        
        DB::table('scholarships_student')->insert([
            'uid' => $uid,
            'year' => $activeYear,
            'academic' => $academic,
            'assistance' => $assistance,
            'government' => $government,
            'service' => $service,
            'private' => $private,
        ]);

        //Recognition Student Table Update
        if($request->award_IIE != null) {
            foreach($request->award_IIE as $index => $id) {
                DB::table('recognition_student')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'award' => $request->award_IIE[$index],
                    'agency' => $request->agency_IIE[$index],
                    'grantee' => $request->grantee_IIE[$index],
                ]);
            }
        }
        //Competency Student Table Update
        if($request->program_IIF != null) {
            foreach($request->program_IIF as $index => $id) {
                DB::table('competency_student')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'program' => $request->program_IIF[$index],
                    'competency' => $request->competency_IIF[$index],
                    'students' => $request->students_IIF[$index],
                ]);
            }
        }
        // Organizations Student Table Update
        if($request->name_IVA != null) {
            foreach($request->name_IVA as $index => $id) {
                DB::table('organization_student')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'name' => $request->name_IVA[$index],
                ]);
            }
        }

        //--------------------------------Faculty-------------------------------

        // Seminar Table Update
        if($request->type_IIIA != null) {
            foreach($request->type_IIIA as $index => $id) {
                DB::table('seminar')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'type' => $request->type_IIIA[$index],
                    'title' => $request->title_IIIA[$index],
                    'venue' => $request->venue_IIIA[$index],
                    'date' => $request->date_IIIA[$index],
                ]);
            }
        }
        // Recognition Table Update
        if($request->type_IIIB != null) {
            foreach($request->type_IIIB as $index => $id) {
                DB::table('recognition')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'type' => $request->type_IIIB[$index],
                    'award' => $request->award_IIIB[$index],
                    'agency' => $request->agency_IIIB[$index],
                    'venue' => $request->venue_IIIB[$index],
                    'date' => $request->date_IIIB[$index],
                ]);
            }
        }
        // Competency Table Update
        if($request->type_IIIC != null) {
            foreach($request->type_IIIC as $index => $id) {
                DB::table('competency')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'type' => $request->type_IIIC[$index],
                ]);
            }
        }
        // Presentation Table Update
        if($request->type_IIID != null) {
            foreach($request->type_IIID as $index => $id) {
                DB::table('presentation')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'type' => $request->type_IIID[$index],
                    'conference' => $request->conference_IIID[$index],
                    'title' => $request->title_IIID[$index],
                    'venue' => $request->venue_IIID[$index],
                    'date' => $request->date_IIID[$index],
                ]);
            }
        }
        // Publication Table Update
        if($request->title_IIIE != null) {
            foreach($request->title_IIIE as $index => $id) {
                DB::table('publication')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'title' => $request->title_IIIE[$index],
                    'article' => $request->article_IIIE[$index],
                    'publisher' => $request->publisher_IIIE[$index],
                    'number' => $request->number_IIIE[$index],
                ]);
            }
        }

        //-----------------------------Research------------------------------__

        // Ongoing Research Table Update
        if($request->title_VA != null) {
            foreach($request->title_VA as $index => $id) {
                DB::table('ongoing_research')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'title' => $request->title_VA[$index],
                    'date' => $request->date_VA[$index],
                ]);
            }
        }

        // Completed Research Table Update
        if($request->title_VB != null) {
            foreach($request->title_VB as $index => $id) {
                DB::table('completed_research')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'title' => $request->title_VB[$index],
                    'date' => $request->date_VB[$index],
                ]);
            }
        }

        // Outside Research Table Update
        if($request->title_VC != null) {
            foreach($request->title_VC as $index => $id) {
                DB::table('outside_research')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'title' => $request->title_VC[$index],
                    'sponsor' => $request->sponsor_VC[$index],
                    'date' => $request->date_VC[$index],
                ]);
            }
        }


        //--------------------------------------Extension-------------------------------
        
        // Extension Project Table Update
        if($request->name_VIA != null) {
            foreach($request->name_VIA as $index => $id) {
                DB::table('extension_project')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'name' => $request->name_VIA[$index],
                ]);
            }
        }

        // Extension Activities Table Update
        if($request->activity_VIB != null) {
            foreach($request->activity_VIB as $index => $id) {
                DB::table('extension_activities')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'activity' => $request->activity_VIB[$index],
                    'date' => $request->date_VIB[$index],
                    'extensionist' => $request->extensionist_VIB[$index],
                    'clientle' => $request->clientle_VIB[$index],
                    'agency' => $request->agency_VIB[$index],
                ]);
            }
        }

        //-------------------------------------EBA-------------------------------

        // Linkages Table Update
        if($request->agency_VIIA != null) {
            foreach($request->agency_VIIA as $index => $id) {
                DB::table('linkages')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'agency' => $request->agency_VIIA[$index],
                    'nature' => $request->nature_VIIA[$index],
                ]);
            }
        }

        // Fund Generation Table Update
        if($request->project_VIIB != null) {
            foreach($request->project_VIIB as $index => $id) {
                DB::table('fund_generation')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'project' => $request->project_VIIB[$index],
                    'amount' => $request->amount_VIIB[$index],
                ]);
            }
        }

        //-------------------------------Custodian--------------------------------

        // Infrastructure Table Update
        if($request->infrastructure_VIIIA != null) {
            foreach($request->infrastructure_VIIIA as $index => $id) {
                DB::table('infrastructure')->insert([
                    'uid' => $uid,
                    'year' => $activeYear,
                    'infrastructure' => $request->infrastructure_VIIIA[$index],
                    'percentage' => $request->percentage_VIIIA[$index],
                ]); 
            }
        }

        DB::table('submission')->insert([
            'uid' => $uid,
            'year' => $activeYear,
        ]);

        return redirect()->route('admin.home');

    }

    function viewSubmittedReport() {
        global $data;

        /* current format of the data 
        $data = array (
            'user1' => array(
                    'reports' => [['value1', 'value2'], ['value2']],
                    'name' => 'user1',
            ),
            'user2' => array(
                    'reports' => [['value1', 'value2'], ['value2']],
                    'name' => 'user2',
            ),
            'user3' => array(
                    'reports' => [['value1', 'value2'], ['value2']],
                    'name' => 'user3',
                    'year' => 'year_id',
            ),
        ); */

        $reports = DB::table('submission')
            ->get();

        $users = DB::table('users')
            // ->where('role', '!=', 'admin')
            ->orderBy('name', 'asc')
            ->get();

        $quarters = DB::table('year')
            ->get();
        foreach ($users as $user) {
            # initializes the name and properties for user
            $data[$user->name]['name'] = $user->name;
            $data[$user->name]['reports'] = array();
            foreach ($reports as $report ) {
                if($user->id==$report->uid){// if the user id matches the report uid
                    //it pushes the report under the reports property of the user
                    array_push($data[$user->name]['reports'], $report);
                }
            }
        }
        

        return view('adminReportList', ['reports' => $reports, 'users' => $users, 'years' => $quarters, 'data' => $data]);
    }

    function viewSpecificReport($id){
        //--------------------------------Curriculum---------------------------------
        $program_IA = self::getData('accreditation', $id);
        $program_IB = self::getData('government', $id);
        $program_IC = self::getData('licensure', $id);

        //-----------------------------OSAS------------------------------------------
        $program_IIA = self::getData('enrolment', $id);
        $name_IIB = self::getData('foreign_students', $id);
        $program_IIC = self::getData('graduates', $id);
        $program_IID = self::getData('scholarships_student', $id);
        $award_IIE = self::getData('recognition_student', $id);
        $program_IIF = self::getData('competency_student', $id);
        $name_IVA = self::getData('organization_student', $id);

        //--------------------------------Faculty-------------------------------
        $type_IIIA = self::getData('seminar', $id);
        $type_IIIB = self::getData('recognition', $id);
        $type_IIIC = self::getData('competency', $id);
        $type_IIID = self::getData('presentation', $id);
        $title_IIIE = self::getData('publication', $id);
        $title_VA = self::getData('ongoing_research', $id);
        $title_VB = self::getData('completed_research', $id);
        $title_VC = self::getData('outside_research', $id);

        //--------------------------------------Extension-------------------------------
        $name_VIA = self::getData('extension_project', $id);
        $activity_VIB = self::getData('extension_activities', $id);

        //-------------------------------------EBA-------------------------------
        $agency_VIIA = self::getData('linkages', $id);
        $project_VIIB = self::getData('fund_generation', $id);
        //-------------------------------Custodian--------------------------------
        $infrastructure_VIIIA = self::getData('infrastructure', $id);
        //-------------------------------User's Designation--------------------------------
        $userID = DB::table('submission')
            ->where('id', '=', $id)
            ->get('uid');

        $userID = $userID[0]->uid;

        $userDesignation = DB::table('users')
            ->where('id', '=', $userID)
            ->get('designation');
        $userDesignation = $userDesignation[0]->designation;

        return view('viewSpecificReport', ['program_IA' => $program_IA, 
            'program_IB' => $program_IB, 
            'program_IC' => $program_IC,
            'program_IIA' => $program_IIA,
            'name_IIB' => $name_IIB,
            'program_IIC' => $program_IIC,
            'program_IID' => $program_IID,
            'award_IIE' => $award_IIE,
            'program_IIF' => $program_IIF,
            'type_IIIA' => $type_IIIA,
            'type_IIIB' => $type_IIIB,
            'type_IIIC' => $type_IIIC,
            'type_IIID' => $type_IIID,
            'title_IIIE' => $title_IIIE,
            'name_IVA' => $name_IVA,
            'title_VA' => $title_VA,
            'title_VB' => $title_VB,
            'title_VC' => $title_VC,
            'name_VIA' => $name_VIA,
            'activity_VIB' => $activity_VIB,
            'agency_VIIA' => $agency_VIIA,
            'project_VIIB' => $project_VIIB,
            'infrastructure_VIIIA' => $infrastructure_VIIIA,
            'userDesignation' => $userDesignation,
        ]);
    }

    function getData($table, $id){
        $uid = DB::table('submission')
            ->where('id', '=', $id)
            ->get('uid');  

        $uid = $uid[0]->uid;

        $year = DB::table('submission')
            ->where('id', '=', $id)
            ->get('year');

        $year = $year[0]->year;


        $data = DB::table($table)
            ->where([
                ['uid', '=', $uid],
                ['year', '=', $year]  
                ])
            ->get();

        return $data;
        // return view('viewer', ['data' => $uid]);
    }
}
