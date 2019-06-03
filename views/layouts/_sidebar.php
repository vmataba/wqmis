<?php

use yii\helpers\Url;
use kartik\sidenav\SideNav;
use app\models\UserType;
?>
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?= $userProfile->getProfilePicture() ?>" class="img img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?= $userProfile->first_name ?> <?= $userProfile->last_name ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> <?= $user->getUserType()->user_type_description ?></a>
        </div>
    </div>

    <div class="sidenav">
        <?=
        SideNav::widget([
            'type' => SideNav::TYPE_INFO,
            'heading' => 'Main Navigation',
            'items' => [
                [
                    'label' => 'Dashboard',
                    'url' => ['site/index'],
                    'icon' => 'dashboard'
                ],
                [
                    'label' => 'My Profile',
                    'url' => ['user/view', 'id' => Yii::$app->user->id],
                    'icon' => 'user'
                ],
                [
                    'label' => 'Users',
                    'url' => ['user/index'],
                    'icon' => 'user',
                    'visible' => $user->getUserType()->user_type_code === UserType::TYPE_ADMIN
                ],
                [
                    'label' => 'Vending Machines',
                    'url' => ['vending-machine/index'],
                    'icon' => 'filter',
                    'visible' => $user->getUserType()->user_type_code === UserType::TYPE_ADMIN
                ],
                [
                    'label' => 'Vendors',
                    'url' => ['vendor/index'],
                    'icon' => 'user',
                    'visible' => $user->getUserType()->user_type_code === UserType::TYPE_ADMIN
                ],
                [
                    'label' => 'Reports',
                    'url' => ['report/index'],
                    'icon' => 'file'
                ],
                [
                    'label' => 'Configurations',
                    'url' => '#',
                    'icon' => 'cog',
                    'visible' => $user->getUserType()->user_type_code === UserType::TYPE_ADMIN,
                    'items' => [
                        [
                            'label' => 'Regions',
                            'url' => ['region/index'],
                        ],
                        [
                            'label' => 'Districts',
                            'url' => ['district/index'],
                        ],
                        [
                            'label' => 'Id Types',
                            'url' => ['id-type/index'],
                        ],
                        [
                            'label' => 'User Types',
                            'url' => ['user-type/index'],
                        ],
                    ]
                ],
                [
                    'label' => 'Logout',
                    'url' => ['site/logout'],
                    'icon' => 'arrow-left'
                ]
            ]
        ])
        ?>
    </div>


    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <!--        <li class="header">MAIN NAVIGATION</li>-->
        <li class="active treeview">
<!--            <a href="<?php //Url::to(['/site/index'])          ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>-->
            <!--            <a href="#">
                            <i class="fa fa-gear"></i> <span>Configurations</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>-->
            <!--            <ul class="treeview-menu">
                            <li><a href="<?php //Url::to(['/region/index'])         ?>"><i class="fa fa-map-marker"></i>Regions</a></li>
                            <li><a href="<?php //Url::to(['/district/index'])         ?>"><i class="fa fa-circle-o"></i>Districts</a></li>
                            <li><a href="<?php //Url::to(['/id-type/index'])         ?>"><i class="fa fa-circle-o"></i>Id Types</a></li>
                            <li><a href="<?php //Url::to(['/user-type/index'])         ?>"><i class="fa fa-circle-o"></i>User Types</a></li>
                        </ul>-->
        </li>
    </ul>
</section>
<!-- /.sidebar -->