<div class="portlet box yellow">
<div class="portlet-title">
  <div class="caption">
	<i class="fa fa-cogs"></i> Manage Jabatan Struktural  </div>
    <div class="actions">
        <?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah',array('create'),array('class'=>'btn btn-sm blue'));?>    </div>  
</div>

<div class="portlet-body">
<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jabatanstruktural-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-bordered table-striped table-advance table-hover',
	'columns'=>array(  
		//'IDJABATANSTRUKTURAL',
                'IDJABATANSURAT',
		'NIP',
                //'nIP.NAMA2',
                 array(
                    'name'=>'NIP',
                    //'type'=>'raw',
                    'header'=>'Nama',
                    'value'=>'$data->nIP->NAMA2',
                    'filter'=>Chtml::listData(Msdos::model()->findAll(),'NIP','NAMA2')
                	),
		'NAMAJABATANSTRUKTURAL',
		'TAHUN',
                //'iDPANGGOL.PANGKAT',
                //'iDPANGGOL.GOL',
                //'iDJABATANAKADEMIK.NAMAJABATANAKADEMIK',
		//'NOURUTJABATANSTRUKTURAL',
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
		