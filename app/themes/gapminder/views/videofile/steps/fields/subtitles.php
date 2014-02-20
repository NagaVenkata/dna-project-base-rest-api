<?php /** @var VideoFile|ItemTrait $model */ ?>
<?php echo $form->textAreaControlGroup($model, 'subtitles_' . $model->source_language, array(
    'class' => Html::ITEM_FORM_FIELD_CLASS,
    'rows' => 50,
    'cols' => 50,
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, 'subtitles_' . $model->source_language, 'subtitles'),
    ),
)); ?>