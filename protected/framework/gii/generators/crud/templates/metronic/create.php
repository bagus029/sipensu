<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="portlet box green ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-reorder"></i> Data Baru
		</div>
		<div class="tools">
			
		</div>
	</div>
    <div class="portlet-body form">
        <?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
    </div>
</div>