<?php Yii::app()->clientScript->registerCoreScript('jquery2'); ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Manage Surat Tugas Monitoring Praktik Kerja (Prodi D3)</h4>
        </div>
        <div class="card-body">
            <?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah', array('create'), array('class' => 'btn btn-primary waves-effect waves-float waves-light')); ?>    </div>
    </div>

             <div class="portlet-body">
                <div class="table-responsive">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'surtugmonitoring-grid',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        //'template' => "{summary}\n{items}\n{exportbuttons}\n{pager}",
                        'itemsCssClass' => 'table table-bordered table-striped table-advance table-hover',
                        'columns' => array(

                            //'IDSURTUGMONITORING',
                            //'IDJENISSURAT',
                            //'NOSURTUGMONITORING',
                            //'iDSUBDETAILSURPELPK.IDPK',
                            array(
                                'type' => 'raw',
                                'header' => 'No.Surat Monitoring',
                                'value' => '$data->listbuatnosurtugmonitoring',

                            ),
                            'iDSUBDETAILSURPELPK.iDPK.INSTANSIPK',
                            //'iDSUBDETAILSURPELPK.iDPK.ALAMATINSTANSIPK',
                            //'iDSUBDETAILSURPELPK.iDPK.KOTAINSTANSIPK',
                            'iDSUBDETAILSURPELPK.TGLMULAISURPELPK',
                            'iDSUBDETAILSURPELPK.TGLAKHIRSURPELPK',
                            array(
                                'name' => 'NIP',
                                'type' => 'raw',
                                'header' => 'Dosen Monitoring',
                                'value' => '$data->nIP->NAMA2',
                                'filter' => Chtml::listData(Surtugmonitoring::model()->findAll(), 'NIP', 'nIP.NAMA2')
                            ),

                            array(

                                'header' => 'Group Mahasiswa',
                                'value' => '$data->listtambahmahasiswasurtugmonitoring',
                            ),
                            //'nIP.NAMA2',

                            //'KETERANGANSURTUGMONITORING',
                            //'TGLSUBMITSURTUGMONITORING',
                            /*array(
                                'header'=>'Cetak Surat',
                                'type'=>'raw',
                            'value'=>'CHtml::link("Cetak",array("cetak/surtugmonitoring","id"=>$data->primaryKey),array ("target"=>"_blank","class"=>"btn btn-sm yellow"))',
                            ),*/
                            array(
                                'header' => 'Cetak Surat',
                                'type' => 'raw',
                                'value' => '$data->cetakbytgl',
                            ),
                            array(
                                'header' => 'Action',
                                'type' => 'raw',
                                'value' => '$data->listactionnotifikasi',
                                'htmlOptions' => array('style' => 'width:9%'),
                            ),
                            /*array(

                                            'header'=>'Action',
                                'class'=>'CButtonColumn',
                                            'template'=>'{view}{update}',
                                            'deleteConfirmation'=>'Anda yakin akan menghapus data?',
                                            'viewButtonImageUrl'=>false,
                                            //'deleteButtonImageUrl'=>false,
                                            'updateButtonImageUrl'=>false,


                                            'viewButtonOptions'=>array('class'=>'btn btn-sm blue  tooltips','data-placement'=>'top',
                                                'data-original-title'=>'Lihat ','title'=>'Lihat ','style'=>'margin-right:3px'),
                                            //'deleteButtonOptions'=>array('class'=>'btn btn-sm red tooltips','data-placement'=>'top',
                                            //    'data-original-title'=>'Hapus','title'=>'Hapus','style'=>'margin-right:3px'),
                                            'updateButtonOptions'=>array('class'=>'btn btn-sm green tooltips','data-placement'=>'top',
                                                'data-original-title'=>'Update','title'=>'Edit','style'=>'margin-right:3px'),


                                            'htmlOptions'=>array('style'=>'width:90px'),
                                            'buttons'=>array(

                                                'view'=>array(
                                                    'label'=>' <i class="fa fa-search">  </i> ',

                                                    ),
                                                'update'=>array(

                                                    'label'=>' <i class="fa fa-edit">  </i> ',

                                                ),
                                               // 'delete'=>array(
                                               //     'label'=>' <i class="fa fa-times fa fa-white"> </i> ',
                                               // ),


                                            )

                            ),*/
                            array(
                                'name' => 'ACCSURTUGMONITORING',
                                'filter' => '',
                                'type' => 'raw',
                                'header' => 'Status Surat',
                                'value' => 'CHtml::label($data->getStatussurat(),"",array("onClick"=>"tes(\'$data->IDSURTUGMONITORING\',$row,\'$data->IDSURTUGMONITORING\')","id"=>"label_$row","class"=>"btn btn-sm blue"));'
                                //'value'=>'CHtml::label($data->ACCSURTUGMONITORING=="Approve"?$data->ACCSURTUGMONITORING:"Pending","",array("onClick"=>"tes(\'$data->IDSURTUGMONITORING\',$row,\'$data->IDSURTUGMONITORING\')","id"=>"label_$row","class"=>"btn btn-sm blue"));'
                            ),
                            array(
                                'name' => 'ACCSUBKOR',
                                'type' => 'raw',
                                'filter' => '',
                                'header' => 'Acc Sub Kordinator',
                                'value' => 'CHtml::label($data->getAccsubkor(),"",array("onClick"=>"tes1(\'$data->IDSURTUGMONITORING\',$row,\'$data->IDSURTUGMONITORING\')","id"=>"label_$row","class"=>"btn btn-sm red"));'
                            ),
                            array(
                                'name' => 'ACCDEKANAT',
                                'type' => 'raw',
                                'filter' => '',
                                'header' => 'Acc Dekanat',
                                'value' => 'CHtml::label($data->getAccdekanat(),"",array("onClick"=>"tes2(\'$data->IDSURTUGMONITORING\',$row,\'$data->IDSURTUGMONITORING\')","id"=>"label_$row","class"=>"btn btn-sm green"));'
                            ),
                        ),
                    )); ?>
                </div>
            </div>
        </div>
        <?php echo CHtml::link('<i class="fa fa-caret-left"></i> &nbsp; Kembali Ke Daftar Srt. Permohonan PK ', array('surperpk/admin'), array('class' => 'btn btn-outline-success waves-effect'));
        ?>
        <?php echo CHtml::link('<i class="fa fa-caret-left"></i> &nbsp; Kembali Ke Daftar Srt. Pelaksanaan PK &nbsp ', array('subdetailsurpelpk/admin'), array('class' => 'btn btn-outline-info waves-effect'));
        ?>
    </div>
</div>
<?php
$url1 = CController::createUrl('/surtugmonitoring/AjaxTtd/');
$url2 = CController::createUrl('/surtugmonitoring/Ajaxsubkor/');
$url3 = CController::createUrl('/surtugmonitoring/Ajaxdekanat/');
$js = <<< JSCRIPT
 
function tes(IDSURTUGMONITORING,row,IDSURTUGMONITORING){
 
$('#editData').dialog('open');
var label = $('#label_'+row+'').text();
$('#ACCSURTUGMONITORING').val(label);
$('#IDSURTUGMONITORING').val(IDSURTUGMONITORING);
$('#IDSURTUGMONITORING').val(IDSURTUGMONITORING);
$('#row').val(row);
 
}

function tes1(IDSURTUGMONITORING,row,IDSURTUGMONITORING){
$('#editSubkor').dialog('open');
var label = $('#label_'+row+'').text();
$('#ACCSUBKOR').val(label);
$('#IDSURTUGMONITORING').val(IDSURTUGMONITORING);
$('#IDSURTUGMONITORING').val(IDSURTUGMONITORING);
$('#row').val(row);
 
}

function tes2(IDSURTUGMONITORING,row,IDSURTUGMONITORING){
$('#editDekanat').dialog('open');
var label = $('#label_'+row+'').text();
$('#ACCDEKANAT').val(label);
$('#IDSURTUGMONITORING').val(IDSURTUGMONITORING);
$('#IDSURTUGMONITORING').val(IDSURTUGMONITORING);
$('#row').val(row);
 
}
 
function update(){
var ACCSURTUGMONITORING  = $('#ACCSURTUGMONITORING').val();
var IDSURTUGMONITORING = $('#IDSURTUGMONITORING').val();
var IDSURTUGMONITORING = $('#IDSURTUGMONITORING').val();
var row = $('#row').val();
$('#editData').dialog('close');
$.post("${url1}", { ACCSURTUGMONITORING:ACCSURTUGMONITORING,IDSURTUGMONITORING:IDSURTUGMONITORING,IDSURTUGMONITORING:IDSURTUGMONITORING},
        function(data){
           $('#label_'+row+'').text(data.ACCSURTUGMONITORING);
           document.location.reload(true);
           alert('Permintaan surat telah diupdate menjadi '+data.ACCSURTUGMONITORING+' ');
        }, "json");
 
}

function update2(){
var ACCSUBKOR  = $('#ACCSUBKOR').val();
var IDSURTUGMONITORING = $('#IDSURTUGMONITORING').val();
var IDSURTUGMONITORING = $('#IDSURTUGMONITORING').val();
var row = $('#row').val();
$('#editSubkor').dialog('close');
$.post("${url2}", 
        
        { ACCSUBKOR:ACCSUBKOR,IDSURTUGMONITORING:IDSURTUGMONITORING,IDSURTUGMONITORING:IDSURTUGMONITORING},
        function(data){
           $('#label_'+row+'').text(data.ACCSUBKOR);
           document.location.reload(true);
           alert('Permintaan surat telah diupdate menjadi '+data.ACCSUBKOR+' ');
        }, "json");
 
}

function update3(){
var ACCDEKANAT  = $('#ACCDEKANAT').val();
var IDSURTUGMONITORING = $('#IDSURTUGMONITORING').val();
var IDSURTUGMONITORING = $('#IDSURTUGMONITORING').val();
var row = $('#row').val();
$('#editDekanat').dialog('close');
$.post("${url3}", 
        
        { ACCDEKANAT:ACCDEKANAT,IDSURTUGMONITORING:IDSURTUGMONITORING,IDSURTUGMONITORING:IDSURTUGMONITORING},
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
    echo CHtml::label('Beri Acc Surat', 'ACCSURTUGMONITORING') . '&nbsp;:&nbsp;';
    echo CHtml::dropDownList('ACCSURTUGMONITORING', '', array('Approve' => 'Yes', 'Not Approved' => 'No'));
    echo CHtml::hiddenField('IDSURTUGMONITORING', '');
    echo CHtml::hiddenField('IDSURTUGMONITORING', '');
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
    echo CHtml::hiddenField('IDSURTUGMONITORING', '');
    echo CHtml::hiddenField('IDSURTUGMONITORING', '');
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
    echo CHtml::hiddenField('IDSURTUGMONITORING', '');
    echo CHtml::hiddenField('IDSURTUGMONITORING', '');
    echo CHtml::hiddenField('row', '');
    echo '&nbsp;';
    echo CHtml::button('<< Simpan >>', array("onClick" => "update3()", 'class' => 'btn purple'));

    ?>
</div>

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
// ----- End dialog Edit Data ----------------------
?>
