<?php

namespace App;

use App\Traits\HasAgents;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
  use HasAgents;

  public $agents;

  public $zips;

  protected $fillable = [
    'userguid',
    'is_featured',
    'password',
    'active',
    'rating',
    'first_name',
    'last_name',
    'agency_name',
    'city',
    'state_province',
    'postal_code',
    'country',
    'phone',
    'email',
    'course_status',
    'date_enrolled',
    'date_completed',
    'dob',
    'bookings',
    'webpage',
    'image_url',
  ];

}
