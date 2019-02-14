@component('mail::message')
# Profile Access

## Hello {{ $agent->first_name}},

### Your Pass Code to verify that it's really you:
@component('mail::panel')
<div style="color:#333; text-align: center; font-weight:bold;">{{$agent->password}}</div>
@endcomponent

### Your link to update your profile
@component('mail::button', ['url' => route('profile.edit', ['userguid' => $agent->userguid ])])
Update Your Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
