<!DOCTYPE html>
<html lang="pt">

<head>

    @yield('head')

</head>

    <body>

        <!--Main Navigation-->
        <header>

         @yield('nav-bar')

        </header>

        <!-- <main class="mt-5 pt-5"> -->
        @yield('main')
        <!-- </main> -->

        <!-- <footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn"> -->
        @yield('footer')
        <!-- </footer> -->
           
        @yield('scripts-css')
        
        @yield('modals')

    </body>

</html>
