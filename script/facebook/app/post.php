<?php

session_start();

require 'config/facebook.php';
require 'vendor/autoload.php';

use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;

if($_SESSION['facebook']) {

  try {

    $response = (new FacebookRequest(
      $session, 'POST', '/me/feed', array(
        'link' => 'http://marketplaceonline.esy.es',
        'message' => 'User provided message'
      )
    ))->execute()->getGraphObject();

    echo "Posted with id: " . $response->getProperty('id');

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }   

}

?>