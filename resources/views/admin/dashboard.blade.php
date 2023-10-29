@extends('layouts.admin')
@section('title') Dashboard @endsection
@section('homePage') Dashboard @endsection
@section('homeLink') Dashboard @endsection
@section('homeLinkActive') Home @endsection
@section('links')
<button class="btn btn-sm btn-primary">
  <a href="{{ route('admin.dashboard.show') }}" title="Go To admin dashboard setting">
  <i class="fas fa-cogs text-light"></i></a></button>
@endsection