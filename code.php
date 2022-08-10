<?php
phpinfo();
$httphost = $_SERVER['HTTP_HOST'];
$phpself = $_SERVER['PHP_SELF'];

$actual_link = 'http://'.$httphost.$phpself;

echo 'HTTP_HOST: '.$httphost.'<br>PHP_SELF: '.$phpself.'<br>FULL URL: '.$actual_link;

if ($httphost == 'localhost'|| $httphost=='127.0.0.1'){

    echo "<p>Ambiente de desenvolvimento!</p>";

}elseif($httphost == 'deploy.rai.com.br'){

    echo "<p>Ambiente de testes!</p>";

}else{

    echo "<p>Ambiente de produção!</p>";

}