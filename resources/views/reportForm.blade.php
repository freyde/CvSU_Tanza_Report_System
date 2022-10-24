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
                <form action="{{ route('report.save') }}" method="post">
                    <input type="hidden" id="userID" name="userID" value="{{Auth::user()->id}}"> 
                    <input type="hidden" id="activeYear" name="activeYear" value="{{$activeYear}}"> 
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('IA', ['program', 'date', 'level'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('IB', ['program', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('IC', ['exam', 'cvsu', 'natl'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('IIA', ['program', 'major', 'enrollee'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('IIB', ['name', 'nationality', 'program'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('IIC', ['program', 'graduates'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                            <td>Academic Scholarship</td>
                                            <td>
                                                <input type="text" id="academic_IID" name="academic_IID" class="form-control" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Financial Assistance</td>
                                            <td>
                                                <input type="text" id="assistance_IID" name="assistance_IID" class="form-control" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Government</td>
                                            <td>
                                                <input type="text" id="government_IID" name="government_IID" class="form-control" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Service Scholarship</td>
                                            <td>
                                                <input type="text" id="service_IID" name="service_IID" class="form-control" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Private Scholarship</td>
                                            <td>
                                                <input type="text" id="private_IID" name="private_IID" class="form-control" placeholder="0">
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('IIE', ['award', 'agency', 'grantee'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('IIF', ['program', 'competency', 'students'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                <!-- <h6 class="card-title">&nbsp&nbsp&nbspA. Educational Attainment</h6>
                                <table id="III-A" class="table">
                                    <thead>
                                        <th>Bachelor's Degree</th>
                                        <th>School/University</th>
                                        <th>Year Graduated</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-outline-success" onClick="addRow('II-A', ['program', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table id="III-A" class="table">
                                    <thead>
                                        <th>Master's Degree</th>
                                        <th>School/University</th>
                                        <th>No. of Units</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-outline-success" onClick="addRow('II-A', ['program', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table id="III-A" class="table">
                                    <thead>
                                        <th>PhD/EdD</th>
                                        <th>School/University</th>
                                        <th>No. of Units</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-outline-success" onClick="addRow('II-A', ['program', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspB. Nature of Appointment:</h6>
                                <table id="III-A" class="table">
                                    <tbody>
                                        <tr>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-outline-success" onClick="addRow('II-A', ['program', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspC. Academic Rank</h6>
                                <table id="III-A" class="table">
                                    <tbody>
                                        <tr>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-outline-success" onClick="addRow('II-A', ['program', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspD. Faculty Scholarhip</h6>
                                <table id="III-A" class="table">
                                    <thead>
                                        <th>Scholarship/Sponsor</th>
                                        <th>Insitution</th>
                                        <th>Program</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-outline-success" onClick="addRow('II-A', ['program', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> -->
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow2('IIIA', ['type', 'title', 'venue', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow2('IIIB', ['type', 'award', 'agency', 'venue', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <h6 class="card-title">&nbsp&nbsp&nbspC. National Competency</h6>
                                <table id="IIIC" class="table">
                                    <thead>
                                        <th>Type of National Competency</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('IIIC', ['type'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow2('IIID', ['type', 'conference', 'title', 'venue', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('IIIE', ['title', 'article','publisher', 'number'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('IVA', ['name'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('VA', ['title', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('VB', ['title', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('VC', ['title', 'sponsor', 'date'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('VIA', ['name'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('VIB', ['activity', 'date', 'extensionist', 'clientle', 'agency'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('VIIA', ['agency', 'nature'])">Add Row</button>
                                            </td>
                                        </tr>
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
                                        <tr>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('VIIB', ['project', 'amount'])">Add Row</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- 
                    -------------------------------------------------Custodian----------------------------------------------- 
                    -->

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
                                        <tr>
                                            <td></td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-sm btn-outline-success" onClick="addRow('VIIIA', ['infrastructure', 'percentage'])">Add Row</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    


                    <button type="submit" class="btn btn-primary ms-3">
                        {{ __('Add') }}
                    </button>

                </form>
                <!-- <ul class="list-group list-group-flush">
                    <li class="list-group-item"></li>
                </ul> -->
            </div>
        </div>
    </div>
</div>


@endsection