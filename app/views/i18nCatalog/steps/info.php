<?php
/* @var I18nCatalogController|WorkflowUiControllerTrait $this */
/* @var I18nCatalog|ItemTrait $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php echo $form->textFieldControlGroup(
    $model,
    'title',
    array(
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'maxlength' => 255,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'title'),
        ),
    )
); ?>
<?php echo $form->translateTextFieldControlGroup(
    $model,
    'slug',
    $this->getTranslationLanguage(),
    $this->action->id,
    array('hint' => true)
); ?>
<?php echo $form->textAreaControlGroup(
    $model,
    'about',
    array(
        'class' => Html::ITEM_FORM_FIELD_CLASS,
        'rows' => 6,
        'cols' => 50,
        'labelOptions' => array(
            'label' => Html::attributeLabelWithTooltip($model, 'about'),
        ),
    )
); ?>
