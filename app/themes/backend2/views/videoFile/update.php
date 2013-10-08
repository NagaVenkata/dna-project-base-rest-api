<?php
$this->setPageTitle(
    Yii::t('model', 'Video File')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Video Files')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Video File'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Section Contents'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('sectionContent/create', 'SectionContent' => array('video_file_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'sectionContents');
$this->widget('TbGridView',
    array(
        'id' => 'sectionContent-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->sectionContents) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'name' => 'section_id',
                'value' => 'CHtml::value($data, \'section.itemLabel\')',
                'filter' => CHtml::listData(Section::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'ordinal',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'html_chunk_id',
                'value' => 'CHtml::value($data, \'htmlChunk.itemLabel\')',
                'filter' => CHtml::listData(HtmlChunk::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'viz_view_id',
                'value' => 'CHtml::value($data, \'vizView.itemLabel\')',
                'filter' => CHtml::listData(VizView::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'teachers_guide_id',
                'value' => 'CHtml::value($data, \'teachersGuide.itemLabel\')',
                'filter' => CHtml::listData(TeachersGuide::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'name' => 'exercise_id',
                    'value' => 'CHtml::value($data, \'exercise.itemLabel\')',
                    'filter' => CHtml::listData(Exercise::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'presentation_id',
                    'value' => 'CHtml::value($data, \'presentation.itemLabel\')',
                    'filter' => CHtml::listData(Presentation::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'data_chunk_id',
                    'value' => 'CHtml::value($data, \'dataChunk.itemLabel\')',
                    'filter' => CHtml::listData(DataChunk::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'download_link_id',
                    'value' => 'CHtml::value($data, \'downloadLink.itemLabel\')',
                    'filter' => CHtml::listData(DownloadLink::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'exam_question_id',
                    'value' => 'CHtml::value($data, \'examQuestion.itemLabel\')',
                    'filter' => CHtml::listData(ExamQuestion::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('sectionContent/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('sectionContent/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('sectionContent/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Video Files'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('videoFile/create', 'VideoFile' => array('cloned_from_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));
    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'videoFiles');
$this->widget('TbGridView',
    array(
        'id' => 'videoFile-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->videoFiles) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'version',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'about',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'thumbnail_media_id',
                'value' => 'CHtml::value($data, \'thumbnailMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/videoFile/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                    'name' => 'processed_media_id_en',
                    'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            #'subtitles_en',
            array(
                    'name' => 'authoring_workflow_execution_id_en',
                    'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdEn.itemLabel\')',
                    'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFile/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFile/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_es',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFile/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFile/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFile/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFile/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFile/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFile/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/videoFile/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            #'subtitles_es',
            #'subtitles_fa',
            #'subtitles_hi',
            #'subtitles_pt',
            #'subtitles_sv',
            #'subtitles_cn',
            #'subtitles_de',
            array(
                    'name' => 'processed_media_id_es',
                    'value' => 'CHtml::value($data, \'processedMediaIdEs.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_fa',
                    'value' => 'CHtml::value($data, \'processedMediaIdFa.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_hi',
                    'value' => 'CHtml::value($data, \'processedMediaIdHi.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_pt',
                    'value' => 'CHtml::value($data, \'processedMediaIdPt.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_sv',
                    'value' => 'CHtml::value($data, \'processedMediaIdSv.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_cn',
                    'value' => 'CHtml::value($data, \'processedMediaIdCn.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_de',
                    'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                    'filter' => CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'authoring_workflow_execution_id_es',
                    'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdEs.itemLabel\')',
                    'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                ),
            array(
                    'name' => 'authoring_workflow_execution_id_fa',
                    'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdFa.itemLabel\')',
                    'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                ),
            array(
                    'name' => 'authoring_workflow_execution_id_hi',
                    'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdHi.itemLabel\')',
                    'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                ),
            array(
                    'name' => 'authoring_workflow_execution_id_pt',
                    'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdPt.itemLabel\')',
                    'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                ),
            array(
                    'name' => 'authoring_workflow_execution_id_sv',
                    'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdSv.itemLabel\')',
                    'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                ),
            array(
                    'name' => 'authoring_workflow_execution_id_cn',
                    'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdCn.itemLabel\')',
                    'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                ),
            array(
                    'name' => 'authoring_workflow_execution_id_de',
                    'value' => 'CHtml::value($data, \'authoringWorkflowExecutionIdDe.itemLabel\')',
                    'filter' => CHtml::listData(Execution::model()->findAll(array('limit' => 1000)), 'workflow_id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('videoFile/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('videoFile/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('videoFile/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>

