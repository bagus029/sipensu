<div class="portlet box red">
<div class="portlet-title">
  <div class="caption">
	<i class="fa fa-cogs"></i>Data Permintaan Surat Keterangan Tidak Menerima Beasiswa</div>
	
        
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
	$.fn.yiiGridView.update('Mahasiswa-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
         'id'=>'surketnobeswa-grid',
	'dataProvider'=>$dataProvider,
        'columns'=>array(
            'IDSURKETNOBESWA',
		'IDJENISSURAT',
		'NOSURKETNOBESWA',
		'NIM',
		'iDTASEMESTER.TAHUNAKADEMIK',
		'iDTASEMESTER.SEMESTER',
		/*
                'KEPERLUANSURKETNOBESWA',
		'KETERANGANSURKETNOBESWA',
		'TGLSUBMITSURKETNOBESWA',
                'ACCSURKETNOBESWA',
		*/
array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}',
                        'header'=>'Aksi',
                        
		)),
)); ?>
<div class="actions">
        <?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah',array('create'),array('class'=>'btn btn-sm blue','disabled'=>true));?>
        <?php echo CHtml::link('Manage',array('admin'),array('class'=>'btn btn-sm blue'));?>
</div> 
    
</div>
</div>