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
        <li class="active"><a href="<?php echo base_url('dashadmin') ?>">Home</a></li>
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

    <div class="col-sm-11 listuser">
      <h3>Users</h3>
      <table class="table table-users">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">level</th>
            <th scope="col">Active</th>
            <th scope="col">Action</th>
          </tr>

        </thead>
    <?php

         foreach ($data->result()as $row):

        ?>
        <tbody>

          <tr>
            <th scope="row"><?php echo $row->id?></th>
            <td scope="row"><?php echo $row->username?></td>
            <td scope="row"><?php echo $row->level?></td>
            <td scope="row"><?php echo $row->active?></td>
            <td scope="row">
              <a href="<?php echo base_url(); ?>Admin/listUser/delete/<?php echo $row->id?>" role="button" class="btn btn-danger">Delete</a>
              <button class="btn btn-info edit_data" data-toogle="modal" data-target="#update" id="<?php echo $row->id?>" >Update</button>
              <th>
          </tr>
        </tbody>

<?php endforeach; ?>

      </table>
      <?php echo $pagination; ?>
    </div>








    </div>
    <div class="container-fluid col-sm-2 sidenav ">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>


  </div>
</div>

<div id="update" tabindex="-1" class="modal fade">

  <div class="modal-dialog modal-adduser">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">


                <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
              <!--<i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features! -->
              <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('admin/listUser/edituser'); ?>">

              <div class="form-group">
                <label class="control-label col-sm-4">ID Karyawan :</label>
                <div class="col-sm-8">
                <input class="form-control" placeholder="ID Karyawan" name="id" id="id" value="" ></input>
              </div>
              </div>

               <div class="form-group">
                 <label class="control-label col-sm-4">Username :</label>
                 <div class="col-sm-8">
                 <input class="form-control" placeholder="Username" name="username" id="username" ></input>
               </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-sm-4">Password :</label>
                 <div class="col-sm-8">
                 <input class="form-control" placeholder="Password" type="password" name="password" id="password" value=""></input>
               </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-sm-4">User type  :</label>
                 <div class="col-sm-8">
                   <div id="radiolevel">
                 <label class="radio-inline"><input type="radio" name="optlevel" value="admin" id="adminopt">Admin</label>
                 <label class="radio-inline"><input type="radio" name="optlevel" value="user" id="adminopt">User</label>
               </div>
               </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-sm-4">Active: </label>
                 <div class="col-sm-8">
                   <div id="radioactive">
                 <label class="radio-inline"><input type="radio" name="optactive" value="1" id="adminactive">Yes</label>
                 <label class="radio-inline"><input type="radio" name="optactive" value="0" id="adminactive">No</label>
               </div>
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



<script src="<?php echo base_url() ?>assets/bootstrap/js/jquery.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bootstrap/bootstrap.min.js"></script>

  <script>
$(document).on('click', '.edit_data', function(){
var id =$(this).attr("id");
var username=$("#username").val();
  $.ajax({
    url:"<?php echo base_url(); ?>admin/listUser/fetch_user",
    // dataType:'text',
    method:"POST",
    dataType:"json",
    data:{id:id},
    success:function(data){
      $("#id").val(data[0].id);
      $("#username").val(data[0].username);
      $("#password").val(data[0].password);
      $("#update").modal('show');

    }
  })

}

)
</script>
</body>
</html>
