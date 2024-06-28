<link rel="stylesheet" type="text/css" href="<?= base_url() ?>mods/assets/flip/css/flipbook.style.css">
<script src="<?= base_url() ?>mods/assets/flip/js/flipbook.min.js"></script>
<div class="col-md-12 mb-3">
	<div class="card">
		<div class="card-header bg-primary" style="color: white;">
			<strong><i class="mdi mdi-book"></i> Daftar Buku</strong>
		</div>
		<div class="card-body">
			<div class="alert alert-primary" role="alert">
				<strong>Info !</strong><br>
				Buku yang ditampilkan hanya buku yang berstatus <strong><span class="badge badge-success">Ready</span></strong>
			</div>
			<table class="table table1 table-hover dt-responsive nowrap" border="0"> 
				<thead>
					<tr>
						<th width="4%"><center>No</center></th>
						<th><center>TYPE</center></th>
						<th><center>JUDUL</center></th>
						<th><center>KATEGORI</center></th>
						<th><center>PENGARANG</center></th>
						<th width="10%"><center>TAHUN</center></th>
						<th width="10%"><center>SISA BUKU</center></th>
						<th width="15%"><center>Aksi</center></th>
					</tr>
				</thead>
				<tbody>
					<?php if ($buku != null){ ?>
						<?php $no=1; foreach ($buku as $b){ ?>
							<tr>
								<td><center><?php echo $no++; ?></center></td>
								<td><?php echo $b->tipe_buku ?></td>
								<td>
									<?php echo $b->judul_buku ?>
									<?php if ($b->Flag_New == 'Y'){ ?>
										<span style="font-size: 12px;" class="badge badge-danger">Baru</span>
									<?php } ?>
								</td>
								<td><?php echo $b->NamaKategori ?></td>
								<td><?php echo $b->pengarang_buku ?></td>
								<td><center><?php echo $b->tahun_buku ?></center></td>
								<td><center><?php echo $b->jmlh_buku ?></center></td>
								
								<td>
									<center>
										<?php if ($b->tipe_buku == "BUKU"){ ?>
											<a href="javascript: void(0);" class="btn btn-sm btn-primary" onclick="get_pinjam('<?php echo encrypt_url($b->IdBuku) ?>')"  data-toggle="tooltip" data-placement="top" title="Pinjam"><i class="mdi mdi-book"></i> Pinjam</a>
										<?php }else if($b->tipe_buku == "E-BOOK"){?>
											
											<a class="btn btn-sm btn-success" href="javascript: void(0);" onclick="readEbook('#<?=md5($b->ebook_buku)?>','<?=$b->ebook_buku?>')"  data-toggle="tooltip" data-placement="top" title="Baca"><i class="fa fa-file-pdf-o"></i> Baca</a>
											<a href="javascript: void(0);" id="<?=md5($b->ebook_buku)?>" style="display: none;" title=""></a>
											<span id="vv" style="display: none;"></span>
										<?php }?>
									</center>
								</td>
							</tr>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>		
</div>
<div class="modal fade" id="modal-pinjam">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary" style="color: white;">
				<h5 class="modal-title">Pengajuan Pinjam Buku</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<form action="<?php echo site_url('Siswa/pinjam') ?>" method="post" accept-charset="utf-8">
				<div class="modal-body" id="body-pinjam">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Ajukan Pinjam</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	function get_pinjam(arg)
	{
		$.ajax({
			url: '<?php echo site_url('Siswa/get_pinjam') ?>',
			type: 'POST',
			dataType: 'html',
			data:{
				arg:arg
			},
			success: function(data, textStatus, xhr) {
				//called when successful
				$("#modal-pinjam").modal('show');
				$("#body-pinjam").html(data);
			},
			error: function(xhr, textStatus, errorThrown) {
				//called when there is an error
				swal('error',errorThrown,'error');
			}
		});
	}
</script>
<script>
	function readEbook(el,bb){
		$('#vv').html('')
		let html
		html = `
		<script>
			$('${el}').flipBook({
				//Layout Setting
				pdfUrl:'<?= base_url() ?>mods/assets/book/${bb}',
				lightBox:true,
				layout:1,
				currentPage:{vAlign:"bottom", hAlign:"left"},
				// BTN SETTING
				btnShare : {enabled:false},
				btnPrint : {
				  enabled: false,
				  hideOnMobile:true,
				},
				btnDownloadPages : {
				  enabled: false,
				},
				btnDownloadPdf : {
				  enabled: false,

				},
				btnClose : {
					onClick : clear_temp()
				},
				btnColor:'rgb(255,120,60)',
				sideBtnColor:'rgb(255,120,60)',
				sideBtnSize:60,
				sideBtnBackground:"rgba(0,0,0,.7)",
				sideBtnRadius:60,
				btnSound:{vAlign:"top", hAlign:"left"},
				btnAutoplay:{vAlign:"top", hAlign:"left"},
			});
			<\/script>

		`
		$('#vv').html(html)
		$(el).click();
		$('#vv').html('')
	}

	function clear_temp()
	{
		$("div[class^='flipbook']" ).remove();
	}
</script>