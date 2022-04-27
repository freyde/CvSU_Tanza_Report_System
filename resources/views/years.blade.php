@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <li class="nav-item nav-link text-black">{{ __('Year and Quarter Management') }}</li>
                </div>
                <div class="card-body">
                    <!-- <div class="hidden fixed top-0 right-0 sm:block"> -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a class="btn btn-primary float-end" href="{{ route('add.year') }}" role="button"> Add Year</a></li>
                        </ul>
                    <!-- </div> -->

                    @if($years->isEmpty())
                        No registered faculty
                    @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Year</th>
                            <th>Quarter</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach ($years as $year)
                        <tr>
                            <td>{{ $year->year }}</td>
                            <td>{{ $year->quarter }}</td>
                            <td>
                                @if ($year->status == 'active')
                                    <p class="text-success fw-bold">ACTIVE</p>
                                @else
                                    <p class="text-secondary fw-bold">INACTIVE</p>
                                @endif
                            </td>
                            <td>
                                @if ($year->status == 'inactive')
                                    <input class="btn btn-outline-success" type="button" onClick="updateYear({{ $year->year }},{{$year->quarter}})" value="Activate">
                                @else
                                    <input class="btn btn-outline-secondary" type="button" onClick="" value="Activate" disabled>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection