<?php
namespace discaR\oauth2forjira\oauth2forjira;
class oauth2forjira
{
    private $api;
    private $user;
    private $pwd;
    public function __construct($api = 'http://gitlab.local.com/api/v3/users', $user = 'root', $pwd = 'root')
    {
        $this->api = $api;
        $this->user = $user;
        $this->pwd = $pwd;
    }

    public function signUp($username, $password, $email, $name)
    {
        $ch = curl_init();
        $postData = array('name' => 'mytest', 'password' => 'qwe123789', 'emailAddress' => 'mytest@qq.com',
            'displayName' => 'testz', 'applicationKey' => 'jira-core');
        $postData3 = array('username' => $username, 'password' => $password, 'email' => $email,
            'name' => $name);
        curl_setopt($ch, CURLOPT_URL, $this->api);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData3);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('PRIVATE-TOKEN:wyHczqs4m3Qmadxrx6it', 'SUDO:root'));
        $data = curl_exec($ch);
        curl_close($ch);
        if (strpos($data, 'id')) {
            echo 'success';
            return array('state' => 0,
                'msg' => '注册成功！'
            );
        } else if (strpos($data, 'Email has already been taken')) {
            echo '该邮箱已被注册！';
            return array(
                'state' => 1,
                'msg' => '该邮箱已被注册！'
            );
        } else if (strpos($data, 'Username has already been taken')) {
            echo '该用户名已被注册！';
            return array(
                'state' => 2,
                'msg' => '该用户名已被注册！'
            );
        }


        //$postdata = http_build_query(array('username'=>'mytest', 'password'=>'qwe123789', 'email'=>'mytest@qq.com','name'=>'testz'));
        //$options = array(
        //    'http' => array(
        //        'method' => 'POST',
        //        'header' => 'Content-type:application/x-www-form-urlencoded',
        //        'content' => $postdata,
        //        'timeout' => 15 * 60
        //    )
        //);
        //$context = stream_context_create($options);
        //$result = file_get_contents('http://gitlab.local.com/users', false, $context);
        //var_dump($result);
    }
}
