@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <div class="list-group">
          <a href="{{route('agents.index')}}" class="list-group-item">
            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> All Agents
          </a>
          <hr>
          {{--
          <a href="#" class="list-group-item active">
          {{$agents->first_name}} {{$agents->last_name}}
        </a>
        <a href="#" class="list-group-item">Edit {{$agents->first_name}} {{$agents->last_name}}</a>
        <a href="#" class="list-group-item">Disable {{$agents->first_name}} {{$agents->last_name}}</a>
        --}}

      </div>


    </div>

    <div class="col-md-9 col-sm-9 ">

      <!-- Start Panel-->

      <div class="panel panel-default">
        <div class="panel-heading">View > {{$agents->first_name}} {{$agents->last_name}} </div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="GET" action="{{ route('agents.edit', ['agent'=> $agents->id]) }}">


            <div class="form-group">
              <label for="is_featured" class="col-md-4 control-label">Featured</label>

              <div class="col-md-6">
                @if ($agents->is_featured == 1)
                  Yes @else No @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="rating" class="col-md-4 control-label">Rating</label>

                  <div class="col-md-6">
                    @include('admin.partials.fivestarrating', ['rating' => $agents->rating ])
                  </div>
                </div>

                @if ($agents->image_url != '')
                  <div class="form-group">
                    <label for="rating" class="col-md-4 control-label">Photo</label>

                    <div class="col-md-6">
                      <img src="{{$agents->image_url}}" alt="" class="img-rounded">
                    </div>
                  </div>
                @endif

                @if ($agents->webpage != '')
                  <div class="form-group">
                    <label for="rating" class="col-md-4 control-label">Web Site</label>

                    <div class="col-md-6">
                      <a href="{{$agents->webpage}}" target="_newwindow">{{$agents->webpage}}</a>
                    </div>
                  </div>
                @endif

                <div class="form-group">
                  <label for="first_name" class="col-md-4 control-label">First Name</label>

                  <div class="col-md-6">
                    {{ $agents->first_name }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="last_name" class="col-md-4 control-label">Last Name</label>

                  <div class="col-md-6">
                    {{ $agents->last_name }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="agency_name" class="col-md-4 control-label">Agency</label>

                  <div class="col-md-6">
                    {{ $agents->agency_name }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="phone" class="col-md-4 control-label">Phone Number</label>

                  <div class="col-md-6">
                    {{ $agents->phone }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-md-4 control-label">Email</label>

                  <div class="col-md-6">
                    {{ $agents->email }}
                  </div>
                </div>

                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                  <label for="city" class="col-md-4 control-label">City</label>

                  <div class="col-md-2">
                    {{ $agents->city }}

                  </div><!-- End City -->

                  <div class="col-md-2">
                    <div class="form-inline">
                      <div class="form-group{{ $errors->has('state_province') ? ' has-error' : '' }}">
                        <label for="state">State</label>
                        {{ $agents->state_province }}

                      </div>
                    </div>
                  </div><!-- End State -->

                  <div class="col-md-2">
                    <div class="form-inline">
                      <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                        <label for="postal_code">Zip</label>
                        {{ $agents->postal_code }}

                      </div>
                    </div>
                  </div><!-- End Zip -->

                </div><!-- End City,State and Zip -->

                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                  <label for="first_name" class="col-md-4 control-label">Country</label>

                  <div class="col-md-6">
                    {{ $agents->country }}
                  </div>
                </div>

                <div class="form-group{{ $errors->has('course_status') ? ' has-error' : '' }}">
                  <label for="course_status" class="col-md-4 control-label">Course Status</label>

                  <div class="col-md-6">
                    <input id="course_status" type="text" class="form-control" name="" value="{{ $agents->course_status }}" readonly>
                    <span id="helpBlock" class="help-block">
                      <div class="pull-left">
                        Enrolled: {{$agents->date_enrolled}}
                      </div>
                      <div class="pull-right">
                        Completed: {{$agents->date_completed}}
                      </div>
                    </span>

                  </div>
                </div>
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                  <label for="first_name" class="col-md-4 control-label">UserGuid</label>

                  <div class="col-md-6">
                    {{ $agents->userguid }}
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      Edit
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- End Panel -->

        </div>

      </div>
    </div>

  @endsection
