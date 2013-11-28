<?php echo $form->textAreaRow($model, 'about_en', array(
    'rows' => 6,
    'cols' => 50,
    'class' => 'span8',
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'about_en', 'about'),
    ),
)); ?>

<?php if ($this->workflowData['translateInto']) {
    echo $form->textAreaRow($model, 'about_' . $this->workflowData['translateInto'], array(
        'rows' => 6,
        'cols' => 50,
        'class' => 'span8',
    ));
} ?>
