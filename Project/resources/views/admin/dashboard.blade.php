@extends('admin.main')
@section('content')
{{-- @php
    dd($user);
@endphp --}}
<h5>Hello {{Auth::user()->name}}</h5>
@endsection
