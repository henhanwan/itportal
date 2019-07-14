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
        <a class="navbar-brand" href="<?php echo base_url('dashuser') ?>">ITPORTAL</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url('dashUser') ?>">Home</a></li>
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
<!-- SESSION VALIDATION  -->
      <h1>Welcome <?php echo $this->session->userdata('username'); ?></h1>
<!-- SESSION VALIDATION  -->

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
<!-- INVENTORY MENU -->

    <div class="col-sm-3 menu-button">
      <h3><a href="listinventory">List Asset</a></h3>
    </div>
    <div class="col-sm-12">

    </div>




    <div class="col-sm-3 menu-button">
      <h3><a href="liststock">List Stock</a></h3>
    </div>
    <div class="col-sm-3 menu-button">
      <h3><a href="liststocktrans">List Stock IN/OUT</a></h3>
    </div>

  </div>


<!-- SIDENAV -->
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

<!-- MODAL FOR ADDING ITEM ASSET -->
  <!-- <div id="addbarang" class="modal fade">
  	<div class="modal-dialog modal-adduser">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h4 class="modal-title">Add Item</h4>
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  			</div>
  			<div class="modal-body">
                <form class="form-horizontal" role="form" method="post" action="">

                <div class="form-group">
                  <label class="control-label col-sm-4">Kode Asset:</label>
                  <div class="col-sm-8">
                  <input class="form-control" readonly="readonly" placeholder="kode asset" name="id_barang" id="id_barang"></input>
                </div>
                </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Nama Asset :</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="Nama Asset" name="nama_barang"></input>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Status Asset :</label>
                   <div class="col-sm-8">

                   <input type="hidden" name="status_hidden" id="status_hidden">
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Asset:</label>
                   <div class="col-sm-8">

                   <input type="hidden" name="asset_hidden" id="asset_hidden">
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Cabang:</label>
                   <div class="col-sm-8">

                   <input type="hidden" name="cabang_hidden" id="cabang_hidden">
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Divisi:</label>
                   <div class="col-sm-8">

                   <input type="hidden" name="divisi_hidden" id="divisi_hidden">
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

                  <input type="hidden" name="kategori_hidden" id="kategori_hidden">
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Kategori 2:</label>
                   <div class="col-sm-8">
                     <!-- <select name="kategori2" id="kategori2" class="form-control"> -->

                     <!-- </select> -->
                     <!-- <input type="hidden" name="kategori2_hidden" id="kategori2_hidden">
                     <input type="hidden" name="number" id="number">
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
  </div> -->

  <!-- MODAL FOR ADDING ITEM STOCK -->
  <div id="addstock" class="modal fade">
  	<div class="modal-dialog modal-adduser">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h4 class="modal-title">Add Stock</h4>
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  			</div>
  			<div class="modal-body">
                <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('admin/Inventory/addstock'); ?>">


                 <div class="form-group">
                   <label class="control-label col-sm-4">Nama Stock :</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="Nama Stock" name="nama_stock"></input>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Item Code :</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="Item Code" name="item_code"></input>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">IN / OUT  :</label>
                   <div class="col-sm-8">
                   <label class="radio-inline"><input type="radio" name="optinout" value="in">in</label>
                   <label class="radio-inline"><input type="radio" name="optinout" value="out">out</label>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Quantity :</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="Quantity" name="quantity"></input>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Tanggal:</label>
                   <div class="col-sm-8">
                   <input type="date" name="tgl_inout" id="tgl_inout" class="form-control"></input>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Vendor :</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="Nama Vendor" name="vendor"></input>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">NO PO :</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="NO PO" name="no_po"></input>
                 </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-4">Nama Employee :</label>
                   <div class="col-sm-8">
                   <input class="form-control" placeholder="Nama Employee" name="nama_emp"></input>
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

  <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bootstrap/js/jquery.js"></script>
  <script>





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
