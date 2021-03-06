              <!-- フォローされている人の一覧 -->
 <div class="container">

        <div class="container-fluid">
          <div class="row">
            <div class="content-main">
              <section class="col-sm-8 col-xs-offset-2 main-content">

                <div class="follow_follower_list">
                    <h4><i class="fa fa-user-circle" aria-hidden="true"></i>  follower</h4>


              <ul class="list-unstyled">

              <?php foreach($this->viewOptions as $follower): ?>
                <?php if($follower['user_id'] != $follower['follower_id']): ?>
                     <a href="<?php echo makePath('users/mypage/'); ?><?php echo $following['user_id']; ?>/">
                     <li class="follow_followers">
                            <img class="img-circle" src="<?php echo makePath('views/pf_image/'); ?><?php echo $follower['picture_path'] ;?>" width="50" height="50">
                            <span><?php echo $follower['nick_name']; ?></span>
                            <a href="<?php echo makePath('users/follow/'); ?><?php echo $follower['user_id']; ?>" class="btn btn-pink" style="float: right;">
                                フォロー</a>
                            </li>
                            </a>
                    <?php elseif($follower['user_id'] == $_SESSION['user_id']): ?>
                        <a href="<?php echo makePath('users/mypage/'); ?><?php echo $follower['user_id']; ?>/">
                        <li class="follow_followers">
                            <img class="img-circle" src="<?php echo makePath('views/pf_image/'); ?><?php echo $follower['picture_path'] ;?>" width="50" height="50">
                            <span><?php echo $follower['nick_name']; ?></span>
                        </li>
                        </a>
                    <?php else: ?>
                      <a href="<?php echo makePath('users/mypage/'); ?><?php echo $following['user_id']; ?>/">
                      <li class="follow_followers">
                          <img class="img-circle" src="<?php echo makePath('views/pf_image/'); ?><?php echo $follower['picture_path'] ;?>" width="50" height="50">
                          <span><?php echo $follower['nick_name']; ?></span>
                          <a href="<?php echo makePath('users/unfollow/'); ?><?php echo $follower['user_id'] ?>" class="btn btn-default" style="float: right;">
                              フォローを外す
                          </a>
                          </li>
                        </a>
                  <?php endif; ?>
              <?php endforeach; ?>
              </ul>
              </div>
            </section>
          </div>
        </div>
      </div>
  </div>