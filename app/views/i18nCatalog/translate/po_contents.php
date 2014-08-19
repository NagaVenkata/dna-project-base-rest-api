<?php
/* @var I18nCatalogController|WorkflowUiControllerTrait $this */
/* @var I18nCatalog|ItemTrait $model */
/* @var AppActiveForm $form */
?>
<?php $messages_to_translate = $model->getParsedPoContentsForTranslation(); ?>
<?php $translateInto = $this->workflowData['translateInto']; ?>
<?php $dataProvider = new CArrayDataProvider(array_values($messages_to_translate), array(
    'id' => 'user',
    'sort' => array(
        'attributes' => array(
            'id', 'sourceMessage',
        ),
    ),
    'pagination' => array(
        'pageSize' => 1000, // TODO: Fix that TbEditable
    ),
)); ?>
<?php $this->widget(
    '\TbGridView',
    array(
        'id' => 'message-grid',
        'dataProvider' => $dataProvider,
        //'filter' => $model,
        'template' => '{pager}{items}{pager}',
        'pager' => array(
            'class' => '\TbPager',
            'hideFirstAndLast' => false,
        ),
        'columns' => array(
            //'id',
            array(
                'name' => 'Source message',
                'value' => function ($data) use ($model, $translateInto) {
                        if ($data->plural_forms) {
                            $pluralSourceMessages = ChoiceFormatHelper::toArray($data->sourceMessage, $model->source_language);
                            foreach ($pluralSourceMessages as $pluralRule => $sourceMessage) {
                                echo $pluralRule . ":<br/>";
                                if (!is_null($sourceMessage)) {
                                    echo '<div class="well">';
                                    echo nl2br($sourceMessage);
                                    echo '</div>';
                                } else {
                                    echo Yii::t('app', 'No source message for this plural form');
                                }
                            }
                        } else {
                            echo '<div class="well">';
                            echo nl2br($data->sourceMessage);
                            echo '</div>';
                        }
                        if (isset($data->reference)) {
                            echo Yii::t('app', 'Reference') . ": ";
                            echo "<br>";
                            echo "<small>" . implode("<br>", $data->reference) . "</small>";
                        }
                        if (isset($data->context)) {
                            echo "<br>";
                            echo Yii::t('app', 'Context') . ": ";
                            echo "<br>";
                            echo "<small>" . $data->context . "</small>";
                        }
                    },
                'filter' => true,
            ),
            array(
                'name' => 'Translation',
                'value' => function ($data) use ($model, $form, $translateInto) {
                        $context = isset($data->context) ? $data->context : null;
                        $category = $model->getTranslationCategory('po_contents', $context);
                        $sourceMessage = SourceMessage::ensureSourceMessage($category, $data->sourceMessage, $translateInto);
                        $currentTranslation = Yii::t($category, $data->sourceMessage, array(), 'editedMessages', $translateInto);

                        if ($data->plural_forms) {
                            $pluralTranslations = ChoiceFormatHelper::toArray($currentTranslation, $translateInto);
                            foreach ($pluralTranslations as $pluralRule => $currentTranslation) {
                                echo $pluralRule . ":<br/>";
                                echo TbHtml::textAreaControlGroup("SourceMessage[{$sourceMessage->id}][$pluralRule]", $currentTranslation);
                            }
                        } else {
                            echo TbHtml::textAreaControlGroup("SourceMessage[{$sourceMessage->id}]", $currentTranslation);
                        }
                        if (is_null($currentTranslation)) {
                            $currentFallbackTranslation = Yii::t($category, $data->sourceMessage, array(), 'displayedMessages', $translateInto);
                            echo Yii::t('app', 'Current fallback for {lang}', array('{lang}' => Yii::app()->language)) . ": ";
                            echo '<br>';
                            echo nl2br($currentFallbackTranslation);
                        }
                    },
                //'filter' => CHtml::listData($model->getMissingTranslations('category'), 'category', 'category'),
            ),

        ),
    )
); ?>
<?php /*
<ul>
    <?php foreach ($messages_to_translate as $message_to_translate): ?>
        <li><?php echo Yii::t('subtitles_foo', $message_to_translate['sourceMessage']); ?></li>
    <?php endforeach; ?>
</ul>
*/
?>
<?php publishJs(Yii::getPathOfAlias('vendor.neam.yii-workflow-ui.themes.simplicity') . '/js/popover-focus-caret.js', CClientScript::POS_END); ?>
<?php //publishJs(Yii::getPathOfAlias('vendor.neam.yii-workflow-ui.themes.simplicity') . '/js/force-clean-dirty-forms.js', CClientScript::POS_END); ?>