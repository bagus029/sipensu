<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'surijinpn-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal','role'=>'form'),
)); ?>

	<div class="form-body">
	<?php echo $form->errorSummary($model,'<b>Silahkan perbaiki kesalahan berikut :</b> ','',array('class'=>'alert alert-danger')); ?>
           
        <div class="form-group">
		<?php echo $form->labelEx($model,'IDJENISSURAT',array('class'=>'col-md-3 control-label'));?>
		<!--<div class="col-md-1">
                <?php //echo $form->textField($model,'IDJENISSURAT',array('size'=>10,'maxlength'=>10,'class'=>'form-control','disabled'=>true)); ?>
                </div>-->
                    <div class="col-md-4">
            <?php echo $form->labelEx($model,'Surat Ijin Penelitian',array('size'=>50,'maxlength'=>50,'class'=>'form-control','disabled'=>true)); ?>
		
		
		<?php echo $form->error($model,'IDJENISSURAT'); ?>
                </div>
	</div>

	 <div class="form-group">
            <?php echo $form->labelEx($model,'NIM',array('class'=>'col-md-3 control-label')); ?>
             <div class="col-md-4">
                <?php
                    $connection = Yii::app()->db;
                    $sql = "select NIM,  CONCAT(NIM,' - ',NAMA) as NAMA from mahasiswa";
                    $command = $connection->createCommand($sql);
                    $results = $command->queryAll();
                    ?>
                    <?php echo CHtml::activeDropDownList($model, 'NIM', CHtml::listData($results,  'NIM','NAMA'),array('empty'=>'----Pilih NIM----','class'=>'form-control','disabled'=>true),
                            array(
                                'class'=>'form-control select2me',
                                'ajax' => array(
                                'type'=>'POST', //request type
                                
                                //Style: CController::createUrl('currentController/methodToCall')
                              
                                //'data'=>'js:javascript statement' 
                                //leave out the data key to pass all form values through
                                )
                                
                                )); ?> 
		<?php echo $form->error($model,'NIM'); ?>
		</div>
	</div> 
	<hr>
	
        <div class="form-group has-error">
		<?php echo $form->labelEx($model,'NOSURATIJINPN',array('class'=>'col-md-3 control-label'));?>
		<div class="col-md-2">
                    <div class="input-icon right">
                        <i class="fa fa-exclamation tooltips" data-container="body" data-original-title="please write a valid number"></i>
                    </div>
		<?php echo $form->textField($model,'NOSURATIJINPN',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'NOSURATIJINPN'); ?>
                </div>
	</div>
            
       <div class="form-group">
		<?php echo $form->labelEx($model,'TGLCETAKSURATIJINPN',array('class'=>'col-md-3 control-label date-picker'));?>
		<div class="col-md-2">
                <?php 
		$this->widget ('zii.widgets.jui.CJuiDatePicker', array (
                 //you must specify name or model/attribute
                 'model'=>$model,
                 'attribute'=>'TGLCETAKSURATIJINPN', 
                 'value'=>$model->TGLCETAKSURATIJINPN,
                 'options'=>array(
                         'dateFormat'=>'yy-mm-dd',
                         //'showOn'=>'button',
                         'yearRange'=>'-60',
                         'changeMonth'=>'true',
                         'changeYear'=>'true',
                         'constrainInput'=>'false',
                         'duration'=>'fast',
                         'showAnim'=>'fold',
			 'showAnim'=>'slide',
                         ),
                         'htmlOptions'=>array('class'=>'form-control input-medium'),
                         )
                         );?>
                  <?php echo $form->error ($model,'TGLCETAKSURATIJINPN');?>
        </div>  
        </div>      

	
	
	<!--<div class="form-group">
		<?php //echo $form->labelEx($model,'TGLSUBMITIJINPN',array('class'=>'col-md-3 control-label')); ?>
                <div class="col-md-5">
		<?php //echo $form->textField($model,'TGLSUBMITIJINPN'); ?>
		<?php //echo $form->error($model,'TGLSUBMITIJINPN'); ?>
                </div>
	</div>-->

	</div>
	
	<div class="form-actions fluid">
		<div class="col-md-offset-3 col-md-9">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Update',array('class'=>'btn btn-primary')); ?>
		<?php //if(!$model->isNewRecord) echo CHtml::link('Manage ',array('surijinpn/admin','IDIJINPN'=>$model->IDIJINPN),array('class'=>'btn yellow')) ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

<!-- form -->