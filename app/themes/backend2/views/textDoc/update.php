<?php
$this->setPageTitle(
    Yii::t('model', 'Text Doc')
    . ' - '
    . Yii::t('model', 'Update')
    . ': '
    . $model->getItemLabel()
);
$this->breadcrumbs[Yii::t('model', 'Text Docs')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view', 'id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('model', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('model', 'Text Doc'); ?>
    <small>
        <?php echo Yii::t('model', 'Update') ?> #<?php echo $model->id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<?php
$this->renderPartial('_form', array('model' => $model));
?>



<h2>
    <?php echo Yii::t('model', 'Edges'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('edge/create', 'Edge' => array('Edge' => $model->node->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));

    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'outEdges');
$this->widget('TbGridView',
    array(
        'id' => 'edge-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->outEdges) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'name' => 'from_node_id',
                'value' => 'CHtml::value($data, \'fromNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'to_node_id',
                'value' => 'CHtml::value($data, \'toNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'weight',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('edge/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('edge/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('edge/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Nodes'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('node/create', 'Node' => array('Node' => $model->outEdges->to_node_id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));

    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'outNodes');
$this->widget('TbGridView',
    array(
        'id' => 'node-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->outNodes) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('node/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('node/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('node/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Edges'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('edge/create', 'Edge' => array('Edge' => $model->node->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));

    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'inEdges');
$this->widget('TbGridView',
    array(
        'id' => 'edge-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->inEdges) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'name' => 'from_node_id',
                'value' => 'CHtml::value($data, \'fromNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'name' => 'to_node_id',
                'value' => 'CHtml::value($data, \'toNode.itemLabel\')',
                'filter' => '', //CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'weight',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('edge/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('edge/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('edge/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Nodes'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('node/create', 'Node' => array('Node' => $model->inEdges->from_node_id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));

    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'inNodes');
$this->widget('TbGridView',
    array(
        'id' => 'node-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->inNodes) > 1 ? $relatedSearchModel : null,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('node/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('node/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('node/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>


<h2>
    <?php echo Yii::t('model', 'Text Docs'); ?> </h2>

<div class="btn-group">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons' => array(
            array('label' => Yii::t('model', 'Create'), 'icon' => 'icon-plus', 'url' => array('textDoc/create', 'TextDoc' => array('cloned_from_id' => $model->id), 'returnUrl' => Yii::app()->request->url), array('class' => ''))
        ),
    ));

    ?></div>

<?php
$relatedSearchModel = $this->getRelatedSearchModel($model, 'textDocs');
$this->widget('TbGridView',
    array(
        'id' => 'textDoc-grid',
        'dataProvider' => $relatedSearchModel->search(),
        'filter' => $relatedSearchModel, // TODO: Restore similar functionality without oom problems: count($model->textDocs) > 1 ? $relatedSearchModel : null,
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
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'about_en',
            array(
                'name' => 'original_media_id',
                'value' => 'CHtml::value($data, \'originalMedia.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'generate_processed_media',
                'editable' => array(
                    'url' => $this->createUrl('/textDoc/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'name' => 'processed_media_id_en',
                'value' => 'CHtml::value($data, \'processedMediaIdEn.itemLabel\')',
                'filter' => '', //CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            /*
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'created',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'modified',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'node_id',
                    'value' => 'CHtml::value($data, \'node.itemLabel\')',
                    'filter' => '',//CHtml::listData(Node::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_es',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'title_de',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'name' => 'processed_media_id_es',
                    'value' => 'CHtml::value($data, \'processedMediaIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_fa',
                    'value' => 'CHtml::value($data, \'processedMediaIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_hi',
                    'value' => 'CHtml::value($data, \'processedMediaIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_pt',
                    'value' => 'CHtml::value($data, \'processedMediaIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_sv',
                    'value' => 'CHtml::value($data, \'processedMediaIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_cn',
                    'value' => 'CHtml::value($data, \'processedMediaIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'processed_media_id_de',
                    'value' => 'CHtml::value($data, \'processedMediaIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_es',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_fa',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_hi',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_pt',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_sv',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_cn',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            array(
                    'class' => 'TbEditableColumn',
                    'name' => 'slug_de',
                    'editable' => array(
                        'url' => $this->createUrl('/textDoc/editableSaver'),
                        //'placement' => 'right',
                    )
                ),
            #'about_es',
            #'about_fa',
            #'about_hi',
            #'about_pt',
            #'about_sv',
            #'about_cn',
            #'about_de',
            array(
                    'name' => 'text_doc_qa_state_id_en',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdEn.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_es',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdEs.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_fa',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdFa.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_hi',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdHi.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_pt',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdPt.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_sv',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdSv.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_cn',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdCn.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            array(
                    'name' => 'text_doc_qa_state_id_de',
                    'value' => 'CHtml::value($data, \'textDocQaStateIdDe.itemLabel\')',
                    'filter' => '',//CHtml::listData(TextDocQaState::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
                ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('textDoc/view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('textDoc/update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('textDoc/delete', array('id' => \$data->id))",
            ),
        ),
    ));
?>

