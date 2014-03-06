<?php
$this->breadcrumbs[] = Yii::t('model', 'Users');
$this->breadcrumbs[$model->username] = array('account/profile', 'id' => $model->id);
$this->breadcrumbs[] = Yii::t('account', 'History');
?>

<h1>

    <?php echo $model->profile->first_name . " " . $model->profile->last_name; ?>
    <small>
        <?php echo Yii::t('account', 'History') ?> <!--#<?php echo $model->id ?>-->
    </small>

</h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>

<div class="alert alert-info">
    <h4>Work in progress</h4>
    This is where you will track your changes and contributions over time.
</div>

<div class="row">
    <div class="span12">
        <b><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?>:</b>
        <?php echo CHtml::encode($model->create_at); ?>
        <br/>

        <b><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?>:</b>
        <?php echo CHtml::encode($model->lastvisit_at); ?>
        <br/>
    </div>
</div>
