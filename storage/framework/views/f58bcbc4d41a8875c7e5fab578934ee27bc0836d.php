<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Main page</title>

        <!-- Fonts -->
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .jumbotron {
                border-radius: 20px;
                background-color: rgba(255,255,255,0.7);
                padding-top: 100px;
                padding-bottom: 100px;
            }
            h1 {
                color: rgba(0, 0, 0, 0.72) !important;
            }
            .jumbotron .container p a.btn {
                margin-top: 20px;
            }
            #promo {
                text-align: center;
                background: url(<?php echo e(asset('img/bg.jpg')); ?>) no-repeat;
                background-size: cover;
            }
            .hello {
                margin-right: 50px;
            }
            .hello a {
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(Auth::check()): ?>
                        <span class="hello">Hello, <a href="<?php echo e(url('/home')); ?>"><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></a></span>
                    <?php else: ?>
                        <a href="<?php echo e(url('/login')); ?>">Login</a>
                        <a href="<?php echo e(url('/register')); ?>">Register</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div id="promo">
                <div class="jumbotron">
                    <div class="container">
                        <h1>Best Car Hire Deals</h1>
                        <p><a class="btn btn-success btn-md" href="<?php echo e(route('cars.index')); ?>" role="button">Check car list &raquo;</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
