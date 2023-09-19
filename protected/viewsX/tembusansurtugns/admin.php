
<div class="portlet box yellow">
<div class="portlet-title">
  <div class="caption">
	<i class="fa fa-cogs"></i> Tembusan Surat Tugas Pembicara/Narasumber  </div>
    <div class="actions">
        <?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah',array('create'),array('class'=>'btn btn-sm blue'));?>    </div>  
</div>
<div class="portlet-body">
<div class="table-responsive">

<?php
/* @var $this ProdiController */
/* @var $model Prodi */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tembusansurtugns-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tembusansurtugns-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'itemsCssClass' => 'table table-bordered table-striped table-advance table-hover',
	'columns'=>array(
		'IDTEMBUSAN',
		//'IDSURTUGNS',
                'iDSURTUGNS.INSTANSINS',
                'iDSURTUGNS.ALAMATINSTANSINS',
                'iDSURTUGNS.nIP.NAMA2',
		'TUJUANTEMBUSAN',
		//'TGLSUBMITTEMBUSAN',
		array(
			'class'=>'CButtonColumn',
			'htmlOptions' => array(
                        'style' => 'width:75px;text-align:center;'
                    )
                    ),
	),
)); ?>
</div>
</div>
</div>

