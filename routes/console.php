<?php

use App\Agent;
use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
  $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('jtb:load', function () {
  $this->info("Loading Agents!");
  Agent::loadExcel();
})->describe('Load agents booking numbers from uploaded Excel Document');

Artisan::command('jtb:update ', function () {
  $this->info("Update Agent's Bookings!");
  Agent::upateBookings(); 
})->describe("Update agent's from uploaded Excel Document");
