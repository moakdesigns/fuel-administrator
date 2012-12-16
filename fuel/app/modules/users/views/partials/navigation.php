<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            
            <div class="nav-collapse">
                <ul class="nav">

                    <?php echo \DbMenu::build('admin'); ?>

                </ul>
                <ul class="nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Control Panel <b class="caret"></b></a>
                    <?php if($current_user == "Guest"): ?>
                    <ul class="dropdown-menu">
                    <li><a href="<?php echo Uri::create('login'); ?>">Login</a></li>
                    <li><a href="<?php echo Uri::create('register'); ?>">Register</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo Uri::create('users/forgot'); ?>">Forgot my Password</a></li>
                    </ul>
                    <?php else: ?>
                    <ul class="dropdown-menu">
                    <li><a href="<?php echo Uri::create('logout'); ?>">Logout</a></li>
                    <li><a href="<?php echo Uri::create('users/myprofile'); ?>">My profile</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo Uri::create('admin'); ?>">Admin Panel</a></li>
                    </ul>
                    <?php endif; ?>
                </li>
                </ul>
            </div>
        </div>
    </div>
</div>