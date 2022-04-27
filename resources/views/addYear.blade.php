@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <li class="nav-item nav-link text-black">{{ __('Add Year') }}</li>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('save.year') }}">
                            @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Year') }}</label>

                            <div class="col-md-7">
                                <input id="year" name="year" type="text" class="form-control" autofocus>
                            </div>
                            
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection