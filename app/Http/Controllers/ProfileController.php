<?php

namespace App\Http\Controllers;

use App\Agent;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mail\AgentProfileAccess;
use App\Mail\AgentProfileUpdate;

class ProfileController extends Controller
{
    public function profileEdit(Request $request)
    {
        $agent = Agent::where('userguid', $request->userguid)->first();
        return view('profile', ['agents' => $agent]);
    }

    public function profileUpdate(Request $request, $userguid)
    {

      $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'exists:agents|required',
        'phone' => 'required|min:10',
        'first_name' => 'required',
        'last_name' => 'required',
        'agency_name' => 'required',
        'city' => 'required',
        'state_province' => 'required',
        'postal_code' => 'required',
      ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }

      $agent = Agent::find($request->id);
      $agent->first_name = $request->first_name;
      $agent->last_name = $request->last_name;
      $agent->email = $request->email;
      $agent->agency_name = $request->agency_name;
      $agent->city = $request->city;
      $agent->state_province = $request->state_province;
      $agent->postal_code = $request->postal_code;
      $agent->webpage = $request->webpage;
      $agent->image_url = $request->image_url;
      $agent->active = 1;

      $agent->save();

      Mail::to($agent)->send(new AgentProfileUpdate($agent));

      return redirect()->route('profile.update.confirmation');

    }

    public function profileSendPassCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'email' => 'exists:agents|required|email',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $agents = Agent::where('email', $request->email)->get();

        foreach ($agents as $agent) {
            Mail::to($agent)->send(new AgentProfileAccess($agent));
        }

        return redirect()->route('profile.request.thankyou');
    }

    public function profileRequest()
    {
        return view('requestpasscode');
    }

    public function profileUpateConfirmation(Request $request)
    {
      return view('profileconfirmation');
    }
}
