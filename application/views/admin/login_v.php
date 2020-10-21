<!-- <div class="container" style="padding-top:50px;"> -->
<!-- <div class="container text-center">
  <div class="row justify-content-center text-center">
    <div class="col-lg-10">
      <div class="mb-5">

          <h3>
            <img style="max-height:50px" src="<?php echo base_url();?>assets/img/favicon.png">
              <b>Admin </b> Login <br>
          </h3>

        <div class="row panel col-sm-8 col-sm-offset-2">
          
          <div class="tab-content">
            <form id="" method="POST" action="<?php echo base_url().'Login/masuk' ?>">
              <div class="col-sm-10 col-sm-offset-1">
                  <div class="form-group">
                    <label>Email</label>
                      <input name="email" type="text" class="form-control" placeholder="Contoh: sehat@mail.com" required>
                  </div>
              </div>
              <div class="col-sm-10 col-sm-offset-1">
                  <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Masukan password Anda" required>
                  </div>
              </div>
              <div class="col-sm-5 col-sm-offset-1">
                <div class="form-group">
                  <button class="btn btn-warning btn-fill" type="submit">Masuk</button>
                </div>
              </div>
          </form>
        </div>
        </div>
  </div>
  </div>
  </div>
</div> -->
<div class="container">
<?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Masuk ke Portal Admin</h1>
            <div class="account-wall">
            <img class="profile-img" src="<?php echo base_url();?>assets/img/favicon.png">
                <form class="form-signin" method="POST" action="<?php echo base_url().'Login/masuk' ?>">
                  <div class="form-group">
                      <input name="email" type="text" class="form-control" placeholder="Contoh: sehat@mail.com" required autofocus>
                  </div>
                  <div class="form-group">
                      <input name="password" type="password" class="form-control" placeholder="Masukan password Anda" required>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
  .form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
</style>