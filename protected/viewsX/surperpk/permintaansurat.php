<meta http-equiv="refresh" content="290">
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i> Daftar Permintaan Surat Permohonan Praktik Kerja (Prodi D3)
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
	$('#surperpk-grid').yiiGridView('update', {
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
            <div class="portlet-body">
                <div class="table-responsive">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'surperpk-grid',
                        'filter' => $model,
                        'dataProvider' => $model->search(),
                        'template' => "{summary}\n{items}\n{pager}",
                        'itemsCssClass' => 'table table-bordered table-striped table-hover',
                        'columns' => array(
                            array(
                                'header' => 'No',
                                'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                            ),
                            //'IDPK',
                            //'IDJENISSURAT',
                            //'NOSURATPK',
                            array(
                                'filter' => '',
                                'header' => 'No.Surat',
                                'value' => '$data->NOSURATPK',

                            ),
                            'INSTANSIPK',
                            'ALAMATINSTANSIPK',
                            'KOTAINSTANSIPK',
                            //'ACCPERPK',

                            /*
                            'KETERANGANPK',
                            'TGLSUBMITPK',
                            */
                            array(

                                'header' => 'Group Mahasiswa',
                                'value' => '$data->mahasiswasurperpk',
                            ),


                            array(
                                'header' => 'Detail Surat',
                                'type' => 'raw',
                                'value' => 'CHtml::link("Lihat ",array("surperpk/isisurat","id"=>$data->primaryKey),array ("class"=>"btn btn-sm purple "))',


                            ),
                            array(
                                'name' => 'Statussurat',
                                'filter' => '',
                                'type' => 'raw',
                                'header' => 'Status Surat',
                            ),
                            array(
                                'header' => 'Cetak Surat',
                                'type' => 'raw',
                                'value' => '$data->cetakbytgl',
                            ),
                        ),


                    )); ?>
                    <div class="actions">
                        <?php echo CHtml::link('Daftar Permintaan Srt.Pelaksanaan PK &nbsp<i class="fa fa-search"></i>', array('subdetailsurpelpk/permintaansurat'), array('class' => 'btn btn-sm yellow'));
                        ?>
                        <?php echo CHtml::link('Daftar Monitoring PK &nbsp<i class="fa fa-search"></i>', array('surtugmonitoring/permintaansurat'), array('class' => 'btn btn-sm blue'));
                        ?>
                    </div>
                    <br>
                    <B><U>KETERANGAN</U></B><br>
                    Permohonan/permintaan surat dapat diambil di Sub bagian Akademik & Kemahasiswaan (BAPENDIK) dengan
                    ketentuan status surat sebagai berikut:<br>
                    <font color="red"><i class="fa fa-check"></i></font><font color="blue">&nbsp;Status surat sudah
                        jadi/dapat diambil</font><br>
                    <font color="red"><i class="icon-question"></i></font><font color="blue">&nbsp;Status surat sedang
                        dalam proses</font><br>
                    <font color="red"><i class="fa fa-times"></i></font><font color="blue">&nbsp;Status surat tidak
                        jadi/terjadi kesalahan/syarat kurang</font>
                    <br>
                    <br>
                </div>

            </div>
        </div>

