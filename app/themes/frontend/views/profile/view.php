<?php
$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
?>
<?php $this->renderPartial("/_item/elements/flowbar", array("model" => $model)); ?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<!--<h1>
    
    <?php echo Yii::t('model', 'Profile'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->user_id ?>
    </small>
    
</h1>-->

<?php if (Yii::app()->user->checkAccess('Profile.*')): ?>
    <div class="admin-container hide">
        <?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
    </div>
<?php endif; ?>

<?php $this->renderPartial("_view", array("data" => $model)); ?>
<!--
<b><?php echo CHtml::encode($model->getAttributeLabel('user_id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->user_id), array('view', 'user_id' => $model->user_id)); ?>
    <br />

<b><?php echo CHtml::encode($model->getAttributeLabel('first_name')); ?>:</b>
<?php echo CHtml::encode($model->first_name); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('last_name')); ?>:</b>
<?php echo CHtml::encode($model->last_name); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('public_profile')); ?>:</b>
<?php echo CHtml::encode($model->public_profile); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('picture_media_id')); ?>:</b>
<?php echo CHtml::encode($model->picture_media_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('website')); ?>:</b>
<?php echo CHtml::encode($model->website); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('others_may_contact_me')); ?>:</b>
<?php echo CHtml::encode($model->others_may_contact_me); ?>
<br />

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('about')); ?>:</b>
<?php echo CHtml::encode($model->about); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('lives_in')); ?>:</b>
<?php echo CHtml::encode($model->lives_in); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('language1')); ?>:</b>
<?php echo CHtml::encode($model->language1); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('language2')); ?>:</b>
<?php echo CHtml::encode($model->language2); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('language3')); ?>:</b>
<?php echo CHtml::encode($model->language3); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('language4')); ?>:</b>
<?php echo CHtml::encode($model->language4); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('language5')); ?>:</b>
<?php echo CHtml::encode($model->language5); ?>
<br />

    */
?>
-->