<!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container">

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="{{ url('/') }}">Início
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://www.digitalinput.pt/" target="_blank">DigitalInput</a>
                        </li>

                         <li class="nav-item">
                            <a class="nav-link waves-effect" href="{{ url('/contactos') }}">Informações
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        @else
                           
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://www.digitalinput.pt/" target="_blank">DigitalInput</a>
                        </li>

                         <li class="nav-item">
                            <a class="nav-link waves-effect" href="{{ url('/contactos') }}">Informações
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="{{ url('/clientHome') }}">Os seus Dados
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        @endguest
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                         @guest

                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                    <img src="img/avatar.png" height="42" width="42"></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                        
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->