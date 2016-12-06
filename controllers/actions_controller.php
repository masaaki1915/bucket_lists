<?php

    require('models/action.php');
    require('models/user.php');

    $controller = new ActionsController($resource, $action);

    switch ($action) {
      case 'index':
        $controller->index();
        break;
      default:
        break;
    }

    class ActionsController{
      private $timeline;
      private $resource;
      private $action;
      private $viewsOptions;

      function __construct($resource, $action){
        $this->timeline = new Action();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewsOptions = array();
      }
      function index(){
        $this->timeline->index();
      }
      function display(){
        require('views/layouts/application.php');
      }
    }

?>