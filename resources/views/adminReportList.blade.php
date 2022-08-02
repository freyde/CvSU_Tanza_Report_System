@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            Submitted Report List
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="admin-report-list" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#byfaculty" role="tab" aria-controls="byfaculty" aria-selected="true">By Faculty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#byquarter" role="tab" aria-controls="byfaculty" aria-selected="true">By Quarter</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">

                            <div class="tab-pane active" id="byfaculty" role="tabpanel">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            @foreach ($years as $year)
                                            <th>{{$year->year}}-{{$year->quarter}}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            @foreach ($reports as $report)
                                                @if ($user->id = $report->uid)
                                                    <td>have</td>
                                                @else
                                                    <td>none</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="byquarter" role="tabpanel">
                                <p class="card-text">By quarter list.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection