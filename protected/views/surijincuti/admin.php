<?php Yii::app()->clientScript->registerCoreScript('jquery2'); ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Manage Permintaan Surat Ijin Cuti</h4>
        </div>
        <div class="card-body">
            <?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah', array('create'), array('class' => 'btn btn-primary waves-effect waves-float waves-light')); ?>    </div>
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
                <?php $this->renderPartial('_search', array(
                    'model' => $model,
                )); ?>
            </div><!-- search-form -->
        </div>


        <div class="portlet-body">
            <div class="table-responsive">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'surijincuti-grid',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
                    //'itemsCssClass' => 'table table-bordered table-striped table-advance table-hover',
                    'columns' => array(
                        array(
                            'filter' => '',
                            'header' => 'No.Surat Izin Cuti Akademik ',
                            'value' => '$data->listbuatnosuratijincuti',
                        ),
                        array(
                            'name' => 'NIM',
                            'type' => 'raw',
                            'header' => 'NIM',
                            'value' => 'CHtml::encode(
				$data->nIM->NIM)',
                            'htmlOptions' => array('widht' => ''),
                        ),
                        array(
                            'name' => 'IDIJINCUTI',
                            'type' => 'raw',
                            'header' => 'Nama Peminta/Pemohon',
                            'value' => '$data->nIM->NAMA',
                            'filter' => '',
                            //'filter'=>Chtml::listData(Surijincuti::model()->findAll(),'IDIJINCUTI','nIM.NAMA')
                        ),
                        'nIM.iDPRODI.NAMAPRODI',
                        'LAMAIJINCUTI',
                        array(
                            'header' => 'Cetak Permohonan Cuti',
                            'type' => 'raw',
                            'value' => 'CHtml::link("Cetak ",array("cetak/surpermohonanijincuti","id"=>$data->primaryKey),array ("target"=>"_blank","class"=>"btn btn-gradient-primary"))',
                        ),
                        array(
                            'header' => 'Cetak Izin Cuti by Dekan',
                            'type' => 'raw',
                            'value' => '$data->cetakbytgl',
                        ),
                        array(
                            'header' => 'Action',
                            'type' => 'raw',
                            'value' => '$data->listactionnotifikasi',
                            'htmlOptions' => array('style' => 'width:12%'),
                        ),
                        
                        array(
                            'name' => 'ACCSUBKOR',
                            'type' => 'raw',
                            'filter' => '',
                            'header' => 'Acc Sub Kordinator',
                            'value' => 'CHtml::label($data->getAccsubkor(),"",array("onClick"=>"tes1(\'$data->IDIJINCUTI\',$row,\'$data->IDIJINCUTI\')","id"=>"label_$row","class"=>"btn btn-sm red"));'
                        ),
                        array(
                            'name' => 'ACCDEKANAT',
                            'type' => 'raw',
                            'filter' => '',
                            'header' => 'Acc Dekanat',
                            'value' => 'CHtml::label($data->getAccdekanat(),"",array("onClick"=>"tes2(\'$data->IDIJINCUTI\',$row,\'$data->IDIJINCUTI\')","id"=>"label_$row","class"=>"btn btn-sm green"));'
                        ),
						array(
                            'name' => 'ACCSURIJINCUTI',
                            'filter' => '',
                            'type' => 'raw',
                            'header' => 'Status Surat',
                            'value' => 'CHtml::label($data->getStatussurat(),"",array("onClick"=>"tes(\'$data->IDIJINCUTI\',$row,\'$data->IDIJINCUTI\')","id"=>"label_$row","class"=>"btn btn-sm blue"));'
                            //'value'=>'CHtml::label($data->ACCSURIJINCUTI=="Approve"?$data->ACCSURIJINCUTI:"Pending","",array("onClick"=>"tes(\'$data->IDIJINCUTI\',$row,\'$data->IDIJINCUTI\')","id"=>"label_$row","class"=>"btn btn-sm blue"));'
                        ),

                        array(
                            'header' => 'Generate Aktif Kembali ',
                            'name' => 'SETGENERATEAKTIF',
                            'filter' => '',
                            'type' => 'raw',
                            'value' => '$data->generatestatus',
                        ),
                    ),
                )); ?>
            </div>
            <?php echo CHtml::link('List Aktif Kembali Cuti &nbsp<i class="fa fa-user"></i>', array('suraktifcuti/admin'), array('class' => 'btn btn-gradient-primary'));
            ?>
        </div>
    </div>
    <!--ajaxacc surat by admin-->
    <?php
    $url1 = CController::createUrl('/surijincuti/AjaxAcc/');
    $url2 = CController::createUrl('/surijincuti/Ajaxsubkor/');
    $url3 = CController::createUrl('/surijincuti/Ajaxdekanat/');
    $js = <<< JSCRIPT
 
function tes(IDIJINCUTI,row,IDIJINCUTI){
 
$('#editData').dialog('open');
var label = $('#label_'+row+'').text();
$('#ACCSURIJINCUTI').val(label);
$('#IDIJINCUTI').val(IDIJINCUTI);
$('#IDIJINCUTI').val(IDIJINCUTI);
$('#row').val(row);
 
}

function tes1(IDIJINCUTI,row,IDIJINCUTI){
 
$('#editSubkor').dialog('open');
var label = $('#label_'+row+'').text();
$('#ACCSUBKOR').val(label);
$('#IDIJINCUTI').val(IDIJINCUTI);
$('#IDIJINCUTI').val(IDIJINCUTI);
$('#row').val(row);
 
}

function tes2(IDIJINCUTI,row,IDIJINCUTI){
 
$('#editDekanat').dialog('open');
var label = $('#label_'+row+'').text();
$('#ACCDEKANAT').val(label);
$('#IDIJINCUTI').val(IDIJINCUTI);
$('#IDIJINCUTI').val(IDIJINCUTI);
$('#row').val(row);
 
}
 
function update(){
var ACCSURIJINCUTI  = $('#ACCSURIJINCUTI').val();
var IDIJINCUTI = $('#IDIJINCUTI').val();
var IDIJINCUTI = $('#IDIJINCUTI').val();
var row = $('#row').val();
$('#editData').dialog('close');
$.post("${url1}", { ACCSURIJINCUTI:ACCSURIJINCUTI,IDIJINCUTI:IDIJINCUTI,IDIJINCUTI:IDIJINCUTI},
        function(data){
           $('#label_'+row+'').text(data.ACCSURIJINCUTI);
           document.location.reload(true);
           alert('Permintaan surat telah diupdate menjadi '+data.ACCSURIJINCUTI+' ');
        }, "json");
 
}

function update2(){
var ACCSUBKOR  = $('#ACCSUBKOR').val();
var IDIJINCUTI = $('#IDIJINCUTI').val();
var IDIJINCUTI = $('#IDIJINCUTI').val();
var row = $('#row').val();
$('#editSubkor').dialog('close');
$.post("${url2}", 
        
        { ACCSUBKOR:ACCSUBKOR,IDIJINCUTI:IDIJINCUTI,IDIJINCUTI:IDIJINCUTI},
        function(data){
           $('#label_'+row+'').text(data.ACCSUBKOR);
           document.location.reload(true);
           alert('Permintaan surat telah diupdate menjadi '+data.ACCSUBKOR+' ');
        }, "json");
 
}

function update3(){
var ACCDEKANAT  = $('#ACCDEKANAT').val();
var IDIJINCUTI = $('#IDIJINCUTI').val();
var IDIJINCUTI = $('#IDIJINCUTI').val();
var row = $('#row').val();
$('#editDekanat').dialog('close');
$.post("${url3}", 
        
        { ACCDEKANAT:ACCDEKANAT,IDIJINCUTI:IDIJINCUTI,IDIJINCUTI:IDIJINCUTI},
        function(data){
           $('#label_'+row+'').text(data.ACCDEKANAT);
           document.location.reload(true);
           alert('Permintaan surat telah diupdate menjadi '+data.ACCDEKANAT+' ');
        }, "json");
 
}
 
JSCRIPT;
    Yii::app()->clientScript->registerScript('disable_keluar', $js, CClientScript::POS_BEGIN);
    ?>
    <?php
    // ----- Dialog EditData ----------------------
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'editData',
            'options' => array(
                'title' => '<<<< Acc Permintaan/Permohanan Surat >>>> ',
                'autoOpen' => false,
                'minWidth' => 400,
                'minHeight' => 100,
                'resizable' => false,
                'modal' => true,
                'show' => 'blind',
                'hide' => 'explode',
            ),
        )
    );
    ?>
    <div class="from-group">
        <?php
        echo CHtml::label('Beri Acc Surat', 'ACCSURIJINCUTI') . '&nbsp;:&nbsp;';
        echo CHtml::dropDownList('ACCSURIJINCUTI', '', array('Approve' => 'Yes', 'Not Approved' => 'No'));
        echo CHtml::hiddenField('IDIJINCUTI', '');
        echo CHtml::hiddenField('IDIJINCUTI', '');
        echo CHtml::hiddenField('row', '');
        echo '&nbsp;';
        echo CHtml::button('<< Simpan >>', array("onClick" => "update()", 'class' => 'btn purple'));

        ?>
    </div>

    <?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');
    // ----- End dialog Edit Data ----------------------
    ?>


    <?php
    // ----- Dialog EditData ----------------------
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'editSubkor',
            'options' => array(
                'title' => '<<<< Acc Subkor >>>> ',
                'autoOpen' => false,
                'minWidth' => 400,
                'minHeight' => 100,
                'resizable' => false,
                'modal' => true,
                'show' => 'blind',
                'hide' => 'explode',
            ),
        )
    );
    ?>
    <div class="from-group">
        <?php
        echo CHtml::label('Beri Acc Surat', 'ACCSUBKOR') . '&nbsp;:&nbsp;';
        echo CHtml::dropDownList('ACCSUBKOR', '', array('Approve' => 'Yes', 'Not Approved' => 'No'));
        echo CHtml::hiddenField('IDIJINCUTI', '');
        echo CHtml::hiddenField('IDIJINCUTI', '');
        echo CHtml::hiddenField('row', '');
        echo '&nbsp;';
        echo CHtml::button('<< Simpan >>', array("onClick" => "update2()", 'class' => 'btn purple'));

        ?>
    </div>

    <?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');
    // ----- End dialog Edit Data ----------------------
    ?>



    <?php
    // ----- Dialog EditData ----------------------
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'editDekanat',
            'options' => array(
                'title' => '<<<< Acc Dekanat >>>> ',
                'autoOpen' => false,
                'minWidth' => 400,
                'minHeight' => 100,
                'resizable' => false,
                'modal' => true,
                'show' => 'blind',
                'hide' => 'explode',
            ),
        )
    );
    ?>
    <div class="from-group">
        <?php
        echo CHtml::label('Beri Acc Surat', 'ACCDEKANAT') . '&nbsp;:&nbsp;';
        echo CHtml::dropDownList('ACCDEKANAT', '', array('Approve' => 'Yes', 'Not Approved' => 'No'));
        echo CHtml::hiddenField('IDIJINCUTI', '');
        echo CHtml::hiddenField('IDIJINCUTI', '');
        echo CHtml::hiddenField('row', '');
        echo '&nbsp;';
        echo CHtml::button('<< Simpan >>', array("onClick" => "update3()", 'class' => 'btn purple'));

        ?>
    </div>

    <?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');
    // ----- End dialog Edit Data ----------------------
    ?>
    

