<div class="portlet box yellow">
<div class="portlet-title">
  <div class="caption">
	<i class="fa fa-cogs"></i> Manage Golongan Darah  </div>
    <div class="actions">
        <?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah',array('create'),array('class'=>'btn btn-sm blue'));?>    </div>  
</div>

<div class="portlet-body">
<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'goldarah-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-bordered table-striped table-advance table-hover',
	'columns'=>array(
		'IDGOLDAR',
		'NAMAGOLDAR',
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
