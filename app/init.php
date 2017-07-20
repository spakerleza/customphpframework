<?php
require "core/bootstrap.php";

require 'lib/helpers/general_function.php';
require 'lib/helpers/session.php';
require 'lib/helpers/httpcookie.php';

require "config/app_config.php";
//Load db
require "config/PDOquery/databaseQuery.php";

require 'lib/helpers/encrypt.php';
require 'lib/helpers/sanitizer.php';



require "core/controller.php";
require "core/model.php";
require "core/view.php";


require "lib/helpers/formValidator.php";
require "lib/helpers/emailHandler.php";
require "lib/helpers/ipHandler.php";
?>