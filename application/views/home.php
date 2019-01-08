<html>
<title>IT PORTAL PT. ABACA</title>
<head>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css"/>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css"/>
</head>
<body>
  <!-- navbar -->
  <nav class="navbar navbar-default topNavbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url() ?>">ITPORTAL</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php

        if(!$this->session->userdata('username'))

      {echo "#login";} if($this->session->userdata('username')) {echo "#";}  ?>" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span><?php

        if(!$this->session->userdata('username'))

      {echo "Login";} if($this->session->userdata('username')) {echo $this->session->userdata('username');}  ?></a></li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid text-center bg-3 menu">
  <div class="row">

    <div class="col-sm-9 text-left">
      <h1>Welcome</h1>
    <!-- <div class="col-sm-3 menu-button">
      <h3>test</h3>
    </div>
    <div class="col-sm-3 menu-button">
      <h3>test</h3>
    </div>
    <div class="col-sm-3 menu-button">
      <h3>test</h3>
    </div>
    <div class="col-sm-3 menu-button">
      <h3>test</h3>
    </div>
    <div class="col-sm-3 menu-button">
      <h3>test</h3>
    </div>
    <div class="col-sm-3 menu-button">
      <h3>test</h3>
    </div>
    <div class="col-sm-3 menu-button">
      <h3>test</h3>
    </div> -->


    </div>
    <div class="container-fluid col-sm-3 sidenav ">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>


  </div>



</div>

<div id="login" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Member Login</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url('auth/login')?>" method="post" role="login">
          <?php
  //menampilkan error menggunakan alert javascript
    if(isset($error)){
    echo '<script>
    alert("'.$error.'");
    </script>';
    }
  ?>
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="Login">
					</div>
				</form>
				<p class="hint-text"><a href="#">Forgot Password?</a></p>
			</div>
		</div>
	</div>
</div>



<script src="<?php echo base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/js/jquery.js"></script>
</body>

</html>
