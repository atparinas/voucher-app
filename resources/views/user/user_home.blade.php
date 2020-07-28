@extends('layouts.app')


@section('content')

{{--    <h1>You are inside the Users area</h1>--}}

{{--    <div>--}}
{{--        <p>--}}
{{--            User: {{ Auth::user()->name }}--}}
{{--        </p>--}}

{{--    </div>--}}

    <user-dashboard :user="{{ Auth::user() }}"></user-dashboard>

@endsection
