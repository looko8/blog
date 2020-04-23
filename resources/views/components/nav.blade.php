<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">{{ $sections ?? '' ? "Blog by {$user->name}" : "Blogs" }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if($sections ?? '')
            <ul class="navbar-nav mr-auto">
                @if(count($sections) > 5)
                    @for ($i = 0; $i < 5; $i++)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('users.sections.articles.index', ['user' => Auth::id(), 'section' => $sections[$i]->id])}}">{{ $sections[$i]->title }}</a>
                        </li>
                    @endfor
                    <div class="dropdown mt-1">
                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @for($i = 5; $i < count($sections); $i++)
                                <a class="dropdown-item" href="{{route('users.sections.articles.index', ['user' => Auth::id(), 'section' => $sections[$i]->id])}}">{{ $sections[$i]->title }}</a>
                            @endfor
                        </div>
                    </div>
                @else
                    @foreach($sections as $section)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('users.sections.articles.index', ['user' => Auth::id(), 'section' => $section->id])}}">{{ $section->title }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
            @endif
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('home') }}">
                                {{ __('Home') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('sections.create') }}">
                                {{ __('Create section') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('articles.create') }}">
                                {{ __('Create article') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

