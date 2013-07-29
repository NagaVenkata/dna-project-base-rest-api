<?php
$this->breadcrumbs[] = Yii::t('crud', 'Data Sources');


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('data-source-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('crud', 'Data Sources'); ?>
    <small><?php echo Yii::t('crud', 'Manage'); ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->widget('TbGridView',
    array(
        'id' => 'data-source-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            'id',
            'title_en',
            'created',
            'modified',
            'title_es',
            'title_fa',
            'title_hi',
            /*
            'title_pt',
            'title_sv',
            'title_de',
            'title_cn',
            */
            array(
                'class' => 'TbButtonColumn',
                'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('id' => \$data->id))",
                'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('id' => \$data->id))",
                'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('id' => \$data->id))",
            ),
        ),
    )); ?>