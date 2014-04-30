<?php

namespace kato\pickadate;

use Yii;
use kato\pickadate\assets\PickadateAsset;
use yii\helpers\Html;
use yii\helpers\Json;

class Pickadate extends \yii\widgets\InputWidget
{
    /**
     * @var array HTML attributes for the input group container
     */
    public $containerOptions = [];

    public $language = 'en';
    public $initJs = null;
    public $isTime = false;

    public $pickadateOptions = [];

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
            $options = Json::encode($this->pickadateOptions);
            $this->initJs = '$(".' . $defaultClass . '").' . $useMethod . '(' . $options . ');';
        }

        Html::addCssClass($this->options, $defaultClass);

        Yii::setAlias('@pickadate', dirname(__FILE__));
        $this->registerAsset();

        echo Html::tag('div', $this->renderInput(), $this->containerOptions);
    }

    /**
     * Render the text area input
     */
    protected function renderInput()
    {
        Html::addCssClass($this->options, 'form-control');

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

        $view->registerJs('$(function(){' . $this->initJs . '});');
    }
}
