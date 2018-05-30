@extends('app')


@section('head')

    @include('layout.head')
    
@endsection

@section('nav-bar')

   @include('layout.nav-bar')

@endsection

@section('main')

    @include('layout.searchPage')
    
@endsection

@section('footer')

   @include('layout.footer')

@endsection

@section('scripts-css')

  @include('layout.scripts-css')

@endsection