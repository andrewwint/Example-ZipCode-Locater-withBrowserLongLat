<?php

namespace App\Http\Controllers;

use Validator;
use App\Agent;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
      if (isset($request->q) && $request->q != "") {
          return view('admin.index', [
        'agents' => Agent::where('first_name', 'like', '%'.$request->q.'%')
        ->orWhere('last_name', 'like', '%'.$request->q.'%')
        ->orWhere('agency_name', 'like', '%'.$request->q.'%')
        ->orWhere('email', 'like', '%'.$request->q.'%')
        ->orWhere('postal_code', 'like', '%'.$request->q.'%')
        ->orWhere('city', 'like', '%'.$request->q.'%')
        ->orWhere('email', 'like', '%'.$request->q.'%')
        ->orWhere('state_province', 'like', '%'.$request->q.'%')
        ->orderBy('bookings', 'desc')->paginate(15),
        'q' => $request->q,
      ]);# code...
      } else {
          return view('admin.index', [
        'agents' => Agent::orderBy('bookings', 'desc')->paginate(15),
        'q' => '',
      ]);
      }
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
      return view('admin.create');
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function processProfiles()
  {
      try {
        Agent::loadExcel();
      } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
      }

  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function processBooking()
  {
    try {
      Agent::upateBookings();
    } catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
      //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
      return view('admin.show', [
      'agents' => Agent::find($id),
    ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
      return view('admin.edit', [
      'agents' => Agent::find($id),
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
      $validator = Validator::make($request->all(), [
      'first_name' => 'required',
      'last_name' => 'required',
      'agency_name' => 'required',
      'email' => 'required|email',
      'postal_code' => 'required',
    ]);

      if ($validator->fails()) {
          return redirect()
      ->route('agents.edit', ['agent' => $id])
      ->withErrors($validator)
      ->withInput();
      }

      $agent = Agent::find($id);
      $agent->is_featured = $request->is_featured;
      $agent->rating = $request->rating;
      $agent->first_name = $request->first_name;
      $agent->last_name = $request->last_name;
      $agent->agency_name = $request->agency_name;
      $agent->city = $request->city;
      $agent->state_province = $request->state_province;
      $agent->postal_code = $request->postal_code;
      $agent->country = $request->country;
      $agent->phone = $request->phone;
      $agent->email = $request->email;
      $agent->image_url = $request->image_url;
      $agent->webpage = $request->webpage;
      $agent->save();

      return redirect()->route('agents.show', ['agent' => $id]);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
      //
  }
}
