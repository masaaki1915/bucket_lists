    <div class="container">

        <div class="container-fluid">
          <div class="row">
            <div class="content-main">
              <section class="col-sm-10 col-xs-offset-1 main-content">
                   
                  <!--doing一覧-->
                  <div class="do_list">
                    <h4><i class="fa fa-tags" aria-hidden="true"></i>  doingユーザー一覧</h4>
                  <?php foreach($this->viewOptions as $viewsOption): $user = aboutUser($viewsOption['user_id']); ?>
                      <div>
                        <a href="<?php echo makePath('users/mypage/'); ?><?php echo $user['user_id']; ?>/<?php echo getFirstListId($user['user_id']); ?>">
                          <img class="img-circle" src="<?php echo makePath('views/pf_image/'); ?><?php echo $user["picture_path"]; ?>" width="50" height="50">
                          <span><?php echo $user['nick_name']; ?></span>
                        </a>
                      </div>
                  <?php endforeach; ?>

                    </div>


            </section>
          </div>
          </div>
        </div>

    </div>

