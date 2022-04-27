@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            Dashboard
                        </div>
                        <div class="col-md-3 float-right">
                            <div class="badge bg-warning text-dark">
                                <span class="fs-6">Active Year:{{ $activeYear->year }} | Quarter:{{ $activeYear->quarter }}</span>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#">{{ __('View Reports') }}</a></li>
                        <li class="list-group-item"><a href="{{ route('report.form') }}">{{ __('Submit Report') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection