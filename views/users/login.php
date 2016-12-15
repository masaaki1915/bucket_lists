<div class="msg" style="margin-top: 75px;">
  <form method="post" action="<?php echo makePath('users/auth'); ?>" class="form-horizontal" role="form">
    <div class="form-group">
      <label for="email" class="col-md-3 control-label">メールアドレス</label>
      <div class="col-md-9">
        <input type="text" class="form-control" name="email">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-md-3 control-label">パスワード</label>
      <div class="col-md-9">
        <input type="password" class="form-control" name="password">
      </div>
    </div>
    <div class="form-group pull-right">
      <p>
        <a href="<?php echo makePath('users/home'); ?>" class="btn btn-default">ユーザー登録画面へ</a>&nbsp;&nbsp;
        <input type="submit" class="btn btn-success" value="ログイン">
      </p>
    </div>
  </form>
</div>