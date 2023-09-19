<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card mb-12">
            <div class="card-body">
                <h4 class="card-title"> View Permintaan Surat Ijin Survei  #<?php echo $model->IDISU; ?> </h4>
                <?php $this->widget('zii.widgets.CDetailView', array(
                    'data'=>$model,
                    'htmlOptions' => array('class'=> 'table table-bordered table-striped table-advance table-hover'),
                    'attributes'=>array(
                        'IDISU',
                        'iDJENISSURAT.NAMAJENISSURAT',
                        'NOISU',
                        'INSTANSIISU',
                        'ALAMATINSTANSIISU',
                        'KOTAINSTANSIISU',
                        'iDTASEMESTER.TAHUNAKADEMIK',
                        'iDTASEMESTER.SEMESTER',
                        'iDMATAKULIAHISU.NAMAMATAKULIAHISU',
                        'iDMATAKULIAHISU.iDTTD.NAMATTD',
                        'KETERANGANISU',
                        'TGLSUBMITISU',
                        'ACCSURISU',
                        array(
                            'type'=>'raw',
                            'value'=>  CHtml::link('List Permintaan Surat  <i class="fa fa-search"></i>' ,array('surisu/admin'),array('class'=>'btn btn-info')).''.
                                CHtml::link('Hapus  <i class="fa fa-times"></i>',array('surisu/deletebyowner','id'=>$model->IDISU),array('class'=>'btn btn-danger','confirm'=>'Hapus data ?')).''.
                                CHtml::link('Edit  <i class="fa fa-edit"></i>',array('surisu/update','id'=>$model->IDISU),array('class'=>'btn btn-warning ')),
                        )
                    ),
                )); ?>
            </div>
        </div>
    </div>
</div>

<!--membuat menu untuk mengirim permintaan srt.tugas ke divisi umum & perlengkapan -->

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card mb-12">
            <div class="card-body">
                <h4 class="card-title">View Group Mahasiswa Ijin Survei   #<?php echo $model->IDISU; ?></h4>
                <i class="fa fa-cogs"></i> Group Mahasiswa Peminta/Pemohon Srt.Ijin Survei
                <?php
                //menampilkan list
                $listgroupmahasiswasurisu=new CActiveDataProvider('Groupsurisu',array('criteria'=>array('condition'=>'IDISU='.$model->IDISU)));
                $this->widget('ext.GroupGridView', array(
                    'id'=>'groupsurisu-grid',
                    'dataProvider'=>$listgroupmahasiswasurisu,
                    'itemsCssClass' => 'table table-bordered table-striped table-advance table-hover',
                    'columns'=>array(
                        //'IDISU',
                        //'IDGROUPSURISU',
                        'NIM',
                        'nIM.NAMA',
                        'nIM.iDPRODI.NAMAPRODI',
                        'NOURUTGROUPSURISU',
                        array(
                            'header'=>'Action',
                            'htmlOptions'=>array('style'=>'width:60px'),
                            'class' => 'CButtonColumn',
                            'template' => ' {update} {delete}',
                            'buttons' => array(
                                'view' => array(
                                    //'label'=>'View',
                                    //'url'=>'Yii::app()->createUrl("/groupsurisu/view", array("id" => $data->IDGROUPSURISU))',
                                ),
                                'update' => array(
                                    'label' => 'Update',
                                    'url' => 'Yii::app()->createUrl("/groupsurisu/update", array("id" => $data->IDGROUPSURISU))',
                                ),
                                'delete' => array(
                                    'label' => 'delete',
                                    'url' => 'Yii::app()->createUrl("/groupsurisu/delete", array("id" => $data->IDGROUPSURISU))',
                                ),
                            ),
                        ),
                    ),
                ));

                ?>
                <?php
                $a=$model->IDISU;
                $sql="select IDISU from detailsurisu where IDISU='$a'";
                $b=  Yii::app()->db->createCommand($sql)->queryScalar();

                if($b==0){
                    echo CHtml::link('Tambah Mahasiswa &nbsp<i class="fa fa-user"></i>',array('groupsurisu/create','IDISU'=>$model->IDISU),array('class'=>'btn btn-primary'));
                }
                else
                {
                    echo "Group Mahasiswa sudah terkirim..";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card mb-12">
            <div class="card-body">
                <h4 class="card-title">
                    <button class="btn btn-warning" tabindex="-1" type="button">NOTE :</button>
                    <?php
                    array(
                        'value'=>$model->getListsendsurisu($model->IDISU) ,
                    );
                    ?></h4>
                <?php
                $a=$model->IDISU;
                $sql="select IDISU from detailsurisu where IDISU='$a'";
                $b=  Yii::app()->db->createCommand($sql)->queryScalar();

                if($b==0){
                    echo CHtml::link('Ajukan permintaan/permohonan surat.... &nbsp<i class="fa fa-arrow-circle-right"></i>',array('detailsurisu/create','IDISU'=>$model->IDISU),array('class'=>'btn btn-primary'));
                }
                else
                {
                    echo "Data sudah terkirim...";
                }
                ?>
            </div>
        </div>
    </div>
</div>


<!--jika surat permohonan sudah diajukan tombol pengajuan hilang jika belum akan -->
<!--update preview notifikasi setelah action view dilakukan-->
<?php
$IDISU = Yii::app()->request->getParam('id', 0);
$smod4el = Surisu::model()->updateByPk
($IDISU, array("PREVIEW" => 'Y'));
?>
  