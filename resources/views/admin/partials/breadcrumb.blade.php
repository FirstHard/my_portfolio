<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><i class="bi bi-house-heart"></i></li>
        @if (request()->is('admin'))
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        @elseif (request()->is('admin/profile') || request()->is('admin/profile/*'))
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
        @elseif (request()->is('admin/about') || request()->is('admin/about/*'))
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @if (request()->route()->named('about.show'))
                <li class="breadcrumb-item active">About Me</li>
            @elseif (request()->route()->named('about.create'))
                <li class="breadcrumb-item"><a href="{{ route('about.show', 1) }}">About Me</a></li>
                <li class="breadcrumb-item active">Create About Me</li>
            @elseif (request()->route()->named('about.edit'))
                <li class="breadcrumb-item"><a href="{{ route('about.show', 1) }}">About Me</a></li>
                <li class="breadcrumb-item active">Edit About Me</li>
            @endif
        @elseif (request()->is('admin/skills-technology') || request()->is('admin/skills-technology/*'))
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @if (request()->route()->named('skills-technology.index'))
                <li class="breadcrumb-item active">Skills & Technology</li>
            @elseif (request()->route()->named('skills-technology.create'))
                <li class="breadcrumb-item"><a href="{{ route('skills-technology.show', 1) }}">Skills & Technology</a></li>
                <li class="breadcrumb-item active">Create Skills & Technology Record</li>
            @elseif (request()->route()->named('skills-technology.edit'))
                <li class="breadcrumb-item"><a href="{{ route('skills-technology.show', 1) }}">Skills & Technology</a></li>
                <li class="breadcrumb-item active">Edit: "{{ $skillsTechnology->title }}"</li>
            @endif
        @elseif (request()->is('admin/experience') || request()->is('admin/experience/*'))
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @if (request()->route()->named('experience.index'))
                <li class="breadcrumb-item active">Experience</li>
            @elseif (request()->route()->named('experience.create'))
                <li class="breadcrumb-item"><a href="{{ route('experience.index', 1) }}">Experience</a></li>
                <li class="breadcrumb-item active">Create Experience Record</li>
            @elseif (request()->route()->named('experience.edit'))
                <li class="breadcrumb-item"><a href="{{ route('experience.index', 1) }}">Experience</a></li>
                <li class="breadcrumb-item active">Edit : "{{ $experience->title }}"</li>
            @endif
        @elseif (request()->is('admin/projects') || request()->is('admin/projects/*'))
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @if (request()->route()->named('projects.index'))
                <li class="breadcrumb-item active">Projects</li>
            @elseif (request()->route()->named('projects.create'))
                <li class="breadcrumb-item"><a href="{{ route('projects.index', 1) }}">Projects</a></li>
                <li class="breadcrumb-item active">Create Project</li>
            @elseif (request()->route()->named('projects.edit'))
                <li class="breadcrumb-item"><a href="{{ route('projects.index', 1) }}">Projects</a></li>
                <li class="breadcrumb-item active">Edit : "{{ $project->title }}"</li>
            @endif
        @elseif (request()->is('admin/tags') || request()->is('admin/tags/*'))
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @if (request()->route()->named('tags.index'))
                <li class="breadcrumb-item active">Tags</li>
            @elseif (request()->route()->named('tags.create'))
                <li class="breadcrumb-item"><a href="{{ route('tags.index', 1) }}">Tags</a></li>
                <li class="breadcrumb-item active">Create Tag</li>
            @elseif (request()->route()->named('tags.edit'))
                <li class="breadcrumb-item"><a href="{{ route('tags.index', 1) }}">Tags</a></li>
                <li class="breadcrumb-item active">Edit : "{{ $tag->title }}"</li>
            @endif
        @endif
    </ol>
</nav>
