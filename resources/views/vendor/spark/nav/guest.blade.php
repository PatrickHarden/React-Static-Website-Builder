<nav class="navbar navbar-dark navbar-expand-md navbar-spark">
    <div class="container">
        <!-- Branding Image -->
        @include('spark::nav.brand')

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-yellow" href="/login">{{__('Login')}}</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-green" href="/register">{{__('Build A Site')}}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>