<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Main</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ !Route::is('posts*') ?: 'active' }}" href="{{ route('posts.index') }}">All
                        Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ !Route::is('user.postsIndex') ?: 'active' }}"
                       href="{{ route('user.postsIndex') }}">My Posts</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link text-danger">{{ Auth::user()->login }}</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="{{ route('user.logout') }}">LogOut</a>
                </li>
                @can("active")
                    <li class="nav-item">
                        <a class="nav-link text-success" href="{{ route('posts.create') }}">Create New Post</a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
