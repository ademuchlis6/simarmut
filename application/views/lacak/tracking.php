<?php $this->load->view('lacak/trackingStyle');?>
<div class="row bs-wizard" style="border-bottom:0; background-color:rgba(33, 222, 87, 0.42);">
    <div class="col-xs-2 bs-wizard-step complete" onclick="show(1)">
        <div class="text-center bs-wizard-stepnum">Jumlah : <?php echo $jum1;?></div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="bs-wizard-stepnum text-center">Surat Baru Masuk</div>
    </div>


    <div class="col-xs-2 bs-wizard-step complete" onclick="show(2)">
        <!-- complete -->
        <div class="text-center bs-wizard-stepnum">Jumlah : <?php echo $jum2;?></div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="bs-wizard-stepnum text-center">Surat sudah di disposisi kepala, menunggu disposisi kasubag</div>
    </div>

    <div class="col-xs-2 bs-wizard-step complete" onclick="show(3)">
        <!-- complete -->
        <div class="text-center bs-wizard-stepnum">Jumlah : <?php echo $jum3;?></div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="bs-wizard-stepnum text-center">Surat sudah di disposisi kasubag, menunggu pelaksana</div>
    </div>

    <div class="col-xs-2 bs-wizard-step complete" onclick="show(4)">
        <!-- active -->
        <div class="text-center bs-wizard-stepnum">Jumlah : <?php echo $jum4;?></div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="bs-wizard-stepnum text-center"> Surat sudah diterima pelaksana</div>
    </div>


    <div class="col-xs-2 bs-wizard-step complete" onclick="show(5)">
        <!-- active -->
        <div class="text-center bs-wizard-stepnum">Jumlah : <?php echo $jum5;?></div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="bs-wizard-stepnum text-center"> Surat Sudah selesai</div>
    </div>
</div>

<?php $this->load->view('lacak/trackingScript');?>



<div style='display:none' id='tableTracking'>
    <h3 id='judul'>Data </h3>
    <br />
    <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nomor Surat</th>
                <th>Index Berkas</th>
                <th>Kegiatan</th>
                <th>Isi Ringkas</th>
                <th>Dari</th>
                <th>Tgl Surat</th>
                <th>Tgl Diterima</th>
                <th>Sisa Waktu</th>
                <th>Tgl Selesai</th>
                <th>Status</th>
                <th style="width:150px;">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>

    </table>
</div>