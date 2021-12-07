<?php
$pwd = "123456";
$hashpwd_pwd = hash('sha256',$pwd);
echo($hashpwd_pwd);