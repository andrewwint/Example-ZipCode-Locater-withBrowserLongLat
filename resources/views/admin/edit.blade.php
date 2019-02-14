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
        <div class="panel-heading">Edit > {{$agents->first_name}} {{$agents->last_name}} </div>
        <div class="panel-body">

          <form class="form-horizontal" role="form" method="POST" action="{{ route('agents.update', ['agent' => $agents->id]) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }}">
              <label for="is_featured" class="col-md-4 control-label">Featured</label>

              <div class="col-md-6">
                <input id="is_featured" type="checkbox" class="form-control" name="is_featured" value="{{$agents->is_featured}}" >
                <span class="help-block">Check here to feature this Agented </span>

                @if ($errors->has('is_featured'))
                  <span class="help-block">
                    <strong>{{ $errors->first('is_featured') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
              <label for="rating" class="col-md-4 control-label">Rating</label>

              <div class="col-md-6">
                <select class="" name="rating" autofocus>
                  <option value="">1 - 5 Rating </option>
                  @for ($i=1; $i <= 5 ; $i++)
                    @if ($agents->rating == $i)
                      <option selected value="{{$i}}">{{$i}}</option>
                    @else
                      <option value="{{$i}}">{{$i}}</option>
                    @endif
                  @endfor
                </select>
                <span class="help-block">Select a rate from 1 - 5, 5 being the highest rated </span>


                @if ($errors->has('rating'))
                  <span class="help-block">
                    <strong>{{ $errors->first('rating') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('image_url') ? ' has-error' : '' }}">
              <label for="image_url" class="col-md-4 control-label">Photo</label>

              <div class="col-md-6">
                <input id="image_url" type="text" class="form-control"  name="image_url" value="{{ $agents->image_url }}" autofocus>
                <span class="help-block">http://www.domain.com/path/to/photo.jpg </span>
                @if ($errors->has('image_url'))
                  <span class="help-block">
                    <strong>{{ $errors->first('image_url') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('webpage') ? ' has-error' : '' }}">
              <label for="image_url" class="col-md-4 control-label">Web Page URL</label>

              <div class="col-md-6">
                <input id="webpage" type="text" class="form-control"  name="webpage" value="{{ $agents->webpage }}" autofocus>
                <span class="help-block">http://www.domain.com/path </span>
                @if ($errors->has('webpage'))
                  <span class="help-block">
                    <strong>{{ $errors->first('webpage') }}</strong>
                  </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
              <label for="first_name" class="col-md-4 control-label">First Name</label>

              <div class="col-md-6">
                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $agents->first_name }}" required autofocus>

                @if ($errors->has('first_name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <label for="last_name" class="col-md-4 control-label">Last Name</label>

              <div class="col-md-6">
                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $agents->last_name }}" required autofocus>

                @if ($errors->has('last_name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('agency_name') ? ' has-error' : '' }}">
              <label for="agency_name" class="col-md-4 control-label">Agency</label>

              <div class="col-md-6">
                <input id="agency_name" type="text" class="form-control" name="agency_name" value="{{ $agents->agency_name }}" required autofocus>

                @if ($errors->has('agency_name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('agency_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
              <label for="phone" class="col-md-4 control-label">Phone Number</label>

              <div class="col-md-6">
                <input id="phone" type="text" class="form-control" name="phone" value="{{ $agents->phone }}" required autofocus>

                @if ($errors->has('agency_name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('agency_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">Email</label>

              <div class="col-md-6">
                <input id="email" type="text" class="form-control" name="email" value="{{ $agents->email }}" required autofocus>

                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
              <label for="city" class="col-md-4 control-label">City</label>

              <div class="col-md-2">
                <input id="city" type="text" class="form-control" name="city" value="{{ $agents->city }}" required autofocus>

                @if ($errors->has('city'))
                  <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                  </span>
                @endif
              </div><!-- End City -->

              <div class="col-md-2">
                <div class="form-inline">
                  <div class="form-group{{ $errors->has('state_province') ? ' has-error' : '' }}">
                    <label for="state">State</label>
                    <input id="state_province" type="text" class="form-control"  name="state_province" value="{{ $agents->state_province }}" aria-describedby="basic-addon1" style="width:100px">
                    @if ($errors->has('state_province'))
                      <span class="help-block">
                        <strong>{{ $errors->first('state_province') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div><!-- End State -->

              <div class="col-md-2">
                <div class="form-inline">
                  <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                    <label for="postal_code">Zip</label>
                    <input name="postal_code" type="text" class="form-control"  name="postal_code"  value="{{ $agents->postal_code }}" aria-describedby="basic-addon1" style="width:100px">
                    @if ($errors->has('postal_code'))
                      <span class="help-block">
                        <strong>{{ $errors->first('postal_code') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div><!-- End Zip -->

            </div><!-- End City,State and Zip -->

            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
              <label for="country" class="col-md-4 control-label">Country</label>

              <div class="col-md-6">
                <input id="country" type="text" class="form-control" name="country" value="{{ $agents->country }}"  autofocus>

                @if ($errors->has('country'))
                  <span class="help-block">
                    <strong>{{ $errors->first('country') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Update
                </button>
              </div>
            </div>
          </form>

        </div> <!-- End panel-body-->
      </div>

      <!-- End Panel -->

    </div>

  </div>
</div>

@endsection
