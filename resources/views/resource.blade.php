@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Resources</h3>
      </div>
      <div class="panel-body">
        <h2>Widgets</h2>

        <h3>Default</h3>
        <p class="lead">Copy and paste the following iframe code</p>
        <code>&lt;iframe src="{{route('home.widget')}}?{{rand(1000, 9999)}}" width="100%" height="250px" frameborder="0"&gt;&lt;/iframe&gt;</code>
        <hr>
        <p class="lead">Example</p>

        <div class="widget-example-container">
           <iframe src="{{route('home.widget')}}?{{rand(1000, 9999)}}" width="100%" height="250px" frameborder="0"></iframe>
        </div>

        <h3>Visit Jamaica</h3>
        <p class="lead">Copy and paste the following iframe code</p>
        <code>&lt;iframe src="{{route('visitjamaica.widget')}}?{{rand(1000, 9999)}}" width="100%" height="250px" frameborder="0"&gt;&lt;/iframe&gt;</code>
        <hr>
        <p class="lead">Example</p>

        <div class="widget-example-container">
           <iframe src="{{route('visitjamaica.widget')}}?{{rand(1000, 9999)}}" width="100%" height="250px" frameborder="0"></iframe>
        </div>

        <h3>Island Buzz Jamaica</h3>
        <p class="lead">Copy and paste the following iframe code</p>
        <code>&lt;iframe src="{{route('islandbuzzjamaica.widget')}}?{{rand(1000, 9999)}}" width="100%" height="250px" frameborder="0"&gt;&lt;/iframe&gt;</code>
        <hr>
        <p class="lead">Example</p>

        <div class="widget-example-container">
          <iframe src="{{route('islandbuzzjamaica.widget')}}?{{rand(1000, 9999)}}" width="100%" height="250px" frameborder="0"></iframe>
        </div>

      </div>

      <div class="panel-footer">

      </div>
    </div>



  </div>
</div>
@endsection

@section('css-head')
<style type="text/css">
.widget-example-container {
  width: 400px;
}
</style>

@endsection
