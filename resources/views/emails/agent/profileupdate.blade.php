@component('mail::message')
# Profile Update

## Hello {{ $agent->first_name}},

### Your profile has been updated, to view changes click on the link to below :
@component('mail::button', ['url' => route('profile.edit', ['userguid' => $agent->userguid ])])
View Your Profile
@endcomponent

### Your Pass Code to make changes
@component('mail::panel')
<div style="color:#333; text-align: center; font-weight:bold;">{{$agent->password}}</div>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
