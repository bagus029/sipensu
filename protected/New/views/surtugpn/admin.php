<?php Yii::app()->clientScript->registerCoreScript('jquery2'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Manage Permintaan Surat Tugas Pengabdian pada Masyarakat (PPM)</h4>
            </div>
            <div class="card-body">
                <?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah', array('create'), array('class' => 'btn btn-primary waves-effect waves-float waves-light')); ?>    </div>
        </div>

<div class="portlet-body">
<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'DataTables_Table_0',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'itemsCssClass' => 'table table-sm',
	'columns'=>array(
		//'IDPN',
                //'NOSURATPN',
                array(
                     'htmlOptions'=>array('width'=>'15%'),
                    'header'=>'No.Surat',
                    'value' => '$data->listbuatnosuratpn',
                    
                ),
		//'IDJENISSURAT',
                //'iDJENISSURAT.NAMAJENISSURAT',
		
                //'JUDULPN',
                 array(
                    
                    'header'=>'Judul Penelitian',
                    'value' => '$data->JUDULPN',
                     'htmlOptions'=>array('width'=>'22%'),
                    ),
                 array(
                    'htmlOptions'=>array('width'=>'15%'),
                    'header'=>'Instansi Penelitian',
                    'value' => '$data->listinstansipn',
                    ),
		//'WAKTUDATAPN',
                //'TGLSUBMITPN',
                array(
                    'htmlOptions'=>array('width'=>'18%'),
                    'header'=>'Group Dosen',
                    'value' => '$data->listtambahdosenpn',
                    ),
                 array(  
                    'type'=>'html',
                    'header'=>'Cetak Srt.Tugas',
                     'value'=>'$data->cetakbytgl',
                ),
              
               /* array(  
                    'type'=>'html',
                    'header'=>'Cetak Srt.Ijin by Instansi',
                     'value'=>'$data->cetakbyinstansi',
                ), 
                array(
                    'header'=>'Cetak Surat',
                    'type'=>'raw',
                    'value'=>'CHtml::link("Cetak",array("cetak/surtugpn","id"=>$data->primaryKey),array ("target"=>"_blank","class"=>"btn btn-small yellow"))',
                ),*/
               
		array(
                       
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
                                'label'=>' <i data-feather="search"></i> ',
                                
                                ),
                            'update'=>array(
                                
                                'label'=>' <i data-feather="edit"></i> ',
                                
                            ),    
                           // 'delete'=>array(
                           //     'label'=>' <i class="fa fa-times fa fa-white"> </i> ',
                           // ),
                            
                            
                        )
		),
                array(
                    'name'=>'ACCSUBKOR',
                    'type'=>'raw',
                    'filter'=>'' ,
                    'header'=>'SUBKOR',
                    'value'=>'CHtml::label($data->getAccsubkor(),"",array("onClick"=>"tes1(\'$data->IDPN\',$row,\'$data->IDPN\')","id"=>"label_$row"));'

              ),
                array(
                    'name'=>'ACCDEKANAT',
                    'type'=>'raw',
                    'filter'=>'' ,
                    'header'=>'DEKANAT',
                    'value'=>'CHtml::label($data->getAccdekanat(),"",array("onClick"=>"tes2(\'$data->IDPN\',$row,\'$data->IDPN\')","id"=>"label_$row"));'
                    
               ),
        array(
            'name'=>'ACCSURTUGPN',
            'type'=>'raw',
            'filter'=>'' ,
            'header'=>'ACC SURAT',
            'value'=>'CHtml::label($data->getAccsurat(),"",array("onClick"=>"tes(\'$data->IDPN\',$row,\'$data->IDPN\')","id"=>"label_$row"));'
        ),
	),
)); ?>
</div>
</div>
</div>

<?php
$url1 = CController::createUrl('/surtugpn/AjaxTtd/');
$url2 = CController::createUrl('/surtugpn/Ajaxsubkor/');
$url3 = CController::createUrl('/surtugpn/Ajaxdekanat/');
$js = <<< JSCRIPT
 
function tes(IDPN,row,IDPN){
 
$('#editData').dialog('open');
var label = $('#label_'+row+'').text();
$('#ACCSURTUGPN').val(label);
$('#IDPN').val(IDPN);
$('#IDPN').val(IDPN);

$('#row').val(row);
 
}

function tes1(IDPN,row,IDPN){
 
        $('#editSubkor').dialog('open');
        var label = $('#label_'+row+'').text();
        $('#ACCSUBKOR').val(label);
        $('#IDPN').val(IDPN);
        $('#IDPN').val(IDPN);
        
        $('#row').val(row);
         
        }

        function tes2(IDPN,row,IDPN){
 
                $('#editDekanat').dialog('open');
                var label = $('#label_'+row+'').text();
                $('#ACCDEKANAT').val(label);
                $('#IDPN').val(IDPN);
                $('#IDPN').val(IDPN);
                
                $('#row').val(row);
                 
                }
 
function update(){
var ACCSURTUGPN  = $('#ACCSURTUGPN').val();
var IDPN = $('#IDPN').val();
var IDPN = $('#IDPN').val();

var row = $('#row').val();
$('#editData').dialog('close');
$.post("${url1}", { ACCSURTUGPN:ACCSURTUGPN,IDPN:IDPN,IDPN:IDPN},
        function(data){
           $('#label_'+row+'').text(data.ACCSURTUGPN);
           document.location.reload(true);
           alert('Permintaan surat telah diupdate menjadi '+data.ACCSURTUGPN+' ');
        }, "json");
 
}

function update2(){
        var ACCSUBKOR  = $('#ACCSUBKOR').val();
        var IDPN = $('#IDPN').val();
        var IDPN = $('#IDPN').val();
        
        var row = $('#row').val();
        $('#editSubkor').dialog('close');
        $.post("${url2}", { ACCSUBKOR:ACCSUBKOR,IDPN:IDPN,IDPN:IDPN},
                function(data){
                   $('#label_'+row+'').text(data.ACCSUBKOR);
                   document.location.reload(true);
                   alert('Permintaan surat telah diupdate menjadi '+data.ACCSUBKOR+' ');
                }, "json");
         
        }

        function update3(){
                var ACCDEKANAT  = $('#ACCDEKANAT').val();
                var IDPN = $('#IDPN').val();
                var IDPN = $('#IDPN').val();
                
                var row = $('#row').val();
                $('#editDekanat').dialog('close');
                $.post("${url3}", { ACCDEKANAT:ACCDEKANAT,IDPN:IDPN,IDPN:IDPN},
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
                'hide'=>'explode',
        ),
        )
);
?>
<div class="from-group">
<?php
echo CHtml::label('Beri Acc Surat', 'ACCSURTUGPN').'&nbsp;:&nbsp;';
echo CHtml::dropDownList('ACCSURTUGPN','',array('Approve'=>'Yes', 'Not Approved'=>'No')); 
echo CHtml::hiddenField('IDPN','');
echo CHtml::hiddenField('IDPN','');

echo CHtml::hiddenField('row','');
echo '&nbsp;';
echo CHtml::button('<< Simpan >>', array("onClick"=>"update()",'class'=>'btn purple'));

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
            'title' => '<<<< Paraf Sub Kordinator >>>> ',
            'autoOpen' => false,
            'minWidth' => 400,
            'minHeight' => 100,
            'resizable' => false,
            'modal' => true,
            'show' => 'blind',
            'hide'=>'explode',
        ),
    )
);
?>
<div class="from-group">
    <?php
    echo CHtml::label('Beri Acc Surat', 'ACCSUBKOR').'&nbsp;:&nbsp;';
    echo CHtml::dropDownList('ACCSUBKOR','',array('Approve'=>'Yes', 'Not Approved'=>'No'));
    echo CHtml::hiddenField('IDPN','');
    echo CHtml::hiddenField('IDPN','');

    echo CHtml::hiddenField('row','');
    echo '&nbsp;';
    echo CHtml::button('<< Simpan >>', array("onClick"=>"update2()",'class'=>'btn purple'));

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
            'title' => '<<<< Paraf Dekanat >>>> ',
            'autoOpen' => false,
            'minWidth' => 400,
            'minHeight' => 100,
            'resizable' => false,
            'modal' => true,
            'show' => 'blind',
            'hide'=>'explode',
        ),
    )
);
?>
<div class="from-group">
    <?php
    echo CHtml::label('Beri Acc Surat', 'ACCDEKANAT').'&nbsp;:&nbsp;';
    echo CHtml::dropDownList('ACCDEKANAT','',array('Approve'=>'Yes', 'Not Approved'=>'No'));
    echo CHtml::hiddenField('IDPN','');
    echo CHtml::hiddenField('IDPN','');

    echo CHtml::hiddenField('row','');
    echo '&nbsp;';
    echo CHtml::button('<< Simpan >>', array("onClick"=>"update3()",'class'=>'btn purple'));

    ?>
</div>

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
// ----- End dialog Edit Data ----------------------

 