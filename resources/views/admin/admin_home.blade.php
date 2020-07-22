@extends('admin.layouts.admin')

@section('admin.content')

    <h1>You are now inside the Admin Users Area</h1>

    <div>
        <p>
           User: {{ Auth::user() }}
        </p>

    </div>

@endsection
