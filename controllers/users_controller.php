<?php

    require('models/user.php');

    $controller = new UsersController($resource, $action);

    switch ($action) {
      case 'home';
        $controller->home($post);
        break;

      case 'pre_create';
        $controller->pre_create($post);
        break;

      case 'pre_thanks';
        $controller->pre_thanks();
        break;

      case 'signup';
        $controller->signup($post,$option);
        break;

      case 'check':
        $controller->check();
        break;

      case 'create';
        $controller->create($post);
        break;

      case 'thanks';
        $controller->thanks();
        break;

      case 'login':
          $controller->login($post);
        break;

      case 'logout';
        $controller->logout();
        break;

      case 'mypage';
        $controller->mypage();
        break;

      case 'edit';
        $controller->edit();
        break;

      case 'update';
        $controller->update();
        break;

      case 'follow';
        $controller->follow();
        break;

      case 'unfollow';
        $controller->unfollow();
        break;

      case 'followings';
        $controller->followings();
        break;

      case 'followers';
        $controller->followers();
        break;

      default:
        break;
    }

    class UsersController {
      private $user;
      private $resource;
      private $action;
      private $viewOptions;
      private $viewErrors;

      function __construct($resource, $action) {
        $this->user = new User();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewOptions = array('nick_name' => '', 'email' => '', 'password' => '',);
        }

      function home($post) {
        if (!empty($post)) {
          $error = $this->user->home_valid($post);
            if (!empty($error)) {
              $this->viewOptions = $post;
              $this->viewErrors = $error;
              $this->display();
          } else {
              $_SESSION['users'] = $post;
              header('Location: pre_create');
              exit();
                }
        } else {
           if ($option == 'rewrite') {
            $this->viewOptions = $_SESSION['users'];
              }

            $this->display();
        }
      }

      function pre_create($post) {
        $this->action = 'pre_create';

        $email = isset($post['email']) ? $post['email'] : NULL;
        $url_token = hash('sha256',uniqid(rand(),1));
        $url = "http://bucket-list.sakura.ne.jp/bucket_lists/users/signup"."?url_token=".$url_token;

        $_SESSION['url_token'] = $url_token;
        $this->user->pre_create($post);

        $emailTo = $email;
        $returnMail = 'bucket-lists@bucket-list.sakura.ne.jp';
        $nick_name = 'Bucket Lists.inc';
        $subject = '[Bucket Lists]新規アカウント登録用URLのお知らせ';

$body = <<< EOM
仮登録が完了しました!
24時間以内に下記のURLからご登録いただきますと、本登録となります。
本登録が完了しましたら、本サービスの利用を開始することができますので、
お手数ですが、引き続き登録作業よろしくお願い致します。
{$url}
EOM;

        mb_language('ja');
        mb_internal_encoding('utf8');

        $header = "MIME-Version: 1.0\n";
        $header .= "Content-Transfer-Encoding: 7bit\n";
        $header .= "Content-Type: text/plain; charset=ISO-2022-JP\n";
        $header .= "Message-Id: <" . md5(uniqid(microtime())) . "@gmail.com>\n";
        $header .= "Reply-To: bucket-lists@bucket-list.sakura.ne.jp\n";
        $header .= "Return-Path: bucket-lists@bucket-list.sakura.ne.jp\n";
        $header .= "X-Mailer: PHP/". phpversion();
        $header .= 'From: bucket-lists@bucket-list.sakura.ne.jp';

        if(mb_send_mail($emailTo, $subject, $body, $header, '-f' . $returnMail)) {

        $_SESSION = array();

        if (isset($_COOKIE["PHPSESSID"])) {
            setcookie("PHPSESSID", '', time() - 1800, '/');
        }
        session_destroy();
        header('Location: pre_thanks');
        exit();
        }
          $this->display();

        }

      function pre_thanks() {
        $this->action = 'pre_thanks';
        $this->display();
      }

      function signup($post, $option) {
        $this->action = 'signup';
        $this->viewOptions = $this->user->signup_valid($post);

        if (!empty($post)) {
            $error = $this->user->signup_valid($post);
            if (!empty($error)) {
              $this->viewOptions = $post;
              $this->viewErrors = $error;
              $this->display();
          } else {
              $_SESSION['users'] = $post;
              header('Location: check');
              exit();
            }
        } else {
            if ($option == 'rewrite') {
                $this->viewOptions = $_SESSION['users'];
            }
            if (!empty($_GET)) {
               $url_token = $_GET['url_token'];
            }
              $this->display();
            }
      }

      function check() {
        $this->viewOptions = $_SESSION['users'];
        $this->action = 'check';
        $this->display();

      }

      function create($post) {
        $this->user->create($post);
        header('Location: thanks');
        exit();
      }

      function thanks(){
        $this->action = 'thanks';
        $this->display();
        header('Location: login');
        exit();
      }

      function login($post){
        special_echo('Controllerのlogin()が呼び出されました。');
        $login_flag = $this->user->login($post);
        if($login_flag){
          header('location: ');
          exit();
        } else {
          header('location: ');
          exit();
        }
      }

      function logout(){
        special_echo('Controllerのlogout()が呼び出されました。');
        $_SESSION = array();

        if(ini_get("session.use_cookeis")){
          $params = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header('location:');
        exit();

      }

      function mypage(){
        special_echo('Controllerのmypage()が呼び出されました。');
      }
      function edit(){
        special_echo('Controllerのedit()が呼び出されました。');
      }
      function update(){
        special_echo('Controllerのupdate()が呼び出されました。');
      }

      function follow($option){
        special_echo('Controllerのfollow()が呼び出されました。');
        $this->action = 'follow';
        $this->display();
        $this->displayProf();
        header('Location: ../index');
      }

      function unfollow($option){
        special_echo('Controllerのunfollow()が呼び出されました。');
        $this->action = 'unfollow';
        $this->display();
        $this->displayProf();
        header('Location: ../index');
      }

      function followings(){
        special_echo('Controllerのfollowings()が呼び出されました。');
      }
      function followers(){
        special_echo('Controllerのfpllowers()が呼び出されました。');
      }
      function display(){
        require('views/layouts/application.php');
      }
      function displayProf(){
        require('views/layouts/application_prof.php');
      }
    }

?>