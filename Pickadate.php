<?php

namespace kato\pickadate;

use Yii;
use kato\pickadate\assets\PickadateAsset;
use yii\helpers\Html;

class Pickadate extends \yii\widgets\InputWidget
{
    public $language = 'en';

    public function init()
    {
        parent::init();

        Yii::setAlias('@pickadate', dirname(__FILE__));
        $this->registerAsset();

        echo $this->renderInput();
    }

    /**
     * Render the text area input
     */
    protected function renderInput()
    {
        if ($this->hasModel()) {
            $input = Html::activeTextArea($this->model, $this->attribute, $this->options);
        } else {
            $input = Html::textArea($this->name, $this->value, $this->options);
        }

        return $input;
    }

    protected function registerAsset()
    {
        $view = $this->getView();
        PickadateAsset::register($view);

//        $view->registerJs('$(function(){' . $this->initJs . '});');
    }
}
