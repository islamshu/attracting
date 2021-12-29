@extends('layouts.frontend')
@section('content')
@include('frontend._slider')

@include('frontend._features')

@include('frontend._booking')
{{-- @include('frontend._about') --}}

@include('frontend._services')



@include('frontend._statistic')

@include('frontend._contact')
 
@endsection