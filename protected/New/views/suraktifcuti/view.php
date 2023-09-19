<div class="portlet box yellow">
<div class="portlet-title">
  <div class="caption">
	<i class="fa fa-pencil-square-o"></i> View Permintaan Surat Aktif Kembali Cuti  #<?php echo $model->IDAKTIFCUTI; ?>  </div>
</div>

<div class="portlet-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=> 'table table-bordered table-striped table-advance table-hover'),
	'attributes'=>array(
		'IDAKTIFCUTI',
		'IDIJINCUTI',
                'iDJENISSURAT.NAMAJENISSURAT',
                'iDTASEMESTER.TAHUNAKADEMIK',
		'iDTASEMESTER.SEMESTER',
                'iDIJINCUTI.NOSURATIJINCUTI',            
                'NOSURATIJINAKTIFCUTI',
                'iDIJINCUTI.NIM',
                'iDIJINCUTI.nIM.NAMA',
                'iDIJINCUTI.nIM.iDPRODI.NAMAPRODI',
                'iDIJINCUTI.nIM.iDPRODI.iDFAKULTAS.FAKULTAS',
                'iDIJINCUTI.nIM.TAHUNANGKATAN',
                'iDIJINCUTI.nIM.ALAMATASAL',
                'iDIJINCUTI.TAAKADEMIKCUTI',
                'iDIJINCUTI.SEMESTERCUTI',
                'TAAKADEMIKAKTIFCUTI',
                'SEMESTERAKTIFCUTI',
		'STATUS',
		'NIP',
                'nIP.NAMA2',
                'KETERANGANAKTIFCUTI',
		'TGLSUBMITAKTIFCUTI',
                'ACCSURAKTIFCUTI',

                array(
                    'type'=>'raw',
                    'value'=>  CHtml::link('List Permintaan Surat  <i class="fa fa-search"></i>' ,array('suraktifcuti/admin'),array('class'=>'btn green')).''.
                               CHtml::link('Hapus  <i class="fa fa-times"></i>',array('suraktifcuti/deletebyowner','id'=>$model->IDAKTIFCUTI),array('class'=>'btn red','confirm'=>'Hapus data ?')).''.
                               CHtml::link('Edit  <i class="fa fa-edit"></i>',array('suraktifcuti/update','id'=>$model->IDAKTIFCUTI),array('class'=>'btn yellow ')),
                )
	),
)); ?>
</div>
    
<!--membuat menu untuk mengirim permintaan srt.tugas ke divisi umum & perlengkapan -->


<div class="portlet-title">
<div class="caption">
	<i class="fa fa-envelope"></i> Kirim Permintaan Surat Aktif Kembali Cuti  #<?php echo $model->IDAKTIFCUTI; ?>  </div>
        <div class="actions">
         <!--jika surat permohonan sudah diajukan tombol pengajuan hilang jika belum akan --> 
        <?php 
        $a=$model->IDAKTIFCUTI;
        $sql="select IDAKTIFCUTI from detailaktifcuti where IDAKTIFCUTI='$a'";
        $b=  Yii::app()->db->createCommand($sql)->queryScalar();
        
        if($b==0){    
        echo CHtml::link('Ajukan permintaan/permohonan surat.... <i class="fa fa-arrow-circle-right"></i>',array('detailaktifcuti/create','IDAKTIFCUTI'=>$model->IDAKTIFCUTI),array('class'=>'btn btn purple'));
         }
        else
        {
            echo "Data sudah terkirim...";
        }
        ?>
            
            
            
</div>
</div>
    
<div class="portlet-body">
<div class="portlet-title"><br>
    
            <button class="btn red" tabindex="-1" type="button">NOTE :</button>
            <?php array(      
            'value'=>$model->getListsendsuraktifcuti($model->IDAKTIFCUTI) ,
            );
            ?>
    
</div> 
</div>
<?php
$IDAKTIFCUTI = Yii::app()->request->getParam('id', 0);
$smod4el = Suraktifcuti::model()->updateByPk
        ($IDAKTIFCUTI, array("PREVIEW" => 'Y'));
?>
