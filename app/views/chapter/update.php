<?php
$this->breadcrumbs[Yii::t('crud', 'Chapters')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('crud', 'Update');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Chapter') ?> <small><?php echo Yii::t('crud', 'Update') ?> #<?php echo $model->id ?></small></h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<h2>
	<?php echo Yii::t('crud', 'Editable Detail View') ?></h2>

<?php
$this->widget('EditableDetailView', array(
	'data' => $model,
	'url' => $this->createUrl('editableSaver'),
));
?>

<h2>
	<?php echo Yii::t('crud', 'Sections') ?>
</h2>

<div class="btn-group">
	<?php
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons' => array(
			array('label' => Yii::t("crud", "Create"), 'icon' => 'icon-plus', 'url' => array('pageAssociation/create', 'PageAssociation' => array('page_id' => $model->{$model->tableSchema->primaryKey}))),
		),
	));
	?>
</div>

<?php
$relatedSearchModel = $model->getRelatedSearchModel('sections');
$this->widget('TbGridView', array(
	'id' => 'section-grid',
	'dataProvider' => $relatedSearchModel->search(),
	'filter' => $relatedSearchModel,
	'pager' => array(
		'class' => 'TbPager',
		'displayFirstAndLast' => true,
	),
	'columns' => array(
		'id',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'title',
			'editable' => array(
				'url' => $this->createUrl('section/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'slug',
			'editable' => array(
				'url' => $this->createUrl('section/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'ordinal',
			'editable' => array(
				'url' => $this->createUrl('section/editableSaver'),
				'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'menu_label',
			'editable' => array(
				'url' => $this->createUrl('section/editableSaver'),
				'placement' => 'right',
			)
		),
		/*
		  'created',
		  'modified',
		 */
		array(
			'class' => 'TbButtonColumn',
			'viewButtonUrl' => "Yii::app()->controller->createUrl('section/view', array('id' => \$data->id))",
			'updateButtonUrl' => "Yii::app()->controller->createUrl('section/update', array('id' => \$data->id))",
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('section/delete', array('id' => \$data->id))",
		),
	),
));
?>

<h2>
	<?php echo Yii::t('crud', 'Update Form') ?></h2>

<?php
$this->renderPartial('_form', array(
	'model' => $model));
?>