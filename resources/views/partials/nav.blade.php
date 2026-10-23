<nav class="main-nav">
    @auth
        <div class="nav-menu">
            @foreach (config('menu', []) as $menu)
                @if (auth()->user()->can($menu['permission']) && auth()->user()->can('lihat-data'))
                    <a href="{{ route($menu['route']) }}">{{ $menu['label'] }}</a>
                @endif
            @endforeach
        </div>

        <div class="nav-user">
            <span>{{ auth()->user()->name }} ({{ auth()->user()->getRoleNames()->implode(', ') }})</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    @endauth
</nav>
