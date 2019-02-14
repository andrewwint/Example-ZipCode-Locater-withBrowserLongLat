@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="row">

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Agents</h3>
        </div>
        <div class="panel-body">

          <table class="table table-striped">
            <thead>
              <th><span class="glyphicon glyphicon-star" aria-hidden="true"></span></th>
              <th><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span></th>
              <th><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></th>
              <th width="150px">Name</th>
              <th>Agency</th>
              <th>City</th>
              <th width="100px">
                <div class="pull-left">State</div>
                <div class="pull-right">Zip</div>
              </th>
              <th width="110px">Bookings</th>
              <th width="170px">Actions</th>
            </thead>
            <tbody>
              @foreach ($agents as $agent)
                <tr>
                  <td>
                    @if ($agent->is_featured == 1)
                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    @else
                      <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                    @endif
                  </td>
                  <td>
                    @if ($agent->course_status == "Graduated")
                      <span class="glyphicon glyphicon-certificate text-muted" aria-hidden="true"></span>
                    @endif
                  </td>
                  <td>
                    @if ($agent->image_url != "")
                      <span class="glyphicon glyphicon-picture text-muted" aria-hidden="true"></span>
                    @endif
                  </td>
                  <td>
                    <a href="{{route('agents.show', ['agent'=> $agent->id])}}">
                      {{$agent->first_name}} {{$agent->last_name}}
                    </a>
                  </td>
                  <td>{{$agent->agency_name}}</td>
                  <td>{{$agent->city}}</td>
                  <td>
                    <div class="pull-left">{{$agent->state_province}}</div>
                    <div class="pull-right">{{$agent->postal_code}}</div>
                  </td>
                  <td>
                    {{$agent->bookings}}
                  </td>
                  <td>
                    <a href="{{route('agents.edit', ['agent'=> $agent->id])}}" class="btn btn-primary btn-sm" type="button" name="button">
                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
                    </a>
                    <a href="{{route('agents.destroy', ['agent'=> $agent->id])}}" class="btn btn-primary btn-sm" type="button" name="button">
                      <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>  Disable
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          @if ($q)
            {{ $agents->appends(['q' => $q])->links() }}
          @else
            {{ $agents->links() }}
          @endif

        </div>
        <div class="panel-footer">

        </div>
      </div>

    </div>
  </div>
@endsection
