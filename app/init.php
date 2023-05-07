<?php
  // Load Config
  require_once 'config/config.php';
  require_once 'helpers/url_helper.php';
  require_once 'helpers/session_helper.php';
  require_once 'helpers/Email.php';
  require_once 'helpers/NIC_Validator.php';
<<<<<<< Updated upstream
=======
  require_once 'vendor/stripe-php-master/init.php'; 
>>>>>>> Stashed changes

  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });