<?php // TODO: Refactor this view. ?>
<?php /** @var Snapshot $model */ ?>

<?php $input = $this->widget('\GtcRelation', array(
    'model' => $model,
    'relation' => 'tool',
    'fields' => 'itemLabel',
    'allowEmpty' => true,
    'style' => 'dropdownlist',
    'htmlOptions' => array(
        'checkAll' => 'all'
    ),
), true); ?>

<?php echo $form->customControlGroup($model, 'tool_id', $input, array(
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'tool'),
    ),
)); ?>

<div class="control-group">
    <div class="controls">
        <?php echo $this->widget('\TbButton', array(
            'label' => Yii::t('app', 'Add Tool'),
            'icon' => 'glyphicon-plus',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#addrelation-snapshot-tool-modal',
            ),
        ), true); ?>
    </div>
</div>

<?php $this->renderPartial('//gridRelation/_modal_form_single', array(
    'model' => $model,
    'toType' => 'Tool',
    'toLabel' => 'tool',
    'inputId' => 'tool_id',
)); ?>