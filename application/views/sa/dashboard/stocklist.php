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

      <h3 class="col-sm-4">Inventory</h3>
      <div class="col-sm-11">



    <a href="../sadmin/inventory" data-toogle="modal" data-target="#addbarang" role="button" class="btn btn-info alignright">Add Item</a>



      <form class="form-inline" action="<?php echo base_url();?>sadmin/listStock" method="post">
        <select class="form-control" name="field">
            <option selected="selected" disabled="disabled" value="">Filter By</option>
            <option value="id_stock">Stock Number</option>
            <option value="item_code">Item Code</option>
            <option value="nama_stock">Nama Barang</option>
            <option value="quantity">Quantity</option>
        </select>
        <input class="form-control" type="text" name="search" value="" placeholder="Search...">
        <input class="btn btn-default" type="submit" name="filter" value="Go">
    </form>
    </div>


      <table class="table table-inventory">

        <thead>

          <tr>
            <th scope="col">Stock Number</th>
            <th scope="col">Item Code</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Quantity</th>
            <th scope="col">Last In</th>
            <th scope="col">Last Out</th>
            <th scope="col">Keterangan</th>
          </tr>

        </thead>
    <?php

         foreach ($data->result()as $row):

        ?>
        <tbody>

          <tr>




            <th scope="row"><?php echo $row->id_stock?></th>
            <th scope="row"><?php echo $row->item_code?></th>
            <td scope="row"><?php echo $row->nama_stock?></td>
            <td scope="row"><?php echo $row->quantity?></td>
            <td scope="row"><?php echo $row->last_in?></td>
            <td scope="row"><?php echo $row->last_out?></td>
            <td scope="row"><?php echo $row->Keterangan?></td>

            <td scope="row">
              <?php if ($row->quantity == 0):?>

              <a href="<?php echo base_url(); ?>sAdmin/liststock/deletestock/<?php echo $row->id_stock?>" role="button" class="btn btn-danger">Delete</a>
            <?php endif; ?>
<button class="btn btn-info edit_data" data-toogle="modal" data-target="#update" id="<?php echo $row->id_stock?>" >Update</button>
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
        <h4 class="modal-title">Edit Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">


                <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
              <!--<i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features! -->
              <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('sadmin/listStock/editstock'); ?>">

                <div class="form-group">
                  <label class="control-label col-sm-4">Stock Number:</label>
                  <div class="col-sm-8">
                  <input class="form-control" placeholder="Stock Number" name="id_stock" id="id_stock"></input>
                  <input type="hidden" name="old_idstock" id="old_idstock">
                </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-4">Item Code:</label>
                  <div class="col-sm-8">
                  <input class="form-control" placeholder="item_code" name="item_code" id="item_code"></input>
                  <!-- <input type="hidden" name="old_idbarang" id="old_idbarang"> -->
                </div>
                </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Nama Stock:</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="Nama Stock" name="nama_stock" id="nama_stock"></input>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Keterangan</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="keterangan" name="keterangan" id="keterangan"></input>
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

  //EDIT DATA
$(document).on('click', '.edit_data', function(){
var id_stock =$(this).attr("id");
var username=$("#username").val();
  $.ajax({
    url:"<?php echo base_url(); ?>sadmin/listStock/fetch_stock",
    // dataType:'text',
    method:"POST",
    dataType:"json",
    data:{id_stock:id_stock},
    success:function(data){
      $("#id_stock").val(data[0].id_stock);
      $("#item_code").val(data[0].item_code);
      $("#old_idstock").val(data[0].id_stock);
      $("#nama_stock").val(data[0].nama_stock);
      $("#keterangan").val(data[0].keterangan);

      $("#update").modal('show');



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

   var number = [];
  number[0] = kategori;
  number[1] = kategori2;

  $( "#number" ).val(number.join(''));

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
