@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{ route('faculties') }}">{{ __('View Faculties') }}</a></li>
                        <li class="list-group-item">Print Report</li>
                        <li class="list-group-item"><a href="{{ route('years') }}">{{ __('Set Academic Year/Quarter') }}</a></li>
                        <li class="list-group-item"><a href="{{ route('designations') }}">Designations</a></li>
                        <li class="list-group-item"><a href="">Email Reminder</a></li>
                        <li class="list-group-item"><a href="{{ route('report.form') }}">View Form</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection