<?php
/* @var $this SurketnobeswaController */
/* @var $model Surketnobeswa */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'htmlOptions'=>array('class'=>'form-horizontal','role'=>'form'),
)); ?>
        
        <!--<div class="form-group">
		<?php //echo $form->labelEx($model,'Program Studi',array('class'=>'col-md-3 control-label')); ?>
		<div class="col-md-4">
		<?php //echo $form->dropDownList($model,'NIM',
		  // CHtml::listData(Prodi::model()->findAll(array('order'=>'IDPRODI')), 'IDPRODI','NAMAPRODI'),array('empty'=>'----Pilih Prodi----','class'=>'form-control select2me')); ?>
             
		</div>
	</div>
          <div class="form-group">
            <?php //echo $form->labelEx($model,'NIM',array('class'=>'col-md-3 control-label')); ?>
             <div class="col-md-4">
                <?php
                    //$connection = Yii::app()->db;
                   // $sql = "select NIM,  CONCAT(NIM,' - ',NAMA) as NAMA from mahasiswa ";
                    //$command = $connection->createCommand($sql);
                    //$results = $command->queryAll();
                    ?>
                    <?php //echo CHtml::activeDropDownList($model, 'NIM', CHtml::listData($results,  'NIM','NAMA'),array('empty'=>'----Pilih NIM----','class'=>'form-control select2me'),
                            //array(
                             //   'class'=>'form-control select2me',
                             //   )); ?> 
		<?php //echo $form->error($model,'NIM'); ?>
		</div>
	</div>  -->
         <div class="form-group">
		<?php echo $form->labelEx($model,'Program Studi',array('class'=>'col-md-3 control-label')); ?>
		<div class="col-md-4">
		<?php echo $form->dropDownList($model,'cariprodi',
		   CHtml::listData(Prodi::model()->findAll(array('order'=>'IDPRODI')), 'IDPRODI','NAMAPRODI'),array('empty'=>'----Pilih Prodi----','class'=>'form-control select2me')); ?>
             
		</div>
	</div>  
	<!--<div class="row">
		<?php //echo $form->label($model,'IDSURKETNOBESWA'); ?>
		<?php //echo $form->textField($model,'IDSURKETNOBESWA'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'IDJENISSURAT'); ?>
		<?php //echo $form->textField($model,'IDJENISSURAT'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'NOSURKETNOBESWA'); ?>
		<?php //echo $form->textField($model,'NOSURKETNOBESWA',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'NIM'); ?>
		<?php //echo $form->textField($model,'NIM',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'TAHUNAKADEMIK'); ?>
		<?php //echo $form->textField($model,'TAHUNAKADEMIK',array('size'=>9,'maxlength'=>9)); ?>
	</div>
        
        <div class="row">
		<?php //echo $form->label($model,'SEMESTER'); ?>
		<?php //echo $form->textField($model,'SEMESTER',array('size'=>9,'maxlength'=>9)); ?>
	</div>
	
	<div class="row">
		<?php //echo $form->label($model,'KETERANGANSURKETNOBESWA'); ?>
		<?php //echo $form->textArea($model,'KETERANGANSURKETNOBESWA',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'TGLSUBMITSURKETNOBESWA'); ?>
		<?php //echo $form->textField($model,'TGLSUBMITSURKETNOBESWA'); ?>
	</div>-->

	<div class="form-actions fluid">
		<div class="col-md-offset-3 col-md-9">
		<?php echo CHtml::submitButton('Search'); ?>
                </div>
	</div>


<?php $this->endWidget(); ?>

</div><!-- search-form -->