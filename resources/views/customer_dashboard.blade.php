Hi
{{-- @php
dd();
@endphp
@foreach($tenant as $row)
{{ $row->name }}
@endforeach
{{ $tenant = Tenant::where('id', auth()->user()->current_tenant_id)->first();}} --}}
{{ $tenant->name }}
<br>
<br>
@foreach($contacts as $row)
{{ $row->name }}
<br>
{{ $row->email }}
@endforeach