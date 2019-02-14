@extends('layouts.admin')
@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

          @if (str_contains(url()->current(), 'thankyou'))
             <h1>THANK YOU</h1>
             Please check your email for a message from us or <a href="{{route('profile.request')}}">click here to again</a>.
          @else
          <form class="" action="{{route('profile.sendpasscode')}}" role="form" method="POST" style="margin-top:5%;">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <h1>Profile Access</h1>
              <p class="lead">
                You will recive an email with instructions on how personalize your accout.
                So you can add your website url, add a photo of yourself and change your profile information for <a href="http://www.vsitjamaica.com">www.vsitjamaica.com</a> and <a href="http://www.islandbuzzjamaica.com">www.islandbuzzjamaica.com</a>.

              </p>

              <label for="">Email Address</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="you@email.com" style="height:80px; font-size: 2.5em;">

              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
              <p class="help-block">Enter your email address and we send a passcode with instructions on how to update your profile.</p>
              <button type="submit" class="btn btn-primary btn-group-justified" style="height:80px; font-size: 300%;">
                GET ACCESS
              </button>
            </div>
          </form>
          @endif

        </div>
    </div>
  </div>
@endsection
