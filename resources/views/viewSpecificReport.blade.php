@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                Quarterly Report Form
                            </div>
                        </div>
                    </div>
                    <!-- 
                    --------------------------------------------------------Curriculum----------------------------------------
                    -->
                    @csrf
                    @if (Auth::user()->designation == "Curriculum" || Auth::user()->designation == "Admin")
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    I. Curriculum
                                </div>
                                <div class="card-body">
                                    <br>
                                    <h6 class="card-title">&nbsp&nbsp&nbspA. Accreditation</h6>
                                    <table id="IA" class="table">
                                        <thead>
                                            <th>Program</th>
                                            
                                            <th>Visit Dates</th>
                                            <th>Level Applied</th>
                                        </thead>
                                        <tbody>
                                            @foreach($program_IA as $accreditation)
                                                <tr>
                                                    <td>
                                                        {{ $accreditation->program }}
                                                    </td>
                                                    <td>
                                                        {{ $accreditation->date }}
                                                    </td>
                                                    <td>
                                                        {{ $accreditation->level }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <h6 class="card-title">&nbsp&nbsp&nbspB. Government Recognition</h6>
                                    <table id="IB" class="table">
                                        <thead>
                                            <th>Program with CoPC</th>
                                            <th>Date of Certificate of Compliance Received</th>
                                        </thead>
                                        <tbody>
                                            @foreach($program_IB as $government)
                                                <tr>
                                                    <td>
                                                        {{ $government->program }}
                                                    </td>
                                                    <td>
                                                        {{ $government->date }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <h6 class="card-title">&nbsp&nbsp&nbspC. Licensure</h6>
                                    <table id="IC" class="table">
                                        <thead>
                                            <th class="align-middle">Licensure Examination</th>
                                            <th>CvSU Passing Percentage <br> (First Time Takers)</th>
                                            <th>National Passing Percentage <br> (First Time Takers)</th>
                                        </thead>
                                        <tbody>
                                            @foreach($program_IC as $licensure)
                                                <tr>
                                                    <td>
                                                        {{ $licensure->examination }}
                                                    </td>
                                                    <td>
                                                        {{ $licensure->cvsu }}
                                                    </td>
                                                    <td>
                                                        {{ $licensure->national }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif


                     <!-- 
                    --------------------------------------------------OSAS-----------------------------------------------
                    -->
                    @if (Auth::user()->designation == "OSAs" || Auth::user()->designation == "Admin")
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                II. Student Profile
                            </div>
                            <div class="card-body">
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspA. Enrolment</h6>
                                <table id="IIA" class="table">
                                    <thead>
                                        <th>Program</th>
                                        <th>Major</th>
                                        <th>Number of Enrollee</th>
                                    </thead>
                                    <tbody>
                                        @foreach($program_IIA as $enrolment)
                                            <tr>
                                                    <td>
                                                        {{ $enrolment->program }}
                                                    </td>
                                                    <td>
                                                        {{ $enrolment->major }}
                                                    </td>
                                                    <td>
                                                        {{ $enrolment->enrollee }}
                                                    </td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspB. Foreign Students</h6>
                                <table id="IIB" class="table">
                                    <thead>
                                        <th>Name</th>
                                        <th>Nationality</th>
                                        <th>Program</th>
                                    </thead>
                                    <tbody>
                                        @foreach($name_IIB as $foreign_students)
                                            <tr>
                                                <td>
                                                    {{ $foreign_students->name }}
                                                </td>
                                                <td>
                                                    {{ $foreign_students->nationality }}
                                                </td>
                                                <td>
                                                    {{ $foreign_students->program }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspC. Graduates</h6>
                                <table id="IIC" class="table">
                                    <thead>
                                        <th>Program</th>
                                        <th>Number of Graduates</th>
                                    </thead>
                                    <tbody>
                                        @foreach($program_IIC as $graduates)
                                            <tr>
                                                <td>
                                                    {{ $graduates->program }}
                                                </td>
                                                <td>
                                                    {{ $graduates->graduates }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspD. Scholarships</h6>
                                <table id="IID" class="table">
                                    <thead>
                                        <th>Program</th>
                                        <th>Number of Scholars</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach($program_IID as $scholarships_student)
                                                        {{ '',$academic = $scholarships_student->academic }}
                                                        {{ '',$assistance = $scholarships_student->assistance }}
                                                        {{ '',$government = $scholarships_student->government }}
                                                        {{ '',$service = $scholarships_student->service }}
                                                        {{ '',$private = $scholarships_student->private }}  
                                            @endforeach
                                            <td>Academic Scholarship</td>
                                            <td>
                                                {{ $academic}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Financial Assistance</td>
                                            <td>
                                                {{$assistance}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Government</td>
                                            <td>
                                                {{$government}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Service Scholarship</td>
                                            <td>
                                                {{$service}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Private Scholarship</td>
                                            <td>
                                                {{$private}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspE. Recognition and Awards of Students</h6>
                                <table id="IIE" class="table">
                                    <thead>
                                        <th>Name of Recognition/Award</th>
                                        <th>Granting Agency/Institution</th>
                                        <th>Grantee</th>
                                    </thead>
                                    <tbody>
                                        @foreach($award_IIE as $recognition_student)
                                            <tr>
                                                <td>
                                                    {{ $recognition_student->award }}
                                                </td>
                                                <td>
                                                    {{ $recognition_student->agency }}
                                                </td>
                                                <td>
                                                    {{ $recognition_student->grantee }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspF. National Competency for Students</h6>
                                <table id="IIF" class="table">
                                    <thead>
                                        <th>Program</th>
                                        <th>Type of National Competency</th>
                                        <th>Number of Students with Certificates</th>
                                    </thead>
                                    <tbody>
                                        @foreach($program_IIF as $competency_student)
                                            <tr>
                                                <td>
                                                    {{ $competency_student->program }}
                                                </td>
                                                <td>
                                                    {{ $competency_student->competency }}
                                                </td>
                                                <td>
                                                    {{ $competency_student->students }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- 
                    -----------------------------------------------------Faculty ------------------------------------------------------
                    -->
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                III. Faculty and Staff Profile
                            </div>
                            <div class="card-body">
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspA. Seminars and Trainings</h6>
                                <table id="IIIA" class="table">
                                    <thead>
                                        <th>Type</th>
                                        <th>Title of Seminar/ Training/ Workshop</th>
                                        <th>Venue</th>
                                        <th>Date</th>
                                    </thead>
                                    <tbody>
                                        @foreach($type_IIIA as $seminar)
                                            <tr>
                                                <td>
                                                    {{ $seminar->type }}
                                                </td>
                                                <td>
                                                    {{ $seminar->title }}
                                                </td>
                                                <td>
                                                    {{ $seminar->venue }}
                                                </td>
                                                <td>
                                                    {{ $seminar->date }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspB. Faculty Recognition and Awards</h6>
                                <table id="IIIB" class="table">
                                    <thead>
                                        <th>Type</th>
                                        <th>Award/Recognition</th>
                                        <th>Granting Agency/Institution</th>
                                        <th>Venue</th>
                                        <th>Date Received</th>
                                    </thead>
                                    <tbody>
                                        @foreach($type_IIIB as $recognition)
                                            <tr>
                                                <td>
                                                    {{ $recognition->type }}
                                                </td>
                                                <td>
                                                    {{ $recognition->award }}
                                                </td>
                                                <td>
                                                    {{ $recognition->agency }}
                                                </td>
                                                <td>
                                                    {{ $recognition->venue }}
                                                </td>
                                                <td>
                                                    {{ $recognition->date }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspC. National Competency</h6>
                                <table id="IIIC" class="table">
                                    <thead>
                                        <th>Type of National Competency</th>
                                    </thead>
                                    <tbody>
                                        @foreach($type_IIIC as $competency)
                                            <tr>
                                                <td>
                                                    {{ $competency->type }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspD. Paper Presentation</h6>
                                <table id="IIID" class="table">
                                    <thead>
                                        <th>Type</th>
                                        <th>Name of Conference</th>
                                        <th>Title of the Study Presented</th>
                                        <th>Venue</th>
                                        <th>Date</th>
                                    </thead>
                                    <tbody>
                                        @foreach($type_IIID as $presentation)
                                            <tr>
                                                <td>
                                                    {{ $presentation->type }}
                                                </td>
                                                <td>
                                                    {{ $presentation->conference }}
                                                </td>
                                                <td>
                                                    {{ $presentation->title }}
                                                </td>
                                                <td>
                                                    {{ $presentation->venue }}
                                                </td>
                                                <td>
                                                    {{ $presentation->date }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspE. Publication<h6>
                                <table id="IIIE" class="table">
                                    <thead>
                                        <th>Title of the Published Study</th>
                                        <th>Journal Article</th>
                                        <th>Publisher</th>
                                        <th>Volume Number/ISSN Number</th>
                                    </thead>
                                    <tbody>
                                        @foreach($title_IIIE as $publication)
                                            <tr>
                                                <td>
                                                    {{ $publication->title }}
                                                </td>
                                                <td>
                                                    {{ $publication->article }}
                                                </td>
                                                <td>
                                                    {{ $publication->publisher }}
                                                </td>
                                                <td>
                                                    {{ $publication->number }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 
                    ---------------------------------------------OSAs----------------------------------------------
                    -->

                    @if (Auth::user()->designation == "OSAs" || Auth::user()->designation == "Admin")
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                IV. Student Development
                            </div>
                            <div class="card-body">
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspA. Student Organization</h6>
                                <table id="IVA" class="table">
                                    <thead>
                                        <th>Name of Organization</th>
                                    </thead>
                                    <tbody>
                                        @foreach($name_IVA as $organization_student)
                                            <tr>
                                                <td>
                                                    {{ $organization_student->name }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif


                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                V. Research
                            </div>
                            <div class="card-body">
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspA. On-going Research/Study</h6>
                                <table id="VA" class="table">
                                    <thead>
                                        <th>Title of the Study</th>
                                        <th>Target Date of Completion</th>
                                    </thead>
                                    <tbody>
                                        @foreach($title_VA as $ongoing_research)
                                            <tr>
                                                <td>
                                                    {{ $ongoing_research->title }}
                                                </td>
                                                <td>
                                                    {{ $ongoing_research->date }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspB. Completed Research/Study</h6>
                                <table id="VB" class="table">
                                    <thead>
                                        <th>Title of the Study</th>
                                        <th>Date of Completion</th>
                                    </thead>
                                    <tbody>
                                        @foreach($title_VB as $completed_research)
                                            <tr>
                                                <td>
                                                    {{ $completed_research->title }}
                                                </td>
                                                <td>
                                                    {{ $completed_research->date }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspC. Research Project Funded by Outside Agency</h6>
                                <table id="VC" class="table">
                                    <thead>
                                        <th>Title of the Study</th>
                                        <th>Sponsor Agency</th>
                                        <th>Date of Completion</th>
                                    </thead>
                                    <tbody>
                                        @foreach($title_VC as $outside_research)
                                            <tr>
                                                <td>
                                                    {{ $outside_research->title }}
                                                </td>
                                                <td>
                                                    {{ $outside_research->sponsor }}
                                                </td>
                                                <td>
                                                    {{ $outside_research->date }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                     <!-- 
                    --------------------------------------------Extension------------------------------------- 
                    -->

                    @if (Auth::user()->designation == "Extension" || Auth::user()->designation == "Admin")
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                VI. Extension
                            </div>
                            <div class="card-body">
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspA. Extension Projects</h6>
                                <table id="VIA" class="table">
                                    <thead>
                                        <th>Name of College/Campus Extension Project</th>
                                    </thead>
                                    <tbody>
                                        @foreach($name_VIA as $extension_project)
                                            <tr>
                                                <td>
                                                    {{ $extension_project->name }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspB. Extension Activities</h6>
                                <table id="VIB" class="table">
                                    <thead>
                                        <th>Extension Activities</th>
                                        <th>Date of Extension Activity</th>
                                        <th>Extentionist (provide the name of the involved faculties)</th>
                                        <th>Total Number of Clientle/Beneficiaries</th>
                                        <th>Partner Agency (if applicable)</th>
                                    </thead>
                                    <tbody>
                                        @foreach($activity_VIB as $extension_activities)
                                            <tr>
                                                <td>
                                                    {{ $extension_activities->activity }}
                                                </td>
                                                <td>
                                                    {{ $extension_activities->date }}
                                                </td>
                                                <td>
                                                    {{ $extension_activities->extensionist }}
                                                </td>
                                                <td>
                                                    {{ $extension_activities->clientle }}
                                                </td>
                                                <td>
                                                    {{ $extension_activities->agency }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- 
                    ----------------------------------------------------EBA---------------------------------------------- 
                    -->

                    @if (Auth::user()->designation == "EBA" || Auth::user()->designation == "Admin")
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                VII. Linkages and Fund Generation
                            </div>
                            <div class="card-body">
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspA. Linkages</h6>
                                <table id="VIIA" class="table">
                                    <thead>
                                        <th>Agency</th>
                                        <th>Nature of Linkage (OJT Center, Immersion Partner, Funding Agency, Training Site, etc)</th>
                                    </thead>
                                    <tbody>
                                        @foreach($agency_VIIA as $linkages)
                                            <tr>
                                                <td>
                                                    {{ $linkages->agency }}
                                                </td>
                                                <td>
                                                    {{ $linkages->nature }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspB. Fund Generation</h6>
                                <table id="VIIB" class="table">
                                    <thead>
                                        <th>Income Generating Project</th>
                                        <th>Amount Generated</th>
                                    </thead>
                                    <tbody>
                                        @foreach($project_VIIB as $fund_generation)
                                            <tr>
                                                <td>
                                                    {{ $fund_generation->project }}
                                                </td>
                                                <td>
                                                    {{ $fund_generation->amount }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Auth::user()->designation == "Custodian" || Auth::user()->designation == "Admin")
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                VIII. Infrastructure Development
                            </div>
                            <div class="card-body">
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspA. Linkages</h6>
                                <table id="VIIIA" class="table">
                                    <thead>
                                        <th>Infrastructure</th>
                                        <th>Percentage of Development</th>
                                    </thead>
                                    <tbody>
                                        @foreach($infrastructure_VIIIA as $infrastructure)
                                            <tr>
                                                <td>
                                                    {{ $infrastructure->infrastructure }}
                                                </td>
                                                <td>
                                                    {{ $infrastructure->percentage }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        
    </div>
@endsection

