        <div class="container">

        <div class="container-fluid">
          <div class="row">
            <div class="content-main">
              <section class="col-sm-8 col-xs-offset-2 main-content">

                <div class="follow_follower_list">
                    <h4><i class="fa fa-user-circle" aria-hidden="true"></i>  follow</h4>


                <ul class="list-unstyled">

            <?php if(empty($this->viewOptions)): ?>
            <?php else : ?>
                <?php foreach($this->viewOptions as $following): ?>
                <?php if($following['count'] == false) :?>
                    <a href="<?php echo makePath('users/mypage/'); ?><?php echo $following['user_id']; ?>/">
                        <li class="follow_followers">
                            <img class="img-circle" src="<?php echo makePath('views/pf_image/'); ?><?php echo $following['picture_path'] ;?>" width="50" height="50">
                            <span><?php echo $following['nick_name']; ?></span>
                            <a href="<?php echo makePath('users/follow/'); ?><?php echo $following['user_id'] ?>" class="btn btn-default" style="float: right;">
                                フォローする</a>
                        </li>
                        </a>
                <?php elseif($following['user_id'] == $_SESSION['user_id']): ?>
                        <a href="<?php echo makePath('users/mypage/'); ?><?php echo $following['user_id']; ?>/">
                        <li class="follow_followers">
                            <img class="img-circle" src="<?php echo makePath('views/pf_image/'); ?><?php echo $following['picture_path'] ;?>" width="50" height="50">
                            <span><?php echo $following['nick_name']; ?></span>
                        </li>
                        </a>
                <?php elseif($following['count'] == true): ?>
                        <a href="<?php echo makePath('users/mypage/'); ?><?php echo $following['user_id']; ?>/">
                        <li class="follow_followers">
                            <img class="img-circle" src="<?php echo makePath('views/pf_image/'); ?><?php echo $following['picture_path'] ;?>" width="50" height="50">
                            <span><?php echo $following['nick_name']; ?></span>
                            <a href="<?php echo makePath('users/unfollow/'); ?><?php echo $following['user_id'] ?>" class="btn btn-default" style="float: right;">
                                フォローを外す</a>
                        </li>
                        </a>
                <?php endif; ?>
                <?php endforeach; ?>
            <?php endif ; ?>
                </ul>
                </div>
             </section>
            </div>
          </div>
        </div>
        </div>
