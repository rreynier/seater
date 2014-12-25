<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/assets/vendor/bootstrap-3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/seat-selector.css">
        <title>Clutch Con 2015 Seat Reservation System</title>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        @yield('content')

        <script src="/assets/vendor/jquery-1.11.2/jquery.min.js"></script>
        <script src="/assets/vendor/bootstrap-3.3.1/js/bootstrap.min.js"></script>
        <script src="/assets/js/seat-selector.js"></script>
        <script>
        (function(){
            SeatSelector.bindClientEvents();
        })();
        </script>
    </body>
</html>
