<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="bi bi-house-heart"></i></li>
        @if (request()->is('admin'))
            <!-- Breadcrumb for Dashboard -->
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        @elseif (request()->is('admin/profile') || request()->is('admin/profile/*'))
            <!-- Breadcrumb for Profile -->
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @if (request()->route()->named('profile.show'))
                <li class="breadcrumb-item active">Profile</li>
            @elseif (request()->route()->named('profile.create'))
                <li class="breadcrumb-item"><a href="{{ route('profile.show', 1) }}">Profile</a></li>
                <li class="breadcrumb-item active">Create Profile</li>
            @elseif (request()->route()->named('profile.edit'))
                <li class="breadcrumb-item"><a href="{{ route('profile.show', 1) }}">Profile</a></li>
                <li class="breadcrumb-item active">Edit Profile</li>
            @endif
        @endif
    </ol>
</nav>
