<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <div class="container" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item px-2">
                    <a class="nav-link" aria-current="page" href="#">خانه</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="blog.html">بلاگ ها</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="#">درباره من</a>
                </li>
            </ul>
        </div>
        
        <div class="container">
            <div class="d-flex collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2">
                        <a class="nav-link" aria-current="page" href="{{ route('login') }}">ورود</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ route('register') }}">ثبت نام</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
