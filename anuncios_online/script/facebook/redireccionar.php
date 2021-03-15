<?php
require_once 'app/start.php';
 
header("Location: " . $helper->getLoginUrl($config['scopes']) );




?>