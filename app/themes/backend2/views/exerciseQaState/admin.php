<?php
$this->setPageTitle(
    Yii::t('model', 'Exercise Qa States')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Exercise Qa States');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'exercise-qa-state-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('model', 'Exercise Qa States'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>



<?php
$this->widget('TbGridView',
    array(
        'id' => 'exercise-qa-state-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'responsiveTable' => true,
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'CLinkColumn',
                'header' => '',
                'labelExpression' => '$data->itemLabel',
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("id" => $data["id"]))'
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'id',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'status',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'draft_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'preview_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'public_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'approval_progress',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'proofing_progress',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translations_draft_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translations_preview_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translations_public_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translations_approval_progress',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translations_proofing_progress',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'previewing_welcome',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'candidate_for_public_status',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_approved',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_approved',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'question_approved',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'description_approved',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'thumbnail_approved',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'materials_approved',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_proofed',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_proofed',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'question_proofed',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'description_proofed',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'thumbnail_proofed',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'materials_proofed',
                'editable' => array(
                    'url' => $this->createUrl('/exerciseQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            */

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("ExerciseQaState.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("ExerciseQaState.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("ExerciseQaState.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>