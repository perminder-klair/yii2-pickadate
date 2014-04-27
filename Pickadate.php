<?php

namespace kato\pickadate;

use Yii;
use kato\pickadate\assets\PickadateAsset;
use yii\helpers\Html;

class Pickadate extends \yii\widgets\InputWidget
{
    public $language = 'en';
    public $initJs = null;
    public $isTime = false;

    public function init()
    {
        parent::init();

        if ($this->isTime === true) {
            $defaultClass = 'timepicker';
            $useMethod = 'pickatime';
        } else {
            $defaultClass = 'datepicker';
            $useMethod = 'pickadate';
        }

        if (is_null($this->initJs)) {
            $this->initJs = '$(".' . $defaultClass . '").' . $useMethod . '();';
        }

        Html::addCssClass($this->options, $defaultClass);

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
            $input = Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $input = Html::textInput($this->name, $this->value, $this->options);
        }

        return $input;
    }

    protected function registerAsset()
    {
        $view = $this->getView();
        PickadateAsset::register($view);

        $view->registerJs('jQuery(document).ready(function () {' . $this->initJs . '});');
    }
}
