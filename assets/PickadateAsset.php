<?php

namespace kato\pickadate\assets;

use Yii;
use yii\web\AssetBundle;

class PickadateAsset extends AssetBundle
{
    public $sourcePath = '@pickadate/vendors';

    public $css = [
        'pickadate/lib/compressed/themes/default.css',
        'pickadate/lib/compressed/themes/default.date.css',
        'pickadate/lib/compressed/themes/default.time.css',
    ];

    public $js = [
        'pickadate/lib/compressed/picker.js',
        'pickadate/lib/compressed/picker.date.js',
        'pickadate/lib/compressed/picker.time.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset'
    ];

    public $publishOptions = [
        'forceCopy' => true
    ];
}
