<?php

    require('models/list.php');

    $controller = new ListsController($resource, $action);

    switch ($action) {
      case 'create':
        $controller->create($post);
        break;
      case 'update':
        $controller->update($post);
        break;
      default:
        echo own_header('users/home');
        break;
    }

    class ListsController{
      private $list;
      private $resource;
      private $action;
      private $viewOptions;

      function __construct($resource, $action){
        $this->list = new Lists();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewOptions = array();
      }

      function create($post){
        isLogin();
        $this->list->create($post);
        echo own_header('users/mypage/'.$_SESSION['user_id']);
      }
      function update($post){
        isLogin();
        $this->list->update($post);
        echo own_header('users/mypage/'.$_SESSION['user_id']);
      }
    }

?>
