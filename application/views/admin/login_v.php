<div class="container" style="padding-top:50px;">
  <div class="row panel col-sm-8 col-sm-offset-2">
    <h3>
        <b>Admin Ask_Me </b> Login <br>
    </h3>
    <?php if($this->session->flashdata('msg')): ?>
        <p><?php echo $this->session->flashdata('msg'); ?></p>
    <?php endif; ?>
    <div class="tab-content">
      <form id="" method="POST" action="<?php echo base_url().'index.php/Login/masuk' ?>">
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