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
                                <div class="accordion" id="">

                                    @foreach ($reports as $array)
                                        {{$array->id}}{{$array->uid}}{{$array->year}}
                                    @endforeach


                                    @foreach ($users as $user)
                                    
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$user->id}}" aria-expanded="false" aria-controls="collapseOne">
                                              {{ $user->name}}
                                          </button>
                                        </h2>
                                        @foreach ($reports as $report)
                                        <div id="collapse{{$user->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                              <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                            </div>
                                          </div>
                                        @endforeach
                                        
                                    </div>
                                    @endforeach
                                    
                                    
                                  </div>
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