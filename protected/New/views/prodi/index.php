<div class="portlet box red">
<div class="portlet-title">
  <div class="caption">
	<i class="fa fa-cogs"></i>Data Prodi</div>
	
        
</div>

<div class="portlet-body">
<div class="table-responsive">
<?php
/* @var $this ProdiController */
/* @var $dataProvider CActiveDataProvider */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('prodi-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
        <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'agama-grid',
        'dataProvider' => $dataProvider,
        'columns' => array(
            'IDPRODI',
            'KODEPRODI',
            //'KODEPRODIUNSOED',
            'iDJENJANG.NAMAJENJANG',
            'iDFAKULTAS.FAKULTAS',
            'NAMAPRODI',
            'ISAKTIF',
            'KODEPRODILAMA',
            array(
                'class' => 'CButtonColumn',
                'template' => '{view}',
                'header' => 'Aksi',
        )),
    ));
    ?>
<div class="actions">
        <?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah',array('create'),array('class'=>'btn btn-sm blue','disabled'=>true));?>
        <?php echo CHtml::link('Manage',array('admin'),array('class'=>'btn btn-sm blue'));?>
</div> 
    
</div>
</div>