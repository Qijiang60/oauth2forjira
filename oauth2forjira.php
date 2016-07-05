<?php
$ch = curl_init();
$url = 'https://jira.atlassian.com/rest/api/2/users';
$url2 = 'http://jira.local.com/rest/api/2/user';
$url3 = 'http://gitlab.local.com/api/v3/users';
$postData = array('name'=>'mytest', 'password'=>'qwe123789', 'emailAddress'=>'mytest@qq.com',
    'displayName'=>'testz','applicationKey'=>'jira-core');
$postData2 = '{"name":"charlie2","password":"123123","emailAddress":"charlie2@test.com","displayName":"Charlie of Atlassian","applicationKeys":["jira-core"]}';
$postData2 = json_encode($postData2);
$postData3 = array('username'=>'mytest2', 'password'=>'qweqweqwe', 'email'=>'chuanhangyu@xmisp.com',
    'name'=>'testz');
$postData4 = '{"username":"mytest","password":"qweqweqwe","email":"charlie2@test.com","name":"Charlie"}';
$postData4 = json_encode($postData4);
curl_setopt($ch, CURLOPT_URL, $url3);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$postData3);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('PRIVATE-TOKEN:wyHczqs4m3Qmadxrx6it','SUDO:root'));
$data = curl_exec($ch);
curl_close($ch);
var_dump($data);

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