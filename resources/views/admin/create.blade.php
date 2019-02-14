@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Recent Graduates Upload <br /><small>Full agent profiles</small></h3>
          </div>
          <div class="panel-body">
             <h5>Please review the following before uplading</h5>
             <div class="bg-info col-lg-12" style="padding-bottom:10px">
                 <br />Upload a excel file that has the following <strong>headers and columns</strong> assocated with the agents' profile.
                <div>
                  <br>
                  <div class="clearfix">
                    <code >UserGuid,	FirstName,	LastName, AgencyName,	City,	State/Province,	PostalCode,	Country,
                      PhoneNumber,	EmailAddress,	CourseStatus,	DateEnrolled,	DateCompleted,	BirthDate,	Bookings</code>
                  </div>
                  <br>
                  <strong><i>Important:</i></strong> In the first sheet of the Excel document without formulas or calculations linked to other sheets.
                </div>
               </div>
               <div class="col-lg-12 bg-info" style="padding:10px">
                 <form class="form-inline" action="{{route('agents.upload')}}" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                   {{ csrf_field() }}
                   <input class="form-control" type="file" name="agents_excel" value="" accept=".xls,.xlsx">
                   <button type="submit" class="btn btn-primary ">Upload</button>
                 </div>
                 </form>
               </div>

               <div class="col-lg-12 bg-success" style="padding:10px">
                 Once the file has been uploaded you can click the button bellow, to process the file which takes 5 to 7 mins. In the meantime the agents records won't be visible to visitors.
                   <strong>
                     This process will replace the entire agent's datbase, expect for the agent's that have customized their profile.
                   </strong>
                </div>

                <div class="col-lg-12" id="profile-message" style="padding:10px"></div>

                <div class="col-lg-12" style="margin-top:10px;">
                   <button type="button" class="btn btn-primary btn-lg btn-group-justified" id="load-agents" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Refreshing all agents, normally takes 5 - 7 Mins" disabled style="height: 80px">Process Agents Profile</button>
                   <div id="profile-results" style="font-family: monospace; white-space: pre;"></div>
                </div>

               @push('scripts')
                 <script>
                 $(document).ready(function(){
                     var query = window.location.search;
                     if(query == '?pa') {
                         $('#load-agents').removeAttr("disabled");
                         $('#profile-message').html('<h4><i>Upload Successful:</i></h4>The file has been successly uploaded, now click the <strong>Process Agents Profile</strong> button bellow').addClass('bg-warning');
                     }
                 });

                    $('#load-agents').on('click', function() {
                       let $btn = $(this).button('loading');

                        $.ajax({
                          type: 'GET',
                          url: '/agents/process/profiles',
                          //datatype: 'html',
                          cache: 'false',
                          beforeSend: function(){
                            $('#profile-results').html("Progress can be viewed, just go to 'Agents' in the top nav.<br/>If you see an issue review the Excel file and try again... ");
                          },
                          success: function(response) {
                            $('#profile-results').html(response);
                            $btn.button('reset');
                          },
                          error: function(){
                            $('#profile-results').html("If you see an issue on the 'Agents' page, <br/>review the Excel file and try again... ");
                            $btn.button('reset');
                          }
                        }); // End Ajax

                    });
                 </script>
               @endpush

          </div>

        </div>

      </div>
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Agent Bookings' <br /><small>Number of booking and email</small></h3>
          </div>
          <div class="panel-body">
            <h5>Please review the following before uplading</h5>
            <div class="bg-info col-lg-12" style="padding-bottom:10px">
                <br />Upload a excel file that has the following <strong>headers and columns</strong> assocated with the agents' profile.
               <div>
                 <br>
                 <div class="clearfix">
                   <code>
                     EmailAddress,	Bookings
                   </code>
                 </div>
                 <br>
               </div>
              </div>

            <div class="col-lg-12 bg-info" style="padding:10px">
            <form class="form-inline" action="{{route('agents.update.bookings')}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
              {{ csrf_field() }}
              <input class="form-control" type="file" name="agents_excel" value="" accept=".xls,.xlsx">
              <button type="submit" class="btn btn-primary ">Upload</button>
            </div>
            </form>
          </div>
          <div class="col-lg-12 bg-success" style="padding:10px">
            Once the file has been uploaded you can click the button bellow.
           </div>
            <div class="col-lg-12" id="bookings-message" style="padding:10px"></div>

            <div class="col-lg-12" style="margin-top:10px;">
                <button type="button" class="btn btn-primary btn-lg btn-group-justified " id="load-bookings" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Updating agent bookings..." disabled style="height: 80px">Process Agents Bookings</button>
                <div id="bookings-results" style="font-family: monospace; white-space: pre;"></div>
            </div>

            @push('scripts')
              <script>
              $(document).ready(function(){
                  var query = window.location.search;
                  if(query == '?bk') {
                      $('#load-bookings').removeAttr("disabled");
                      $('#bookings-message').html('<br>The file has been successly uploaded, now click the <strong>Process Agents Bookings</strong> button bellow').addClass('bg-warning');
                  }
              });
                 $('#load-bookings').on('click', function() {
                     let $btn = $(this).button('loading');
                     $.ajax({
                       type: 'GET',
                       url: '/agents/process/bookings',
                       //datatype: 'html',
                       cache: 'false',
                       beforeSend: function(){
                         $('#bookings-results').html("Progress can be viewed, just go to 'Agents' in the top nav.<br/>If you see an issue review the Excel file and try again... ");
                       },
                       success: function(response) {
                         $('#bookings-results').html(response);
                         $btn.button('reset');
                       },
                       error: function(){
                         $('#bookings-results').html("If you see an issue on the 'Agents' page, <br/>review the Excel file and try again... ");
                         $btn.button('reset');
                       }
                     }); // End Ajax

                 });
              </script>
            @endpush

          </div>

        </div>
      </div>






    </div>
  </div>
@endsection
