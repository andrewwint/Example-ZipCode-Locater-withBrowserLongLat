@extends('layouts.admin')
@section('content')
  <div class="container">
    <div class="row">

      <div class="panel panel-default col-md-12">
        @if ($agents == null)
          <h1 class="text-center" style="padding:20%;">Sorry we couldn't find a record for you!</h1>
        @else
        <div class="panel-heading">
          <h3 class="panel-title">Hello {{ title_case($agents->first_name) }} </h3>
          Thank you for improving our visitor's experience. Below you can update your profile on our web-sites. <br />
        </div>
        <div class="panel-body">
             <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update', ['agent' => $agents->userguid]) }}">
               {{ method_field('PUT') }}
               {{ csrf_field() }}
               <input type="hidden" name="id" value="{{ $agents->id }}">

               <div class="form-group{{ $errors->has('image_url') ? ' has-error' : '' }}">
                 <label for="image_url" class="col-md-2 control-label">Photo</label>

                 <div class="col-md-6">
                   <input id="image_url" type="text" class="form-control"  name="image_url" value="{{ $agents->image_url or old('image_url')}}" placeholder="http://" autofocus>
                   <span class="help-block">http://www.domain.com/path/to/photo.jpg </span>
                   @if ($errors->has('image_url'))
                     <span class="help-block">
                       <strong>{{ $errors->first('image_url') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>

               <div class="form-group{{ $errors->has('webpage') ? ' has-error' : '' }}">
                 <label for="image_url" class="col-md-2 control-label">Website Url</label>

                 <div class="col-md-6">
                   <input id="webpage" type="text" class="form-control"  name="webpage" value="{{ $agents->webpage or old('webpage') }}" placeholder="http://" autofocus>
                   <span class="help-block">http://www.domain.com/ </span>
                   @if ($errors->has('webpage'))
                     <span class="help-block">
                       <strong>{{ $errors->first('webpage') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>

               <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                 <label for="first_name" class="col-md-2 control-label">First Name</label>

                 <div class="col-md-6">
                   <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $agents->first_name or old('first_name') }}" required autofocus>

                   @if ($errors->has('first_name'))
                     <span class="help-block">
                       <strong>{{ $errors->first('first_name') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>

               <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                 <label for="last_name" class="col-md-2 control-label">Last Name</label>

                 <div class="col-md-6">
                   <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $agents->last_name or old('last_name') }}" required autofocus>

                   @if ($errors->has('last_name'))
                     <span class="help-block">
                       <strong>{{ $errors->first('last_name') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>

               <div class="form-group{{ $errors->has('agency_name') ? ' has-error' : '' }}">
                 <label for="agency_name" class="col-md-2 control-label">Agency</label>

                 <div class="col-md-6">
                   <input id="agency_name" type="text" class="form-control" name="agency_name" value="{{ $agents->agency_name or old('agency_name')}}" required autofocus>

                   @if ($errors->has('agency_name'))
                     <span class="help-block">
                       <strong>{{ $errors->first('agency_name') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>

               <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                 <label for="phone" class="col-md-2 control-label">Phone Number</label>

                 <div class="col-md-6">
                   <input id="phone" type="text" class="form-control" name="phone" value="{{ $agents->phone or old('phone') }}" required autofocus>

                   @if ($errors->has('agency_name'))
                     <span class="help-block">
                       <strong>{{ $errors->first('agency_name') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>

               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                 <label for="email" class="col-md-2 control-label">Email</label>

                 <div class="col-md-6">
                   <input id="email" type="text" class="form-control" name="email" value="{{ $agents->email or old('email') }}" required autofocus>

                   @if ($errors->has('email'))
                     <span class="help-block">
                       <strong>{{ $errors->first('email') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>

               <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                 <label for="city" class="col-md-2 control-label">City</label>

                 <div class="col-md-2">
                   <input id="city" type="text" class="form-control" name="city" value="{{ $agents->city or old('city') }}" required autofocus>

                   @if ($errors->has('city'))
                     <span class="help-block">
                       <strong>{{ $errors->first('city') }}</strong>
                     </span>
                   @endif
                 </div><!-- End City -->

                 <div class="col-md-2 col-xs-12">
                   <div class="form-inline">
                     <div class="form-group{{ $errors->has('state_province') ? ' has-error' : '' }}">
                       <label for="state">State</label>
                       <input id="state_province" type="text" class="form-control"  name="state_province" value="{{ $agents->state_province or old('state_province') }}" aria-describedby="basic-addon1" style="width:100px">
                       @if ($errors->has('state_province'))
                         <span class="help-block">
                           <strong>{{ $errors->first('state_province') }}</strong>
                         </span>
                       @endif
                     </div>
                   </div>
                 </div><!-- End State -->

                 <div class="col-md-2 col-xs-12">
                   <div class="form-inline">
                     <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                       <label for="postal_code">Zip</label>
                       <input name="postal_code" type="text" class="form-control"  name="postal_code"  value="{{ $agents->postal_code or old('postal_code') }}" aria-describedby="basic-addon1" style="width:100px">
                       @if ($errors->has('postal_code'))
                         <span class="help-block">
                           <strong>{{ $errors->first('postal_code') }}</strong>
                         </span>
                       @endif
                     </div>
                   </div>
                 </div><!-- End Zip -->

               </div><!-- End City,State and Zip -->

               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                 <label for="email" class="col-md-2 control-label">Pass Code</label>

                 <div class="col-md-6">
                   <h4>Refer to your welcome email for your Pass Code</h4>

                   <input id="password" maxlength="10" type="text" class="form-control bg-info text-center" name="password" value="{{old('password')}}" required autofocus style="height:75px; font-size: 34px; text-transform: uppercase; font-weight:bold; background-color:#ddd; color:#333;">

                   @if ($errors->has('password'))
                     <span class="help-block">
                       <strong>{{ $errors->first('password') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>

               <div class="form-group">
                 <div class="col-md-6 col-md-offset-2">
                    <button type="submit" class="btn btn-primary btn-group-justified btn-lg" style="height:75px">
                      Update Your Profile
                    </button>
                 </div>
               </div>
             </form>
           @endif
        </div>
        <div class="panel-footer">
        </div>
      </div>

    </div>
  </div>
@endsection
