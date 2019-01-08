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

    <div class="col-sm-10 text-left">
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
      <h3>Inventory</h3>
      <table class="table table-inventory">
        <thead>
          <tr>
            <th scope="col">Asset Code</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Status</th>
            <th scope="col">Asset</th>
            <th scope="col">Cabang</th>
            <th scope="col">Divisi</th>
            <th scope="col">Tanggal Pembelian</th>
            <th scope="col">Kategori</th>
            <th scope="col">Action</th>
          </tr>

        </thead>
    <?php

         foreach ($data->result()as $row):

        ?>
        <tbody>

          <tr>
            <th scope="row"><?php echo $row->id_barang?></th>
            <td scope="row"><?php echo $row->nama_barang?></td>
            <td scope="row"><?php echo $row->status?></td>
            <td scope="row"><?php echo $row->asset?></td>
            <td scope="row"><?php echo $row->cabang?></td>
            <td scope="row"><?php echo $row->divisi?></td>
            <td scope="row"><?php echo $row->tgl_pembelian?></td>
            <td scope="row"><?php echo $row->kategori2?></td>
            <td scope="row">
              <a href="<?php echo base_url(); ?>Admin/listinventory/delete/<?php echo $row->id_barang?>" role="button" class="btn btn-danger">Delete</a>
              <button class="btn btn-info edit_data" data-toogle="modal" data-target="#update" id="<?php echo $row->id_barang?>" >Update</button>

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
                  <label class="control-label col-sm-4">Kode Asset:</label>
                  <div class="col-sm-8">
                  <input class="form-control" readonly="readonly" placeholder="kode asset" name="id_barang" id="id_barang"></input>
                </div>
                </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Nama Asset :</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="Nama Asset" name="nama_barang" id="nama_barang"></input>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Status Asset :</label>
                   <div class="col-sm-8">
                   <?php echo form_dropdown('status', $status_asset, '','id="status" name="status1" class="form-control"');?>
                   <input type="hidden" name="status" id="status_hidden">
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Asset:</label>
                   <div class="col-sm-8">
                   <?php echo form_dropdown('asset', $d2, '','id="d2" name="asset1" class="form-control"');?>
                   <input type="hidden" name="asset" id="asset_hidden">
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Cabang:</label>
                   <div class="col-sm-8">
                   <?php echo form_dropdown('cabang', $cabang, '','id="cabang" name="cabang1" class="form-control"');?>
                   <input type="hidden" name="cabang" id="cabang_hidden">
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Divisi:</label>
                   <div class="col-sm-8">
                   <?php echo form_dropdown('divisi', $divisi, '','id="divisi" name="divisi1" class="form-control"');?>
                   <input type="hidden" name="divisi" id="divisi_hidden">
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Tanggal pembelian:</label>
                   <div class="col-sm-8">
                   <input type="date" name="tgl_beli" id="tgl_beli" class="form-control"></input>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Kategori:</label>
                   <div class="col-sm-8">
                   <?php echo form_dropdown('kategori', $kategori, '','id="kategori" name="kategori1" class="form-control"');?>
                   <input type="hidden" name="kategori" id="kategori_hidden">
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Kategori 2:</label>
                   <div class="col-sm-8">
                     <!-- <select name="kategori2" id="kategori2" class="form-control"> -->
                     <?php echo form_dropdown('kategori2', $kategori2, '','id="kategori2" name="kategori21" class="form-control"');?>
                     <!-- </select> -->
                     <input type="hidden" name="kategori2" id="kategori2_hidden">
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Running Number</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="running number" name="run_number" id="run_number"></input>
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
var id_barang =$(this).attr("id");
var username=$("#username").val();
  $.ajax({
    url:"<?php echo base_url(); ?>admin/listinventory/fetch_barang",
    // dataType:'text',
    method:"POST",
    dataType:"json",
    data:{id_barang:id_barang},
    success:function(data){
      $("#id_barang").val(data[0].id_barang);
      $("#nama_barang").val(data[0].nama_barang);
      $("#password").val(data[0].password);
      $("#update").modal('show');
      console.log(data[0].id_barang);

    }
  })

}

)

$("select,#tgl_beli,#run_number").change(function(){
//GET VALUE FROM SELECTED TEXT AND PARSE IT INTO HIDDEN INPUT
var status_text = $("#status option:selected").text();
$("#status_hidden").val(status_text);
var asset_text = $("#d2 option:selected").text();
$("#asset_hidden").val(asset_text);
var cabang_text = $("#cabang option:selected").text();
$("#cabang_hidden").val(cabang_text);
var divisi_text = $("#divisi option:selected").text();
$("#divisi_hidden").val(divisi_text);
var kategori_text = $("#kategori option:selected").text();
$("#kategori_hidden").val(kategori_text);
var kategori2_text = $("#kategori2 option:selected").text();
$("#kategori2_hidden").val(kategori2_text);

//VALUE FOR SHOW SELECTED DROPDOWN
var status = $("#status").children("option:selected").val();
var asset = $("#d2").children("option:selected").val();
var d2 = $("#d2").children("option:selected").val();
var cabang = $("#cabang").children("option:selected").val();
var divisi = $("#divisi").children("option:selected").val();
var tgl_beli = $("#tgl_beli").val();
var date = new Date(tgl_beli),
 month = ''+(date.getMonth()+1) || 0,
 year = date.getFullYear().toString().substr(2,2) || 0;
var kategori= $("#kategori").children("option:selected").val();
var kategori2= $("#kategori2").val();
var run_number=$("#run_number").val();


//GENERATE ASSETCODE
  var assetcode = [];
  assetcode[0] = status;
  assetcode[1] = d2;
  assetcode[2] = cabang;
  assetcode[3] = divisi;
  assetcode[4] = month;
  assetcode[5] = year;
  assetcode[6] = kategori;
  assetcode[7] = kategori2;
  assetcode[8] = run_number;

   $( "#id_barang" ).val(assetcode.join(''));
});

//KATEGORI DEPENDENT DROPDOWN
$("#kategori").change(function(){
  var kategori= $("#kategori").children("option:selected").val();
  var kategori2= $("#kategori2").val();

if(kategori != '')
{
 $.ajax({
  url:"<?php echo base_url(); ?>admin/Inventory/fetch_kat2",
  method:"POST",
  data:{id_kategori:kategori},
  success:function(data)
    {
      $('#kategori2').html(data);
    }
  });
}
else
{
  $('#kategori2').html('<option value="">Select kategori 2</option>');
}
});
</script>
</body>
</html>
