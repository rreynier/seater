<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seater Admin</title>
        <link href="/assets/vendor/bootstrap-3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/vendor/bootstrap-table-1.5.0/bootstrap-table.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed"
                        data-toggle="collapse"
                        data-target="#navbar"
                        aria-expanded="false"
                        aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Seater Admin</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="{{ set_active('admin/seats') }}"><a href="/admin/seats">Seats</a></li>
                        <li class="{{ set_active('admin/codes') }}"><a href="/admin/codes">Codes</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            @yield('content')
        </div>

        <script src="/assets/vendor/jquery-1.11.2/jquery.min.js"></script>
        <script src="/assets/vendor/bootstrap-3.3.1/js/bootstrap.min.js"></script>
        <script src="/assets/vendor/bootstrap-table-1.5.0/bootstrap-table.min.js"></script>
        <!-- <script src="/assets/vendor/bootstrap-table-1.5.0/bootstrap-table-export.js"></script> -->
        <script src="/assets/admin/js/master.js"></script>
    </body>
</html>