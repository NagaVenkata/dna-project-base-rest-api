<?php
$this->breadcrumbs[] = Yii::t('crud', 'Chapters');


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('chapter-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('crud', 'Chapters'); ?>
    <small><?php echo Yii::t('crud', 'Manage'); ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->widget('TbGridView',
    array(
        'id' => 'chapter-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'id',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_en',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'slug_en',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'created',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'modified',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_es',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_fa',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_hi',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_pt',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_sv',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_cn',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'title_de',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'slug_es',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'slug_fa',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'slug_hi',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'slug_pt',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'slug_sv',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'slug_cn',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'editable.EditableColumn',
                'name' => 'slug_de',
                'editable' => array(
                    'url' => $this->createUrl('/chapter/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('id' => \$data->id))",
            ),
        )
    )); ?>
