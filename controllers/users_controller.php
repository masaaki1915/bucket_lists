<?php

    require('models/user.php');

    $controller = new UsersController($resource, $action);

    switch ($action) {
      case 'check';
        $controller->check();
        break;
      case 'follow';
        $controller->follow($option);
        break;
      case 'unfollow';
        $controller->unfollow($option);
        break;
      case `following`;
        $controller->following();
        break;
      case `follower`;
        $controller->follower();
        break;
      case 'mypage':
        $controller->mypage($option);
        break;
      default:
        break;
    }


    class UsersController{
      private $user;
      private $resource;
      private $action;
      private $viewOptions;

      function __construct($resource, $action){
        $this->user = new User();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewOptions = array();
      }

      function check(){
        $this->user->check();
      }
      function create(){
      }
      function thanks(){
      }
      function login(){
      }
      function logout(){
      }
      function mypage($option){
        require('views/users/mypage.php');
      }
      function edit(){
      }
      function update(){
      }
      function follow($option){
        specialEcho('users_controllerのfollow()が呼び出されました');
        $this->user->follow($option);
        // $this->displayProf();
        $referer = get_last_referer();
        $referer_resource = $referer[4];
        $referer_action = $referer[5];
        $referer_option = $referer[6];
        specialVarDump($referer);
        header('Location: /bucket_lists/'.$referer_resource.'/'.$referer_action.'/'.$referer_option);
      }
      function unfollow($option){
        specialEcho('users_controllerのunfollow()が呼び出されました');
        $this->user->unfollow($option);
        // $this->displayProf();
        $referer = get_last_referer();
        $referer_resource = $referer[4];
        $referer_action = $referer[5];
        $referer_option = $referer[6];
        specialVarDump($referer);
        header('Location: /bucket_lists/'.$referer_resource.'/'.$referer_action.'/'.$referer_option);
      }
      function followings(){
        $this->user->following();
      }
      function followers(){
        $this->user->followers();
      }
      function display(){
        require('views/layouts/application.php');
      }
      function displayProf(){
        require('views/layouts/application_prof.php');
      }
    }

?>