<!DOCTYPE html>
<html lang="pt">

    <head>

        @yield('head')

    </head>

    <body>
            <div class="wrapper">

                <!--Main Navigation-->
                <header>

                 @yield('nav-bar')

                </header>

                <!-- <main class="mt-5 pt-5"> -->
                <div class="pt-5" style="margin-top:65px;">
                    @yield('main')
                </div>
                <!-- </main> -->


                <div class="push"></div>

            </div>

            <!-- <footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn"> -->
            @yield('footer')
            <!-- </footer> -->
               
            @yield('scripts-css')
            
            @yield('modals')




    </body>

</html>

<style>

html, body {
    height: 100%;
}

.wrapper {
    min-height: 100%;
    height: 100%;
    margin: 0 auto -99px; /* the bottom margin is the negative value of the footer's height */
}

.footer, .push {
    height: 99px; /* .push must be the same height as .footer */
}

</style>
