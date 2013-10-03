<?php
$this->breadcrumbs[Yii::t('crud', 'Workflows')] = array('admin');
$this->breadcrumbs[] = $model->workflow_id;
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>

    <?php echo Yii::t('crud', 'Workflow'); ?>
    <small>
        <?php echo Yii::t('crud', 'View') ?> #<?php echo $model->workflow_id ?>
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<b><?php echo CHtml::encode($model->getAttributeLabel('workflow_id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->workflow_id), array('view', 'workflow_id' => $model->workflow_id)); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('workflow_name')); ?>:</b>
<?php echo CHtml::encode($model->workflow_name); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('workflow_version')); ?>:</b>
<?php echo CHtml::encode($model->workflow_version); ?>
<br/>

<b><?php echo CHtml::encode($model->getAttributeLabel('workflow_created')); ?>:</b>
<?php echo CHtml::encode($model->workflow_created); ?>
<br/>


<div class="row">
    <div class="span7">
        <h2>
            <?php echo Yii::t('crud', 'Data') ?>
            <small>
                <?php echo $model->itemLabel ?>            </small>
        </h2>

        <?php
        $this->widget(
            'TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                    array(
                        'name' => 'workflow_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'workflow_id',
                                'url' => $this->createUrl('/workflow/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'workflow_name',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'workflow_name',
                                'url' => $this->createUrl('/workflow/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'workflow_version',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'workflow_version',
                                'url' => $this->createUrl('/workflow/editableSaver'),
                            ),
                            true
                        )
                    ),
                    array(
                        'name' => 'workflow_created',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'EditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'workflow_created',
                                'url' => $this->createUrl('/workflow/editableSaver'),
                            ),
                            true
                        )
                    ),
                ),
            )); ?>
    </div>

    <div class="span5">
        <?php $this->renderPartial('_view-relations', array('model' => $model)); ?>    </div>
</div>