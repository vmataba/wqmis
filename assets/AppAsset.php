<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'template/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'template/bower_components/font-awesome/css/font-awesome.min.css',
        'template/bower_components/Ionicons/css/ionicons.min.css',
        'template/dist/css/AdminLTE.min.css',
        'template/dist/css/skins/_all-skins.min.css',
        'template/bower_components/morris.js/morris.css',
        'template/bower_components/jvectormap/jquery-jvectormap.css',
        'template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'template/bower_components/bootstrap-daterangepicker/daterangepicker.css',
        'template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    ];
    public $js = [
        'template/bower_components/jquery/dist/jquery.min.js',
        'template/bower_components/jquery-ui/jquery-ui.min.js',
        'template/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'template/bower_components/raphael/raphael.min.js',
        'template/bower_components/morris.js/morris.min.js',
        'template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'template/bower_components/jquery-knob/dist/jquery.knob.min.js',
        'template/bower_components/moment/min/moment.min.js',
        'template/bower_components/bootstrap-daterangepicker/daterangepicker.js',
        'template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'template/bower_components/fastclick/lib/fastclick.js',
        'template/dist/js/adminlte.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
