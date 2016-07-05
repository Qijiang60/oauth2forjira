<?php
namespace discaR\oauth2forjira;

class Module extends \yii\base\Module {
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }
}