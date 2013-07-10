<div class="row">
	<div class="span8"> <!-- main inputs -->


		<?php echo $form->textFieldRow($model, 'title', array('maxlength' => 255)); ?>

		<?php
		echo $form->relationRow($model, 'data_source_id', array(
			'model' => $model,
			'relation' => 'dataSource',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<?php
		$formId = 'spreadsheet-file-data_source_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'Data Source'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/dataSource/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#SpreadsheetFile_data_source_id',
			'model' => new DataSource,
			'pk' => 'id',
			'field' => 'title',
		));
		$this->endClip();
		?>


		<?php
		echo $form->relationRow($model, 'original_media_id', array(
			'model' => $model,
			'relation' => 'originalMedia',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<?php
		$formId = 'spreadsheet-file-original_media_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/p3Media/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#SpreadsheetFile_original_media_id',
			'model' => new P3Media,
			'pk' => 'id',
			'field' => 'title',
		));
		$this->endClip();
		?>


		<?php
		echo $form->relationRow($model, 'processed_media_id', array(
			'model' => $model,
			'relation' => 'processedMedia',
			'fields' => 'title',
			'allowEmpty' => true,
			'style' => 'dropdownlist',
			'htmlOptions' => array(
				'checkAll' => 'all',
			),
		));
		?>

		<?php
		$formId = 'spreadsheet-file-processed_media_id-' . \uniqid() . '-form';
		?>

		<div class="control-group">
                        <div class="controls">
				<?php
				echo $this->widget('bootstrap.widgets.TbButton', array(
					'label' => Yii::t('crud', 'Create {model}', array('{model}' => Yii::t('crud', 'P3 Media'))),
					'icon' => 'icon-plus',
					'htmlOptions' => array(
						'data-toggle' => 'modal',
						'data-target' => '#' . $formId . '-modal',
					),
				    ), true);
				?>
                        </div>
		</div>

		<?php
		$this->beginClip('modal:' . $formId . '-modal');
		$this->renderPartial('/p3Media/_modal_form', array(
			'formId' => $formId,
			'inputSelector' => '#SpreadsheetFile_processed_media_id',
			'model' => new P3Media,
			'pk' => 'id',
			'field' => 'title',
		));
		$this->endClip();
		?>

	</div> <!-- main inputs -->


	<div class="span4"> <!-- sub inputs -->

	</div> <!-- sub inputs -->
</div>