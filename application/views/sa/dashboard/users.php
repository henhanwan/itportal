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
        <a class="navbar-brand" href="<?php echo base_url('dashsa') ?>">ITPORTAL</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url('dashsa') ?>">Home</a></li>
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

      <?php if ($this->session->flashdata('errors')) : ?>
        <div class="alert alert-danger">
          <?php echo $this->session->flashdata('errors'); ?>
        </div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php endif; ?>

    <div class="col-sm-3 menu-button">
      <h3><a href="#adduser" data-toggle="modal">Add User</a></h3>
    </div>
    <div class="col-sm-3 menu-button">
      <h3><a href="listUser">User List</a></h3>
    </div>








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

  <div id="adduser" class="modal fade">
  	<div class="modal-dialog modal-adduser">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h4 class="modal-title">Add User</h4>
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  			</div>
  			<div class="modal-body">


                  <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                <!--<i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features! -->
                <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('sadmin/user/addUser'); ?>">

                <div class="form-group">
                  <label class="control-label col-sm-4">ID Karyawan :</label>
                  <div class="col-sm-8">
                  <input class="form-control" placeholder="ID Karyawan" name="id"></input>
                </div>
                </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Username :</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="Username" name="username"></input>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Password :</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="Password" type="password" name="password"></input>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">User type  :</label>
                   <div class="col-sm-8">
                   <label class="radio-inline"><input type="radio" name="optlevel" value="superadmin">Superadmin</label>
                   <label class="radio-inline"><input type="radio" name="optlevel" value="admin">Admin</label>
                   <label class="radio-inline"><input type="radio" name="optlevel" value="user">User</label>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Active: </label>
                   <div class="col-sm-8">
                   <label class="radio-inline"><input type="radio" name="optactive" value="1">Yes</label>
                   <label class="radio-inline"><input type="radio" name="optactive" value="0">No</label>
                        </div>
                 </div>

                 <div class="form-group">
                   <div class="col-sm-4"></div>
                   <div class="col-sm-8">
                   <button type="submit" class="btn btn-default" value="submit">submit</button>
                 </div>
                 </div>

               </form>

  			</div>
  		</div>
  	</div>
  </div>

  <script src="<?php echo base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bootstrap/js/jquery.js"></script>
</body>
