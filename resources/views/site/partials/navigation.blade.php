<nav id="main-nav" class="navbar navbar-expand-lg sticky-top navbar-light">
    <div class="container">
        <a class="navbar-brand scrollto" href="#app">
            <div class="logo">
                <img src="{{ asset('storage/photos/' . $profile->photo) }}" class="img-fluid">
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav justify-content-center w-100 navbar-nav">
                <li class="visually-hidden-focusable">
                    <a href="#app" class="nav-link">Home <span class="visually-hidden-focusable">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link scrollto">About</a>
                </li>
                <li class="nav-item">
                    <a href="#skills" class="nav-link scrollto">Skills</a>
                </li>
                <li class="nav-item">
                    <a href="#experience" class="nav-link scrollto">Experience</a>
                </li>
                <li class="nav-item">
                    <a href="#portfolio" class="nav-link scrollto">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link scrollto">Contact</a>
                </li>
            </ul>
            <a href="#contact" class="btn btn-success rounded-0 scrollto">
                Contact
            </a>
        </div>
    </div>
</nav>
