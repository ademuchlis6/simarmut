<div class="clearfix">

    <div class="panel panel-info">
        <div class="panel-heading" style="overflow: auto">
            <div class="col-md-2">
                <h3 style="margin-top: 5px">Surat Masuk</h3>
            </div>
            <?php
            if($this->session->userdata('admin_id')==2){
            ?>
            <div class="col-md-2">
                <a href="<?php echo base_URL(); ?>index.php/admin/surat_masuk/add" class="btn btn-info"><i
                        class="icon-plus-sign icon-white"> </i> Tambah Data</a>
            </div>
            <?php
            }else{
            ?>
            <div class="col-md-2">
            </div>
            <?php
            }
            ?>

            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form class="navbar-form navbar-left" method="post"
                    action="<?php echo base_URL(); ?>index.php/admin/surat_masuk/cari" style="margin-top: 0px">
                    <input type="text" class="form-control" name="q" style="width: 200px"
                        placeholder="Kata kunci pencarian ..." required>
                    <button type="submit" class="btn btn-danger"><i class="icon-search icon-white"> </i> Cari</button>
                </form>
            </div>
        </div>
    </div>

    <?php echo $this->session->flashdata("k");?>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="10%">No. Surat</th>
                <th width="27%">Isi Ringkas, File</th>
                <th width="25%">Asal Surat</th>
                <th width="15%">Nomor, Tgl. Surat</th>
                <th width="23%">Status</th>
                <th width="27%">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php 
		if (empty($data)) {
			echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no 	= ($this->uri->segment(4) + 1);
			foreach ($data as $b) {
		?>
            <tr>
                <td><?php echo $b->no_agenda."/".$b->kode;?></td>
                <td><?php echo $b->isi_ringkas."<br><b>File : </b><i><a href='".base_URL()."upload/surat_masuk/".$b->file."' target='_blank'>".$b->file."</a>"?>
                </td>
                <td><?php echo $b->dari; ?></td>
                <td><?php echo $b->no_surat."<br><i>".tgl_jam_sql($b->tgl_surat)."</i>"?></td>
                <td><?php 
				if($b->status==1){
					echo 'Surat Baru Masuk';
				}elseif($b->status==2){
					echo 'Surat sudah didisposisi Kepala';
				}
				elseif($b->status==3){
					echo 'Surat sudah didisposisi kasubag';
				}elseif($b->status==4){
					echo 'Surat sudah diterima pelaksana';
				}elseif($b->status==5){
                    echo 'Surat sudah selesai';
                }
				?>
                </td>
                <td class="ctr">
                    <!-- <?php  
				// if ($b->pengolah == $this->session->userdata('admin_id')) {
				if ($b->pengolah == $this->session->userdata('umum')) {				
				?>
                    <!-- <div class="btn-group">
                        <a href="<?php echo base_URL()?>index.php/admin/surat_masuk/edt/<?php echo $b->id?>"
                            class="btn btn-success btn-sm" title="Edit Data"><i class="icon-edit icon-white"> </i>
                            Edt</a>
                        <a href="<?php echo base_URL()?>index.php/admin/surat_masuk/del/<?php echo $b->id?>"
                            class="btn btn-warning btn-sm" title="Hapus Data"
                            onclick="return confirm('Anda Yakin..?')"><i class="icon-trash icon-remove"> </i> Del</a>
                        <a href="<?php echo base_URL()?>index.php/admin/surat_disposisi/<?php echo $b->id?>"
                            class="btn btn-default btn-sm" title="Disposisi Surat"><i class="icon-trash icon-list"> </i>
                            Disp</a>
                        <a href="<?php echo base_URL()?>index.php/admin/disposisi_cetak/<?php echo $b->id?>"
                            class="btn btn-info btn-sm" target="_blank" title="Cetak Disposisi"><i
                                class="icon-print icon-white"> </i> Ctk</a>
                    </div> -->
                    <?php 
				} else {
				?>
                    <!-- <div class="btn-group">
                        <a href="<?php echo base_URL()?>index.php/admin/disposisi_cetak/<?php echo $b->id?>"
                            class="btn btn-info btn-sm" target="_blank" title="Cetak Disposisi"><i
                                class="icon-print icon-white"> </i> Ctk</a>
                    </div> -->
                    <?php 
				}
				?>


                    <?php 
						if ($this->session->userdata('admin_level')=='Kepala'){
						?>
                    <a href="<?php echo base_URL()?>index.php/admin/surat_disposisi/<?php echo $b->id?>"
                        class="btn btn-default btn-sm" title="Disposisi Surat"><i class="icon-trash icon-list"> </i>
                        Disp</a>
                    <?php
						}
						elseif($this->session->userdata('admin_level')=='Kasubag'&&$b->status>=2){
							?>
                    <a href="<?php echo base_URL()?>index.php/admin/surat_disposisi_2/<?php echo $b->id?>"
                        class="btn btn-default btn-sm" title="Disposisi Surat"><i class="icon-trash icon-list"> </i>
                        Disp 2</a>
                    <?php
						}
						elseif($this->session->userdata('admin_level')=='Pelaksana'&&$b->status==3){
							?>
                    <a href="<?php echo base_URL()?>index.php/admin/terima?id=<?php echo $b->id?>"
                        class=" btn btn-success btn-sm" title="Terima Disposisi"><i class="icon-print icon-white"> </i>
                        Terima</a>
                    <?php
						}
						elseif($this->session->userdata('admin_level')=='Pelaksana'&&$b->status==4||$b->status==5){
							?>
                    <a href="<?php echo base_URL()?>index.php/admin/disposisi_cetak/<?php echo $b->id?>"
                        class="btn btn-info btn-sm" target="_blank" title="Cetak Disposisi"><i
                            class="icon-print icon-white"> </i> Ctk</a>
                    <?php
						}
						elseif($this->session->userdata('admin_level')!='Kasubag'&&$this->session->userdata('admin_level')!='Kepala'&&$this->session->userdata('admin_level')!='Pelaksana'){
					?>
                    <div class="btn-group">
                        <a href="<?php echo base_URL()?>index.php/admin/surat_masuk/edt/<?php echo $b->id?>"
                            class="btn btn-success btn-sm" title="Edit Data"><i class="icon-edit icon-white"> </i>
                            Edt</a>
                        <a href="<?php echo base_URL()?>index.php/admin/surat_masuk/del/<?php echo $b->id?>"
                            class="btn btn-warning btn-sm" title="Hapus Data"
                            onclick="return confirm('Anda Yakin..?')"><i class="icon-trash icon-remove"> </i> Del</a>
                        <a href="<?php echo base_URL()?>index.php/admin/disposisi_cetak/<?php echo $b->id?>"
                            class="btn btn-info btn-sm" target="_blank" title="Cetak Disposisi"><i
                                class="icon-print icon-white"> </i> Ctk</a>
                    </div>

                    <?php
						}
					?>


                </td>
            </tr>
            <?php 
			$no++;
			}
		}
		?>
        </tbody>
    </table>
    <center>
        <ul class="pagination"><?php echo $pagi; ?></ul>
    </center>
</div>