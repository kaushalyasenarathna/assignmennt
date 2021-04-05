<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }
    </style>
</head>
<div class="header">
    <a href="/" class="logo">Dashboard</a><span class="navbar-toggler-icon">
        <button type="button" id="sidebarCollapse" class="btn btn-info"> <i class="fa fa-align-justify"></i>
        </button> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> </button></span></a>
    <div class="header-right">
        <button type="button" class="btn btn-primary rounded-pill" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            {{ Auth::user()->name }}
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          
        </div>
    </div>
</div>