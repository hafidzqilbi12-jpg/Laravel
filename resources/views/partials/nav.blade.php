<nav class="main-nav">
    <div>
        <strong>Laravel Jadwal Kuliah</strong>
    </div>

    @auth
    <span class="user-info">
        {{ auth()->user()->name }}
        ({{ auth()->user()->getRoleNames()->implode(', ') }})
    </span>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @endauth
</nav>