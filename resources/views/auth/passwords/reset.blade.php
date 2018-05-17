@extends('app')



@section('head')

    <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Área de Cliente</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../../css/custom-styles.css" rel="stylesheet">

    <!-- Premium styles -->
    <link href="../../css/style-premium.css" rel="stylesheet">

    
@endsection




@section('nav-bar')

    @include('layout.nav-bar')
    
@endsection




@section('main')

    @include('layout.reset')
    
@endsection



@section('footer')

    @include('layout.footer')

@endsection



@section('scripts-css')

<!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../../js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        
    </script>
    
@endsection


@section('modals')

    @include('layout.modals')
    
@endsection

