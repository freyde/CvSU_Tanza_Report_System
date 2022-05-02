@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <li class="nav-item nav-link text-black">{{ __('Designations') }}</li>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Value</th>
                        </thead>
                        <tbody>
                        @foreach($designations as $designation)
                        <tr>
                            <td>{{ $designation->name }}</td>
                            <td>{{ $designation->value }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection