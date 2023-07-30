<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="bi bi-house-heart"></i></li>
        @if (request()->is('admin'))
            <!-- Breadcrumb for Dashboard -->
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        @elseif (request()->is('admin/profile*'))
            <!-- Breadcrumb for Profile -->
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
        @elseif (request()->is('admin/profile/create'))
            <!-- Breadcrumb for Create Profile -->
            <li class="breadcrumb-item"><a href="{{ route('profile.show') }}">Profile</a></li>
            <li class="breadcrumb-item active">Create</li>
        @elseif (request()->is('admin/profile/edit'))
            <!-- Breadcrumb for Edit Profile -->
            <li class="breadcrumb-item"><a href="{{ route('profile.show') }}">Profile</a></li>
            <li class="breadcrumb-item active">Edit</li>
        @endif
    </ol>
</nav>
