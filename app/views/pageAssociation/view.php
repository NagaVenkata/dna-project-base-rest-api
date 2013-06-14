<?php
$this->breadcrumbs[Yii::t('crud', 'Page Associations')] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
	<?php echo Yii::t('crud', 'Page Association') ?> <small><?php echo Yii::t('crud', 'View') ?> #<?php echo $model->id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<h2>
	<?php echo Yii::t('crud', 'Data') ?></h2>

<p>
	<?php
	$this->widget('TbDetailView', array(
		'data' => $model,
		'attributes' => array(
			'id',
			array(
				'name' => 'page_id',
				'value' => ($model->page !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->page->title, array('page/view', 'id' => $model->page->id), array('class' => 'btn')) : 'n/a',
				'type' => 'html',
			),
			'ordinal',
			'title',
			'created',
			'modified',
			array(
				'name' => 'viz_view_id',
				'value' => ($model->vizView !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->vizView->title, array('vizView/view', 'id' => $model->vizView->id), array('class' => 'btn')) : 'n/a',
				'type' => 'html',
			),
			array(
				'name' => 'video_file_id',
				'value' => ($model->videoFile !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->videoFile->title, array('videoFile/view', 'id' => $model->videoFile->id), array('class' => 'btn')) : 'n/a',
				'type' => 'html',
			),
			array(
				'name' => 'teachers_guide_id',
				'value' => ($model->teachersGuide !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->teachersGuide->title, array('teachersGuide/view', 'id' => $model->teachersGuide->id), array('class' => 'btn')) : 'n/a',
				'type' => 'html',
			),
			array(
				'name' => 'exercise_id',
				'value' => ($model->exercise !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->exercise->title, array('exercise/view', 'id' => $model->exercise->id), array('class' => 'btn')) : 'n/a',
				'type' => 'html',
			),
			array(
				'name' => 'presentation_id',
				'value' => ($model->presentation !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->presentation->title, array('presentation/view', 'id' => $model->presentation->id), array('class' => 'btn')) : 'n/a',
				'type' => 'html',
			),
			array(
				'name' => 'data_chunk_id',
				'value' => ($model->dataChunk !== null) ? '<span class=label>CBelongsToRelation</span><br/>' . CHtml::link($model->dataChunk->title, array('dataChunk/view', 'id' => $model->dataChunk->id), array('class' => 'btn')) : 'n/a',
				'type' => 'html',
			),
		),
	));
	?></p>


<h2>
	<?php echo Yii::t('crud', 'Relations') ?></h2>
