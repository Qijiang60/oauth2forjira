<?php
namespace discaR\oauth2forjira;

class Module extends \yii\base\Module
{
    public $api;
    public $user;
    public $pwd;

    public function init()
    {
        parent::init();
    }

    public function signUp($username, $password, $email, $name)
    {
        $oauth2forjira = new oauth2forjira\oauth2forjira($this->api, $this->user, $this->pwd);
        return $oauth2forjira->signUp($username, $password, $email, $name);
    }
}