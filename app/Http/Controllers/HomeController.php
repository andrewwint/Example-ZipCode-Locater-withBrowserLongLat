<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $zip;


  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function visitjamaicaIndex(Request $request)
  {
      if (isset($request->latitude) && isset($request->longitude)) {
          $agent = new Agent;
          $agent->findAgentAllByLatLong($request->latitude, $request->longitude, .01, $request->zip);
          return view('sites.visitjamaica.index', [
          'agents' => collect($agent->agents)->sortByDesc('bookings')->all(),
          'zip'=> $agent->zips,
        ]);
      } else {
          return view('sites.visitjamaica.index');
      }
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function visitjamaicaMobileIndex(Request $request)
  {
      if (isset($request->latitude) && isset($request->longitude)) {
          $agent = new Agent;
          $agent->findAgentAllByLatLong($request->latitude, $request->longitude, .01, $request->zip);
          return view('sites.visitjamaica.mobile', [
          'agents' => collect($agent->agents)->sortByDesc('bookings')->all(),
          'zip'=> $agent->zips,
        ]);
      } else {
          return view('sites.visitjamaica.mobile');
      }
  }

  /**
  * Show the search widget.
  *
  * @return \Illuminate\Http\Response
  */
  public function visitjamaicaWidget()
  {
    return view('sites.visitjamaica.widget');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function islandbuzzjamaicaIndex(Request $request, $view = '')
  {
      if (isset($request->latitude) && isset($request->longitude)) {
          $agent = new Agent;
          $agent->findAgentAllByLatLong($request->latitude, $request->longitude, .01, $request->zip);
          return view('sites.islandbuzzjamaica.index', [
            'agents' => collect($agent->agents)->sortByDesc('bookings')->all(),
            'zip'=> $agent->zips,
          ]);
      } else {
          return view('sites.islandbuzzjamaica.index');
      }
  }

  /**
  * Show the search widget.
  *
  * @return \Illuminate\Http\Response
  */
  public function islandbuzzjamaicaWidget()
  {
    return view('sites.islandbuzzjamaica.widget');
  }


  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request, $view = '')
  {
      if (isset($request->latitude) && isset($request->longitude)) {
          $agent = new Agent;
          $agent->findAgentAllByLatLong($request->latitude, $request->longitude, .01, $request->zip);
          return view('home', [
            'agents' => collect($agent->agents)->sortByDesc('bookings')->all(),
            'zip'=> $agent->zips,
          ]);
      } else {
          return view('home');
      }
  }

  /**
  * Show the search widget.
  *
  * @return \Illuminate\Http\Response
  */
  public function indexWidget()
  {
    return view('widget');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function ziplookup(Request $request)
  {
      $agent = new Agent;

      $result = $agent->getGeoLocByZip($request->zip);

      if (count($result) == 1) {
          return redirect()->route($request->site, ['latitude' => $result->latitude,
          'longitude' => $result->longitude,
          'zip' => $request->zip
        ]);
      }

      return redirect()->back();
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
    public function resources(Request $request)
    {
        return view('resource');
    }
}
