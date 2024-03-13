@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <li class="nav-item nav-link text-black">{{ __('List of Faculties') }}</li>
                </div>
                <div class="card-body">
                    <!-- <div class="hidden fixed top-0 right-0 sm:block"> -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a class="btn btn-primary float-end" href="{{ route('register') }}" role="button"> Add Faculty</a></li>
                        </ul>
                        @if($users->isEmpty())
                            No registered faculty
                        @else
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Designation</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                <div class="col">
                                    <select class="custom-select" id="dept{{ $user->id }}" name="department">
                                        @if ($user->department == 'DAS')
                                            <option selected value="DAS">Department of Arts and Sciences</option>
                                            <option value="DIT">Department of Information Technology</option>
                                            <option value="DOM">Department of Management</option>
                                            <option value="TED">Teacher Education Department</option>
                                            <option value="STAFF">Staff</option>
                                        @elseif ($user->department == 'DIT')
                                            <option value="DAS">Department of Arts and Sciences</option>
                                            <option selected value="DIT">Department of Information Technology</option>
                                            <option value="DOM">Department of Management</option>
                                            <option value="TED">Teacher Education Department</option>
                                            <option value="STAFF">Staff</option>
                                        @elseif ($user->department == 'DOM')
                                            <option value="DAS">Department of Arts and Sciences</option>
                                            <option value="DIT">Department of Information Technology</option>
                                            <option selected value="DOM">Department of Management</option>
                                            <option value="TED">Teacher Education Department</option>
                                            <option value="STAFF">Staff</option>
                                        @elseif ($user->department == 'TED')
                                            <option value="DAS">Department of Arts and Sciences</option>
                                            <option value="DIT">Department of Information Technology</option>
                                            <option value="DOM">Department of Management</option>
                                            <option selected value="TED">Teacher Education Department</option>
                                            <option value="STAFF">Staff</option>
                                        @else
                                            <option value="DAS">Department of Arts and Sciences</option>
                                            <option value="DIT">Department of Information Technology</option>
                                            <option value="DOM">Department of Management</option>
                                            <option value="TED">Teacher Education Department</option>
                                            <option selected value="STAFF">Staff</option>
                                        @endif
                                    </select>
                                </div>
                                </td>
                                <td>
                                <div class="col">
                                    <select class="custom-select" id="desig{{ $user->id }}" name="designation">
                                        <option value="none">None</option>
                                        @foreach ($designations as $designation)
                                            @if($designation->value == $user->designation) 
                                                <option selected value="{{ $designation->value}}">{{ $designation->name }}</option>
                                            @else
                                                <option value="{{ $designation->value}}">{{ $designation->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                </td>
                                <td>
                                    <input class="btn btn-outline-success" type="button" onClick='updateFaculty({{ $user->id }})' value="Save">
                                    <a href="{{ route('delete.faculty', $user->id) }}" class="btn btn-outline-danger" role="button">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                            </tbody>
                        </table>
                        @endif
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

