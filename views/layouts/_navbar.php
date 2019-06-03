<?php

use yii\helpers\Url;
?>

<!-- Logo -->
<a href="<?= Yii::$app->homeUrl ?>" class="logo">

    <?php if ($showLogo): ?>
        <span class="logo-mini">
            <small style="font-size: 0.7em"><b>WQM</b>IS</small>
        </span>
        <span class="logo-lg">
            <!--img src="images/dawasa.png" class="img img-circle" style="width: 50px; height: 50px"-/-->
        </span>
    <?php endif; ?>

</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
            <li>
                <h3 style="font-size: 1.1em; color: #FFF"><?= Yii::$app->name ?></h3>
            </li>
        </ul>
    </div>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu" style="display: none">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-success">10</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                    page and may cause design problems
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <?php if (isset($userProfile)): ?>
                        <img src="<?= isset($userProfile) ? $userProfile->getProfilePicture() : '' ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= isset($userProfile) ? $userProfile->first_name : '' ?> <?= isset($userProfile) ? $userProfile->last_name : '' ?></span>
                    <?php endif; ?>


                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="<?= isset($userProfile) ? $userProfile->getProfilePicture() : '' ?>" class="img-circle" alt="User Image">

                        <p>
                            <?= isset($userProfile) ? $userProfile->first_name : '' ?> <?= isset($userProfile) ? $userProfile->last_name : '' ?>
                            <small><?= isset($user) ? $user->getUserType()->user_type_description : '' ?></small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body" hidden>
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="<?= Url::to(['user/view', 'id' => Yii::$app->user->id]) ?>" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="<?= Url::to(['site/logout']) ?>" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>

        </ul>
    </div>

</nav>