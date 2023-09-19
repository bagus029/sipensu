<meta http-equiv="refresh" content="290">
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i> Daftar Permintaan Surat Tugas Ijin Penelitian
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
	$('#surtugpn-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
            ?>

            <?php echo CHtml::link('Pencarian', '#', array('class' => 'search-button')); ?>
            <div class="search-form" style="display:none">
                <?php $this->renderPartial('_search', array(
                    'model' => $model,
                )); ?>
            </div><!-- search-form -->
        </div>

        <div class="portlet-body">
            <div class="table-responsive">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'surtugpn-grid',
                    'filter' => $model,
                    'dataProvider' => $model->search(),
                    'template' => "{summary}\n{items}\n{pager}",
                    'itemsCssClass' => 'table table-bordered table-striped table-hover',
                    'columns' => array(
                        array(
                            'header' => 'No',
                            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                        ),
                        //'IDPN',
                        //'NOSURATPN',
                        array(
                            'header' => 'No.Surat',
                            'value' => '$data->NOSURATPN',
                        ),
                        //'IDJENISSURAT',
                        //'iDJENISSURAT.NAMAJENISSURAT',
                        'JUDULPN',
                        array(
                            'htmlOptions' => array('width' => '15%'),
                            'header' => 'Instansi Penelitian',
                            'value' => '$data->groupinstansipn',
                        ),
                        //'WAKTUDATAPN',
                        //'TGLSUBMITPN',
                        array(
                            'header' => 'Group Dosen',
                            'value' => '$data->dosenpn',
                        ),
                        array(
                            'header' => 'Detail Surat',
                            'type' => 'raw',
                            'value' => 'CHtml::link("Lihat ",array("surtugpn/isisurat","id"=>$data->primaryKey),array ("class"=>"btn btn-sm purple "))',
                        ),
                        array(
                            'name' => 'Accsurat',
                            'filter' => '',
                            'type' => 'raw',
                            'header' => 'Status Surat',
                        ),
                        array(
                            'type' => 'html',
                            'header' => 'Cetak Srt.Tugas',
                            'value' => '$data->cetakbytgl',
                        ),
                    ),
                )); ?>
                <B><U>KETERANGAN</U></B><br>
                Permohonan/permintaan surat dapat diambil di Sub bagian Akademik & Kemahasiswaan (BAPENDIK) dengan
                ketentuan status surat sebagai berikut:<br>
                <font color="red"><i class="fa fa-check"></i></font><font color="blue">&nbsp;Status surat sudah
                    jadi/dapat diambil</font><br>
                <font color="red"><i class="icon-question"></i></font><font color="blue">&nbsp;Status surat sedang dalam
                    proses</font><br>
                <font color="red"><i class="fa fa-times"></i></font><font color="blue">&nbsp;Status surat tidak
                    jadi/terjadi kesalahan/syarat kurang</font>
            </div>
        </div>
    </div>