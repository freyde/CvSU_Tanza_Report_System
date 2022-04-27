@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            Quarterly Report Form
                        </div>
                    </div>
                </div>
                <!-- 
                    Curriculum
                 -->
                @if (Auth::user()->designation == "Curriculum")
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            I. Curriculum
                        </div>
                        <div class="card-body">
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspA. Accreditation</h6>
                            <table class="table">
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspB. Government Recognition</h6>
                            <table class="table">
                                <thead>
                                    <th>Program with CoPC</th>
                                    <th>Date of Certificatre of Compliance Received</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspC. Licensure</h6>
                            <table class="table">
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"></li>
                    </ul>
                </div>
                @endif

                <!-- 
                    Registrar and OSAS
                 -->
                @if (Auth::user()->designation == "OSAs")
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            II. Student Profile
                        </div>
                        <div class="card-body">
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspA. Enrolment</h6>
                            <table class="table">
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspB. Foreign Students</h6>
                            <table class="table">
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspC. Graduates</h6>
                            <table class="table">
                                <thead>
                                    <th>Program</th>
                                    <th>Number of Graduates</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspD. Scholarships</h6>
                            <table class="table">
                                <thead>
                                    <th>Program</th>
                                    <th>Number of Scholars</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspE. Recognition and Awards of Students</h6>
                            <table class="table">
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspF. National Competency for Students</h6>
                            <table class="table">
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"></li>
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            III. Faculty and Staff Profile
                        </div>
                        <div class="card-body">
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspA. Educational Attainment</h6>
                            <table class="table">
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table">
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table">
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspB. Nature of Appointment:</h6>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspC. Academic Rank</h6>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspD. Faculty Scholarhip</h6>
                            <table class="table">
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspE. Seminars and Trainings</h6>
                            <table class="table">
                                <thead>
                                    <th>Type</th>
                                    <th>Title of Seminar/Training/Workshop</th>
                                    <th>Venue</th>
                                    <th>Date</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspF. Faculty Recognition and Awards</h6>
                            <table class="table">
                                <thead>
                                    <th>Type</th>
                                    <th>Award/Recognition</th>
                                    <th>Granting Agency/Instituion</th>
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspG. National Competency</h6>
                            <table class="table">
                                <thead>
                                    <th>Type of National Competency</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspH. Paper Presentation</h6>
                            <table class="table">
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspI. Publcation<h6>
                            <table class="table">
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
                                            <button class="btn btn-sm btn-outline-success">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection