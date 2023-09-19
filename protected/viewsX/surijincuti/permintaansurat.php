<meta http-equiv="refresh" content="290">
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Data Permintaan Surat Izin Cuti Akademik
        </div>
        <div class="actions">
            <?php echo CHtml::link('List Daftar Permintaan Aktif Kembali Cuti &nbsp<i class="fa fa-search"></i>', array('suraktifcuti/permintaansurat'), array('class' => 'btn btn-sm yellow')); ?>
        </div>
    </div>

    <div class="portlet-body">
        <div class="table-responsive">
            <?php

            Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#surijincuti-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
            ?>


            <?php echo CHtml::link('Pencarian', '#', array('class' => 'search-button')); ?>
            <div class="search-form" style="display:none">
                <?php $this->renderPartial('_cari', array(
                    'model' => $model,
                )); ?>
            </div><!-- search-form -->
        </div>

        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'surijincuti-grid',
            'filter' => $model,
            'dataProvider' => $model->search(),
            'template' => "{summary}\n{items}\n{pager}",
            'itemsCssClass' => 'table table-bordered table-striped table-hover',
            'columns' => array(
                array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
                array(

                    'header' => 'No.Surat',
                    'value' => '$data->NOSURATIJINCUTI',

                ),
                array(
                    'name' => 'NIM',
                    'type' => 'raw',
                    'header' => 'NIM',
                    'value' => 'CHtml::encode(
				$data->nIM->NIM)',
                    'htmlOptions' => array('widht' => ''),

                ),
                //'nIM.NAMA',
                array(
                    'name' => 'IDIJINCUTI',
                    'type' => 'raw',
                    'header' => 'Nama Peminta/Pemohon',
                    'value' => '$data->nIM->NAMA',
                    'filter' => '',
                    //'filter'=>Chtml::listData(Surijincuti::model()->findAll(),'IDIJINCUTI','nIM.NAMA')
                ),


                // 'nIM.iDPRODI.NAMAPRODI',
                array(
                    'name' => 'NIM',
                    'type' => 'html',
                    'header' => 'Jurusan/Prodi',
                    'value' => '$data->nIM->iDPRODI->NAMAPRODI',
                    'filter' => '',
                    //'filter'=>Chtml::listData(Prodi::model()->findAll(),'IDPRODI','NAMAPRODI'),
                    //'htmlOptions'=>array('widht'=>'5%'),
                ),
                'nIM.ALAMATASAL',
                array(

                    'header' => 'Lama Cuti (semester)',
                    'value' => '$data->LAMAIJINCUTI',

                ),

                array(
                    'name' => 'Statuskirimsurat',
                    'filter' => '',
                    'type' => 'raw',
                    'header' => 'Status Kirim Surat',
                ),

                array(
                    'header' => 'Cetak Permohonan Cuti',
                    'type' => 'raw',
                    'value' => 'CHtml::link("Cetak ",array("cetak/surpermohonanijincuti","id"=>$data->primaryKey),array ("target"=>"_blank","class"=>"btn btn-sm yellow"))',
                ),
                array(
                    'name' => 'Statussurat',
                    'filter' => '',
                    'type' => 'raw',
                    'header' => 'Status Surat',
                ),
                array(
                    'header' => 'Detail Surat',
                    'type' => 'raw',
                    'value' => 'CHtml::link("View ",array("surijincuti/isisurat","id"=>$data->primaryKey),array ("class"=>"btn btn-sm purple "))',


                ),
                array(
                    'header' => 'Cetak Permohonan Cuti',
                    'type' => 'raw',

                    'value' => 'CHtml::link("Cetak ",array("cetak/surpermohonanijincuti","id"=>$data->primaryKey),array ("target"=>"_blank","class"=>"btn btn-sm purple"))',
                ),
                array(
                    'header' => 'Cetak Izin Cuti by Dekan',
                    'type' => 'raw',

                    'value' => '$data->cetakbytgl',
                ),
                array(
                    'header' => 'Generate Aktif Kembali ',
                    'name' => 'SETGENERATEAKTIF',
                    'filter' => '',
                    'type' => 'raw',
                    'value' => '$data->generatestatusbymhs',
                ),

            ),
        )); ?>
        <div class="actions">
            <?php echo CHtml::link('<i class="fa fa-plus"></i> Buat Surat Permintaan Izin Cuti Akademik', array('createbymahasiswa'), array('class' => 'btn btn-default blue')); ?>

        </div>
        <br>
        <br>
        <B><U>KETERANGAN</U></B><br>
        Permohonan/permintaan surat dapat diambil di Sub bagian Akademik & Kemahasiswaan (BAPENDIK) dengan ketentuan
        status surat sebagai berikut:<br>
        <font color="red"><i class="fa fa-check"></i></font><font color="blue">&nbsp;Status surat sudah jadi/dapat
            diambil</font><br>
        <font color="red"><i class="icon-question"></i></font><font color="blue">&nbsp;Status surat sedang dalam
            proses</font><br>
        <font color="red"><i class="fa fa-times"></i></font><font color="blue">&nbsp;Status surat tidak jadi/terjadi
            kesalahan/syarat kurang</font>
        <h4><font color="red">&nbsp;Jika Status Surat Belum Terkirim, Klik tomobol <b>Lihat</b> dan Klik tombol <b>Ajukan
                    Permohonan/Permintaan Anda </b></font></h4><br>

        <div class="portlet-body">
            <div class="portlet box red">
                <div class="portlet-title">
                    <b>WARNING</b>
                </div>

                <div class="portlet-body">
                    <font color="red"><p>Jika terdapat kesalahan pada biodata anda (nama,tempat lahir,tgl.lahir, alamat
                            asal) dsb, mohon untuk segera komfirmasi ke Sub Bagian Akademik dan
                            Kemahasiswaan/BAPENDIK.</p></font>
                    Untuk permintaan/permohonan Aktif Kembali Cuti Akademik, segera hubungi operator BAPENDIK untuk
                    melakukan Generate Aktif Kembali permohonan Anda, dan lakukan generate by system oleh pemohon.
                </div>
            </div>
        </div>
    </div>
</div>

