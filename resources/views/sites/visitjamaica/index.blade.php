@extends('sites.visitjamaica.layouts.app')

@empty($agents)

  @section('script-head')
    <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      }
    }
    function showPosition(position) {
      var message = document.getElementById("message");
      message.innerHTML = '<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 75%"><span class="sr-only">Search in progress 75% Complete</span></div></div>';
      window.location.href = '/visitjamaica/'+position.coords.latitude+'/'+position.coords.longitude;
    }
    </script>
  @endsection

  @section('body-onload', 'getLocation()')

@endempty

@section('content')

<div class="">
    @empty($agents)
    <h5>
      Enter your zip code to find a certified agent near you
    </h5>
    <form action="{{ route('ziplookup', ['site' => 'visitjamaica.index']) }}" class="navbar-form navbar-left" role="search" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <input type="text" class="form-control" id="zip-top" name="zip" placeholder="Search" value="{{ old('zip') }} " />
          <button type="submit" class="button" id="#agent-search-top">Find Agent</button>
          @if ($errors->has('zip'))
            <span class="help-block">
              <strong>{{ $errors->first('zip') }}</strong>
            </span>
          @endif
          <div class="bg-info" id="message"></div>
        </div>
      </form>
    @endempty

    @isset($agents)
      @section('query') {{$zip->zip or ''}} @endsection

      @foreach ($agents as $agent)
        <div class="agent-block @if ($loop->iteration % 4 == 0) last @endif">

          <a href="{{ $agent['webpage'] or '#'}}" target="_blank">
            <div class="profile-pic-wrapper">
              @if (str_contains($agent['image_url'], 'http'))
                <div class="profile-pic">
                  <img src="{{$agent['image_url']}}" alt="{{ title_case($agent['first_name']) }} {{ title_case($agent['last_name']) }}">
                </div>
              @else
                <img src="http://www.visitjamaica.com/Media/Default/Things%20To%20Do/IMAGE%20Icons/bird_birdwatching.png" alt="" />
              @endif
            </div>
            <h3>
              {{ strtoupper($agent['first_name']) }} {{ strtoupper($agent['last_name']) }}
            </h3>
          </a>
          <div class="agent-details-wrapper">
            @php
              $google_map_query_string = urlencode($agent['agency_name'] .', '. $agent['city'] .', '.  $agent['state_province'] .', '. $agent['postal_code']);
            @endphp

            <a href="http://maps.google.com/?q={{$google_map_query_string}}" target="_blank">
              <div class="agency-name">
                {{ $agent['agency_name'] }}
              </div>
              <div class="agency-address">
                {{ title_case($agent['city']) }} {{ strtoupper($agent['state_province']) }} {{$agent['postal_code']}}
              </div>
            </a>

            <div class="agency-phone-email">
              <div class="phone">
                <small><span class="icon vendor-phone"></span> <span class="phone-label">Tel:</span> <a href="tel:+{{ $agent['phone'] }}" class="contact-detail phone" target="_blank">{{ $agent['phone'] }}</a></small>
              </div>
              <div class="email">
                <small><span class="icon vendor-email"></span> Email: <a href="mailto:{{ $agent['email'] }}" class="contact-detail">{{ $agent['email'] }}</a></small>
              </div>
              @if (str_contains($agent['webpage'], 'http'))
                <div class="website">
                  <small><span class="icon vendor-website"></span> Website: <a href="{{ $agent['webpage'] }}" class="contact-detail" target="_blank">{{ $agent['webpage'] }}</a></small>
                </div>
              @endif

            </div>
          </div>
          <div class="agent-buttons">
            <a href="mailto:{{ $agent['email'] }}" target="_blank" class="button expanded">Email &rarr;</a>
            <a href="tel:{{ $agent['phone'] }}" target="_blank" class="button expanded">Phone &rarr;</a>
          </div>
        </div>
      @endforeach

      <hr class="dotted-hr">
      <div>
        <h4>Travel Agents Near You <br /><small>Enter your zip code to find a certified agent near you</small></h4>
        <form action="{{ route('ziplookup', ['site' => 'visitjamaica.index']) }}"  role="search" method="POST">
          {{ csrf_field() }}
          <div class="callout clearfix">
            <input type="text" class="float-left" id="zip" name="zip" placeholder="Search" value="{{ old('zip') }} {{$zip->zip or ''}}" />
            <button id="agent-search" type="submit" class="button float-right">Find Agent</button>

            @if ($errors->has('zip'))
              <span class="help-block">
                <strong>{{ $errors->first('zip') }}</strong>
              </span>
            @endif
          </div>

          <h5>Are you a travel agent?
            <br/>
            <small><a href="{{route('profile.request')}}" target="_blank"><u>Click here to request immediate access</u></a>, so you can update your profile, add a picture or a website link</small>
          </h5>
        </form>
      </div>

    @endisset
  </div>
@endsection



@section('css-head')
<style type="text/css">
#agent-search, #agent-search-top{
}
#agent-search-top{
  padding:14px 20px 14px 20px;
}
#zip, #zip-top{
  width: 28%;
  padding: 1px 5px 2px 5px;
  background-color: #fff;
}
.agent-block{
  margin: 0;
  padding: 0;
}

.agent-block {
  width: 226px;
  display: inline-block;
  margin-right: 13px;
  margin-top: 5px;
  background-color: #fff;
  position: relative;
  margin-bottom: 20px;
}

.last{
    margin-right:0;
}

.agent-block a{
  color: #000;
  text-decoration: none;
}
.agent-block span{
  display: -webkit-flex;
  display: flex;
  -webkit-align-items: center;
  align-items: center;
  -webkit-justify-content: center;
  justify-content: center;
}

.agent-block .profile-pic{
  position:absolute;
  clip:rect(0px,226px,197px,0px);
}

.profile-pic-wrapper{
  height: 12em;
  background-color:#ddd;
  height: 197px;
  display: block;
}

.agent-block .expanded{
  width: 100%;
  margin-bottom: .5em;
}
.agent-block h3{
  font-size: 16px;
  margin: 0;
  font-weight: bold;
  text-transform: uppercase;
  padding-left: 10px;
  padding-right: 10px;
  height: 2em;
}

.agent-details-wrapper{
  padding: 10px;
  font-size: .8em;
}
.agent-block .agency-name{
  height: 2.5em;
}
.agent-block .agency-address{
  height: 2.2em;
}
.agent-block .agency-phone-email{
  height: 7.2em;
  white-space: nowrap;
}
.agent-block .contact-detail{
  display: inline-block;
  text-align: left;
}

.agent-block .phone-label{
  padding-right: 1.2em;
  display: inline-block;

}
.agent-block .agency-phone-email .icon{
  display: inline-block;
  margin-right: 9px;
  margin-left: 0;
}

.agent-block .agent-buttons a {
  display: inline-block;
  width: 100px;
  padding:5px;
  text-align: center;
  font-size: 0.8em;
  background-color: #fff;
  color:#333;
}

.agent-block .agent-buttons a:hover{
  background-color: #52b2cd;
  color:#fff;
}

@media only screen and (max-width: 768px) {
  .profile-pic-wrapper{
    display: none;
  }
  .agent-block{
    height: 22em;
  }
  .agent-block h3{
    line-height: .9em;
    font-size: 16px;
font-weight: bold;
text-transform: uppercase;
    white-space: nowrap;
  }
  .agent-block .agency-phone-email{
    height: 2.3em;
    font-size: 1.9em;
  }

  .agent-block .agency-name {
    font-size: 1.4em;
    height: 3em;
    margin-top: .3em;

  }
  .button {
    font-size: 1.2em;
  }

}

</style>
@endsection
