<!DOCTYPE html>
<html lang="pt">

    <head>

        @yield('head')

    </head>

    <body style="height: 100%;">

        <!--Main Navigation-->
        <header>

         @yield('nav-bar')

        </header>

        <!-- <main class="mt-5 pt-5"> -->
        <div style="margin-top:65px;">
            @yield('main')
        </div>
        <!-- </main> -->

        <!-- <footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn"> -->
        @yield('footer')
        <!-- </footer> -->
           
        @yield('scripts-css')
        
        @yield('modals')

    </body>

</html>
