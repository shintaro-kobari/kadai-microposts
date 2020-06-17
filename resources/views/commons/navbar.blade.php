<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">Microposts</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    {{-- ユーザ一覧ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.index', __('messages.users'), [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                {{-- ユーザ詳細ページへのリンク --}}
                                <li class="dropdown-item">{!! link_to_route('users.show', __('messages.profile'), ['user' => Auth::id()]) !!}</li>
                                <li class="dropdown-divider"></li>
                                {{-- ログアウトへのリンク --}}
                                <li class="dropdown-item">{!! link_to_route('logout.get', __('messages.logout')) !!}</li>
                            </ul>
                    </li>
                    <li class="nav-item dropdown" id="nav-lang">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                {{ Config::get('languages')[App::getLocale()] }}
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <li>
                                            <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                    </li>

                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', __('messages.sign_up'), [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', __('messages.log_in'), [], ['class' => 'nav-link']) !!}</li>
                    
                    <li class="nav-item dropdown" id="nav-lang">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                {{ Config::get('languages')[App::getLocale()] }}
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <li>
                                            <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>