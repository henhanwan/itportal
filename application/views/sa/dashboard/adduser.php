<html>
<title>IT PORTAL PT. ABACA</title>
<head>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css"/>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css"/>
</head>
<body>
  <nav class="navbar navbar-default topNavbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url('dashadmin') ?>">ITPORTAL</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url() ?>">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Reset Password</a></li>
        <li><a href="../Auth/logout">Logout</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#login" data-toggle="modal"><span class="username glyphicon glyphicon-user"></span><?php echo $this->session->userdata('username'); ?></a></li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid text-center bg-3 menu">
  <div class="row">

    <div class="col-sm-9 text-left">
      <h1>Welcome <?php echo $this->session->userdata('username'); ?></h1>


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



</body>
