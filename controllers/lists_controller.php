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
        break;
    }

    class ListsController{
      private $list;
      private $resource;
      private $action;
      private $viewsOptions;

      function __construct($resource, $action){
        $this->list = new Lists();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewOptions = array();
      }

      function create($post){
        isLogin();
        $this->list->create($post);
        header('Location: /bucket_lists/users/mypage/'.$_SESSION['id']);
      }
      function update($post){
        isLogin();
        $this->list->update($post);
        header('Location: /bucket_lists/users/mypage/'.$_SESSION['id']);
      }
    }

?>
