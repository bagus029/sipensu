<div class="portlet box yellow">
<div class="portlet-title">
  <div class="caption">
	<i class="fa fa-pencil-square-o"></i> View Jurusan #<?php echo $model->IDJURUSAN; ?>  </div>
</div>

<div class="portlet-body">
    
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions' => array('class'=> 'table table-bordered table-striped table-advance table-hover'),
	'attributes'=>array(
                'IDJURUSAN',
		'NAMAJURUSAN',
	),
));

//echo CHtml::link('<i class="fa fa-plus"></i> Tambah Jurusan',array('jurusan/create','IDJURUSAN'=>$model->IDJURUSAN),array('class'=>'btn btn-sm yellow'));
echo CHtml::link('Manage Jurusan',array('jurusan/admin'),array('class'=>'btn btn-default blue'));
?>
</div>