<div class="wide form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
		'action' => Yii::app()->createUrl($this->route),
		'method' => 'get',
	));
	?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>

		<?php echo $form->textField($model, 'id', array('size' => 20, 'maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_en'); ?>
		<?php echo $form->textField($model, 'title_en', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'created'); ?>
		<?php echo $form->textField($model, 'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'modified'); ?>
		<?php echo $form->textField($model, 'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'data_source_id'); ?>
		<?php echo $form->dropDownList($model, 'data_source_id', CHtml::listData(DataSource::model()->findAll(), 'id', 'title_en'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'original_media_id'); ?>
		<?php echo $form->dropDownList($model, 'original_media_id', CHtml::listData(P3Media::model()->findAll(), 'id', 'title'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'processed_media_id'); ?>
		<?php echo $form->dropDownList($model, 'processed_media_id', CHtml::listData(P3Media::model()->findAll(), 'id', 'title'), array('prompt' => 'all')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_es'); ?>
		<?php echo $form->textField($model, 'title_es', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_fa'); ?>
		<?php echo $form->textField($model, 'title_fa', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_hi'); ?>
		<?php echo $form->textField($model, 'title_hi', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_pt'); ?>
		<?php echo $form->textField($model, 'title_pt', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_sv'); ?>
		<?php echo $form->textField($model, 'title_sv', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_de'); ?>
		<?php echo $form->textField($model, 'title_de', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

        <div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('crud', 'Search')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- search-form -->
