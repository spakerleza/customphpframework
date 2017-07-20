<?php

class Home extends Controller {

    public function index($name) {
       $this->view->render("home/index.php");
    }

}
?>