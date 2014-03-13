<?php
/** @var ToolController|ItemController $this */
/** @var Tool $model */
/** @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textFieldControlGroup($model, 'title_en', array(
    'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-from-1',
    'maxlength' => 255,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'title_en', 'title'),
    ),
)); ?>
<?php if ($this->workflowData['translateInto']) {
    echo $form->textFieldControlGroup($model, 'title_' . $this->workflowData['translateInto'], array(
        'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-from-2',
        'maxlength' => 255,
    ));
} ?>
<?php echo $form->textFieldControlGroup($model, 'slug_en', array(
    'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-to-1',
    'maxlength' => 255,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'slug_en', 'slug'),
    ),
)); ?>
<?php if ($this->workflowData['translateInto']) {
    echo $form->textFieldControlGroup($model, 'slug_' . $this->workflowData['translateInto'], array(
        'class' => Html::ITEM_FORM_FIELD_CLASS . ' slugit-to-2',
        'maxlength' => 255,
    ));
} ?>
<?php Html::jsSlugIt(array(
    '.slugit-from-1' => '.slugit-to-1',
    '.slugit-from-2' => '.slugit-to-2',
)); ?>