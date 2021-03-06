            <!DOCTYPE html>
            <div lang="{{ config('app.locale') }}">
            <head>

                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <!-- CSRF Token -->
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <title>{{ config('app.name', '') }}</title>

                <!-- Styles -->
                <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                <link href="{{ asset('css/project.css') }}" rel="stylesheet">
                <link href="{{ asset('css/icons/icons.css') }}" rel="stylesheet">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

                <!-- Scripts -->
                <script>
                    window.Laravel = {!! json_encode([
                        'csrfToken' => csrf_token(),
                    ]) !!};
                </script>
            </head>
                <body>
            <div>
            </div>
            <div id="app">

                {{-- The Navigation bar starts here--}}
                {{--authentication--}}
            </div>
                <div>
                    <div class="top-bar">
                        <div class="top-bar-left">
                            <img src="/images/cytonn-investments.png" style="width=80px; height: 60px; float=right;">
                        </div>
                            @if (Auth::guest())

                        </div>
                        <div class="top-bar-right">
                            <ul class="menu dropdown">
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            </ul>
                            <div>
                            </div>
                            <div

                            @else
                                {{--if a user is authenticated--}}



                                <div class="top-bar">
                                    <div class="top-bar-left">
                                    </div>
                                    <div class="top-bar-right">
                                        <li class="menu align-right">

                                            <a href="#" class="menu" data-toggle="dropdown" role="button" aria-expanded="false">
                                                {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                            </a>
                                        </li>

                                        <ul class=" dropdown menu">

                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                        </li>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </div>
                    {{--Navigation bar ends here--}}

                    <div class="main-section">
                        <div class="side-navigation">
                            <ul class="menu vertical">
                                <li ><a href="/admin/categories"></i>Categories</a></li>
                                <li><a href="/admin/products">Products</a></li>
                                <li><a href="/admin/products/view">View Products</a></li>
                                <li><a href="/admin/inquiries">Client Enquiries</a></li>
                                <li><a href="/admin/analytics">Product Analytics</a></li>
                                <li><a href="/admin/reports">Products Perfomance</a></li>
                            </ul>
                        </div>
                        <div >
                            @yield('content')
                        </div>
                    </div>
            @include('layouts.partials.footer')
            <!-- Scripts -->
            </div>
                <script src="{{ asset('js/app.js') }}"></script>
                {{--<script> $(document).foundation();</script>--}}
                </body>
            </html>