<?php
/* @var WaffleDataSource|ItemTrait $model */
/* @var WaffleDataSourceController|ItemController $this */
?>
<div class="<?php echo $this->getCssClasses($model); ?>">
    <h1>
        <?php echo $model->name; ?>
        <?php if ($this->actionIsEvaluate()): ?>
            <small><?php echo $this->getViewActionLabel(); ?></small>
        <?php endif; ?>
    </h1>

    <b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($model->id), array('waffleDataSource/view', 'id' => $model->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('version')); ?>:</b>
    <?php echo CHtml::encode($model->version); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('cloned_from_id')); ?>:</b>
    <?php echo CHtml::encode($model->cloned_from_id); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('ref')); ?>:</b>
    <?php echo CHtml::encode($model->ref); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('_name')); ?>:</b>
    <?php echo CHtml::encode($model->_name); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('_short_name')); ?>:</b>
    <?php echo CHtml::encode($model->_short_name); ?>
    <br/>

    <b><?php echo CHtml::encode($model->getAttributeLabel('link')); ?>:</b>
    <?php echo CHtml::encode($model->link); ?>
    <br/>
</div>