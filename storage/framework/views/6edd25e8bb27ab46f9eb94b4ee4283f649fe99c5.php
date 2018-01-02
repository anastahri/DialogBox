<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?> - <?php echo $__env->yieldContent('title'); ?></title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/styles.css" rel="stylesheet">
        <link href="font-awesome.min.css" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo e(url('/admin')); ?>">Dashboard <span class="sr-only">(current)</span></a></li>
                        <li><a href="/messages">Conversations <?php echo $__env->make('messenger.unread-count', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></a></li>
                        <li><a href="/messages/create">New Message</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                    <img class="avatar_nav_dropdown" src="<?php echo e(url('/images/avatars')); ?>/<?php echo e(Auth::user()->avatar); ?>">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(url('/profile')); ?>/<?php echo e(Auth::user()->username); ?>"><i class="fa fa-btn fa-user"></i> Your profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i> Logout</a>
                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?></form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        
        <?php echo $__env->make('alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>

        <hr/>

        <div class="container">
            &copy; <?php echo e(date('Y')); ?>. DialogBox.
            <br/>
        </div>

        <!-- Scripts -->
        <script src="/js/app.js"></script>

        <script type="text/javascript">
            $(function () {
                // Navigation active
                $('ul.navbar-nav a[href="<?php echo e("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>"]').closest('li').addClass('active');
            });
        </script>

        <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html>
