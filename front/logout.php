<?php
include_once '../inc/config_inc.php';

setcookie('know[name]','',time()-3600);//设置为过去的时间即可
setcookie('know[pw]','',time()-3600);
?>