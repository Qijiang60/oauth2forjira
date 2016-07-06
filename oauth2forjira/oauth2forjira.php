<?php
namespace discaR\oauth2forjira\oauth2forjira;
class oauth2forjira
{
    private $api;
    private $user;
    private $pwd;

    public function __construct($api = 'http://jira.local.com/rest/api/2/user', $user = 'root', $pwd = 'testtest')
    {
        $this->api = $api;
        $this->user = $user;
        $this->pwd = $pwd;
    }

    public function signUp($username, $password, $email, $name)
    {
        $ch = curl_init();
//        $postData = array('name' => 'mytest', 'password' => 'qwe123789', 'emailAddress' => 'mytest@qq.com',
//            'displayName' => 'testz', 'applicationKey' => 'jira-core');
//        $postData3 = array('username' => $username, 'password' => $password, 'email' => $email,
//            'name' => $name);
        $postData2 = "{\"name\":\"$username\",\"password\":\"$password\",\"emailAddress\":\"$email\",\"displayName\":\"$name\",\"applicationKeys\":[\"jira-core\"]}";
        curl_setopt($ch, CURLOPT_URL, $this->api);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData2);
        curl_setopt($ch, CURLOPT_USERPWD, "$this->user:$this->pwd");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $data = curl_exec($ch);
        curl_close($ch);
        if (strpos($data, 'error')) {
//            echo 'success';
            return array('state' => 0,
                'msg' => '注册成功！'
            );
        } else {
//            echo 'error';
            return array(
                'msg' => '注册失败！'
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
