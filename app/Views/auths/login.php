<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="auth">
  <div class="auth__body">
    <form class="auth__form" autocomplete="off" action="<?= base_url("/")?>" method="post">
      <div class="auth__form_body">
        <h3 class="auth__form_title"> Login </h3>
        <hr>
        <div>
          <div class="form-group">
            <label class="text-uppercase small">Email</label>
            <input type="email" name="email" id = "email" class="form-control" placeholder="Enter email" value="<?= set_value('email') ?>">
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Password</label>
            <input type="password" name="password" id = "password" class="form-control" placeholder="Password" value="<?= set_value('password') ?>">
          </div>
          <!-- Error Validation -->
      <?php if(isset($validation)) :?>
        <div class="col-12">
          <div class="alert alert-danger" role="alert">
            <?= $validation->listErrors(); ?>
          </div>
        </div>
      <?php endif; ?>
        </div>
      </div>
      <div class="auth__form_actions">
        <button type="submit" class="btn btn-primary btn-lg btn-block">
          NEXT
        </button>
        <div class="mt-2">
          <a href="<?= base_url("register")?>" class="small text-uppercase">
            CREATE ACCOUNT
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>