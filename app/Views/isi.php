<link rel="stylesheet" href="<?php echo  base_url("assets/ans_template/"); ?>/plugins/select2/select2.css">
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Pegawai</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <button type="button" id="btn-tambah-data" class="btn btn-success" data-toggle="modal" onclick="tambah_data();"><i class="fa fa-plus"></i> Tambah Data </button>
                    <button type="button" class="btn btn-primary" id="btn-load-data"><i class="fa fa-refresh"></i> Refresh </button>
                    <br>

                    <table id="data_pegawai" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</div>

</div>
</div>



<div class="modal fade bs-example-modal" id="modal_pegawai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formPegawai" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close float-right" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Pegawai</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group" id="kode">
                        <label>NIP</label>
                        <input name="nip" id="nip" type="text" class="form-control" required=""/>
                    </div>
					<div class="form-group" id="kode">
                        <label>Nama</label>
                        <input name="nama" id="nama" type="text" class="form-control" required=""/>
                    </div>
					<div class="form-group" id="kode">
                        <label>Alamat</label>
                        <input name="alamat" id="alamat" type="text" class="form-control" required=""/>
                    </div>
					 <div class="form-group">
                        <label>Kabupaten</label>
                        <select name="id_kab" id="id_kab" class="form-control" onchange="cari_kecamatan();">
                            <option value="">- Pilih Kabupaten -</option>
							<?php
							foreach($kabupaten as $kab)
							{
								echo "<option value='".$kab->id_kab."'>".$kab->nama_kab."</option>";
							}
							?>
                        </select>
                    </div>
					 <div class="form-group">
                        <label>Kecamatan</label>
                        <select name="id_kec" id="id_kec" class="form-control" onchange="cari_kelurahan()">
                            <option value="">- Pilih Kecamatan -</option>
                        </select>
                    </div>
					 <div class="form-group">
                        <label>Kabupaten</label>
                        <select name="id_kel" id="id_kel" class="form-control">
                            <option value="">- Pilih Kelurahan -</option>
                        </select>
                    </div>
					 <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">- Pilih Jenis Kelamin -</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
					<div class="form-group" id="kode">
                        <label>HP</label>
                        <input name="hp" id="hp" type="text" class="form-control" required=""/>
                    </div>
					<div class="form-group" id="kode">
                        <label>Email</label>
                        <input name="email" id="email" type="text" class="form-control" required=""/>
                    </div>
                   


                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
                    <button type="button" id="btn-simpan-pegawai" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" id="btn-ubah-pegawai" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
    
    <script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/jquery/dist/jquery.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/jszip/dist/jszip.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/pdfmake/build/pdfmake.min.js"></script>
	<script src="<?php echo base_url("assets/ans_template/"); ?>/vendors/pdfmake/build/vfs_fonts.js"></script>
	
	<script src="<?php echo  base_url("assets/ans_template/"); ?>/plugins/select2/select2.full.min.js"></script>
    <script>
    $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
	});
	</script>
    <script>
    var save_method;
    var table;

    $(document).ready(function() {
        table = $('#data_pegawai').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo base_url('admin-pegawai') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [-1],
                "orderable": false,
            }, ],
        });
	});
	
	$('#btn-load-data').on('click', function() {
            table.ajax.reload(null, false);
        });
	
	 function tambah_data() {
			$('#modal_pegawai').modal('show');
            $('#myModalLabel').text("Tambah Data Pegawai");
            $('#btn-simpan-pegawai').show();
            $('#btn-ubah-pegawai').hide();
                	kec='';
               	 	kel='';
					$('#nip').val('');
					document.getElementById('nip').removeAttribute('readonly','readonly');
               	 	$('#nama').val('');
                	$('#alamat').val('');
               	 	$('#id_kab').val('');
					$('#id_kab').trigger('change');
                	$('#jenis_kelamin').val('');
               	 	$('#hp').val('');
                	$('#email').val('');
      }
	  
	  
	var kec="";
	var kel="";
	
	function cari_kecamatan(){
			$.ajax({
                type : 'post',
                url : '<?php echo base_url('admin-kecamatan'); ?>',
                data :  'id=' + id_kab.value,
                success : function(datanya){
                $('#id_kec').html(datanya);
				$('#id_kec').val(kec);
				$('#id_kec').trigger('change');
				}
			});
	}
	
	function cari_kelurahan(){
			$.ajax({
                type : 'post',
                url : '<?php echo base_url('admin-kelurahan'); ?>',
                data :  'id=' + id_kec.value,
                success : function(datanya){
                $('#id_kel').html(datanya);
				$('#id_kel').val(kel);
				$('#id_kel').trigger('change');
				}
			});
	}
	
	 // Simpan data
        $('#btn-simpan-pegawai').on('click', function() {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('admin-simpan_pegawai') ?>",
                    dataType: "JSON",
                    data: {
						
                        nip: nip.value,
                        nama: nama.value,
                        alamat: alamat.value,
                        id_kab: id_kab.value,
                        id_kec: id_kec.value,
                        id_kel: id_kel.value,
                        jenis_kelamin: jenis_kelamin.value,
                        hp: hp.value,
                        email: email.value,
                    },
                    success: function(data) {
                         alert('Data Berhasil Disimpan');
                         table.ajax.reload(null, false);
						$('#modal_pegawai').modal('hide');
                    }
                });
        });
		
		
		 $('#btn-ubah-pegawai').on('click', function() {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('admin-edit_pegawai') ?>",
                    dataType: "JSON",
                    data: {
						
                        nip: nip.value,
                        nama: nama.value,
                        alamat: alamat.value,
                        id_kab: id_kab.value,
                        id_kec: id_kec.value,
                        id_kel: id_kel.value,
                        jenis_kelamin: jenis_kelamin.value,
                        hp: hp.value,
                        email: email.value,
                    },
                    success: function(data) {
                         alert('Data Berhasil Disimpan');
                         table.ajax.reload(null, false);
						$('#modal_pegawai').modal('hide');
                    }
                });
        });
		
		function hapus_pegawai(nip){
			$.ajax({
                type : 'post',
                url : '<?php echo base_url('admin-hapus_pegawai'); ?>',
                data :  'nip=' + nip,
                success : function(datanya){
                 alert('Data Berhasil Dihapus');
                 table.ajax.reload(null, false);
				}
			});
		}
		
		function edit_pegawai(nip){
			$.ajax({
                type : 'post',
                url : '<?php echo base_url('admin-cari_pegawai'); ?>',
                data :  'nip=' + nip,
				dataType: "JSON",
                success : function(data){
					//alert(data.nama);
                	$('#nip').val(data.nip);
					document.getElementById('nip').setAttribute('readonly','readonly');
               	 	$('#nama').val(data.nama);
                	$('#alamat').val(data.alamat);
               	 	$('#id_kab').val(data.id_kab);
					$('#id_kab').trigger('change');
                	$('#jenis_kelamin').val(data.jenis_kelamin);
               	 	$('#hp').val(data.hp);
                	$('#email').val(data.email);
                 	$('#modal_pegawai').modal('show');
					$('#myModalLabel').text("Edit Data Pegawai");
					$('#btn-simpan-pegawai').hide();
					$('#btn-ubah-pegawai').show();
                	kec=data.id_kec;
               	 	kel=data.id_kel;
				}
			});
		}
		
    </script>
	

	<!-- FastClick -->
	<script src="<?php echo  base_url("assets/ans_template/"); ?>/build/js/custom.js"></script>
