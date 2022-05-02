@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <li class="nav-item nav-link text-black">{{ Auth::user()->name }}</li>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            Profile
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">&nbsp&nbsp&nbspA. Educational Attainment</h6>
                            <table id="BS-tbl" class="table">
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
                                            <button class="btn btn-sm btn-outline-success" onClick="addRow('BS-tbl', ['degree', 'univ', 'year'])">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="MS-tbl" class="table">
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
                                            <button class="btn btn-sm btn-outline-success" onClick="addRow('MS-tbl', ['degree', 'univ', 'units'])">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="PhD-tbl" class="table">
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
                                            <button class="btn btn-sm btn-outline-success" onClick="addRow('PhD-tbl', ['degree', 'univ', 'units'])">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspB. Nature of Appointment:</h6>
                            <table id="II-A" class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="custom-select" name="" id="">
                                                <option value="regular">Regular</option>
                                                <option value="casual">Casual</option>
                                                <option value="cos">Contract of Service</option>
                                            </select>
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
                                            <select class="custom-select" name="" id="">
                                                <option value="insI">Instructor I</option>
                                                <option value="insII">Instructor II</option>
                                                <option value="insIII">Instructor III</option>
                                                <option value="astntPrfI">Assistnant Professor I</option>
                                                <option value="astntPrfII">Assistnant Professor II</option>
                                                <option value="astntPrfIII">Assistnant Professor III</option>
                                                <option value="astntPrfIV">Assistnant Professor IV</option>
                                                <option value="asscPrfI">Associate Professor I</option>
                                                <option value="asscPrfII">Associate Professor II</option>
                                                <option value="asscPrfIII">Associate Professor III</option>
                                                <option value="asscPrfIV">Associate Professor IV</option>
                                                <option value="asscPrfV">Associate Professor V</option>
                                                <option value="unvPrf">University Professor</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h6 class="card-title">&nbsp&nbsp&nbspD. Faculty Scholarhip</h6>
                            <table id="scholar" class="table">
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
                                            <button class="btn btn-sm btn-outline-success" onClick="addRow('scholar', ['sponsor', 'institution', 'program'])">Add Row</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

