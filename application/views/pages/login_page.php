<?php include(APPPATH.'/views/templates/header.php'); ?>
  <div class="container" id="container-login">
    <form action="<?php echo base_url();?>logins/login" method="POST">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
          <img id="login-header-image" src= "<?php echo base_url()?>/images/ass_new_logo.png" height="50%" width="50%"/>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
         <h1 class="form-login-heading">Auto Swift System</h1>
        </div>
      </div>
      <div class="row custom-margin-bottom">
        <div class="col-md-4 col-md-offset-4">
          <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        </div>
      </div>
      <div class="row custom-margin-bottom">
        <div class="col-md-4 col-md-offset-4">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
      </div>
      <?php 
       if (isset($error_message)) {
        echo "<div class='row'>";
          echo "<div class='col-md-4 col-md-offset-4 text-center'>";
            echo "<div class='alert alert-danger'>";
              echo $error_message;
              echo validation_errors();
            echo "</div>";
          echo "</div>";
        echo "</div>"; 
        }
      ?>
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <button class="btn btn-lg btn-custom btn-block" type="submit">Login</button>
        </div>
      </div>
    </form>
  </div> 
<?php include(APPPATH.'/views/templates/footer.php'); ?>