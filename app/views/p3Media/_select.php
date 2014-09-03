<?php
/* @var ActiveRecord $model */
/* @var AppActiveForm|TbActiveForm $form */
?>
<?php // TODO: Refactor this view. ?>
<?php $modelClass = get_class($model); ?>
<style>
    .select2-container .select2-choice {
        display: block;
        height: 130px;
        min-width: 200px;
        max-width: 400px;
    }

    .select2-result-selectable {
        height: 120px;
        overflow-y: auto;
    }

    .select2-results {
        max-height: 320px;
    }

    .select2-thumb {
        margin-top: 8px;
        margin-bottom: 4px;
    }

    .select2-text {
        margin-bottom: 8px;
    }
</style>
<?php
$baseUrl = Yii::app()->request->baseUrl;
$noneLabel = Yii::t('app', 'None');
$chooseBelowLabel = Yii::t('app', 'Click to choose existing or upload new below');
$select2js = <<<EOF
(function() {
    function format(state) {
        if (!state.id && !state.text) return "<div class='select2-text'>{$noneLabel} - {$chooseBelowLabel}</div>";
        if (!state.id) return state.text;
        return "<div><img class='select2-thumb' src='{$baseUrl}/p3media/file/image?preset=select2-thumb&id=" + state.id.toLowerCase() + "'/></div><div class='select2-text'>" + state.text + "</div>";
    }

    var select2opts = {
        formatResult: format,
        formatSelection: format,
        //escapeMarkup: function(m) { return m; }
    };

    $("#{$modelClass}_{$attribute}").data('select2opts', select2opts);
    $("#{$modelClass}_{$attribute}").select2($("#{$modelClass}_{$attribute}").data('select2opts'));
})();
EOF;
?>
<?php Yii::app()->clientScript->registerScript('step_' . $step . '-select2-' . $attribute, $select2js); ?>
<?php
$criteria = new CDbCriteria();
$criteria->addInCondition("mime_type", $mimeTypes);
$criteria->addCondition("t.type = 'file'");
$criteria->addCondition("t.access_owner = :userId");
$criteria->params[':userId'] = Yii::app()->user->id;
$criteria->limit = 100;
$criteria->order = "t.created_at DESC";

$input = $this->widget('\GtcRelation', array(
    'model' => $model,
    'relation' => $relation,
    'fields' => 'itemLabel',
    'criteria' => $criteria,
    'allowEmpty' => $noneLabel,
    'style' => 'dropdownlist',
    'htmlOptions' => array(
        'checkAll' => 'all',
    ),
), true); ?>
<?php echo $form->customControlGroup($model, $attribute, $input, array(
    'labelOptions' => array(
        'label' => Html::attributeLabelWithTooltip($model, $attribute),
    ),
)); ?>
<?php //registerPackage('select2', 'application.widgets.assets.select2', array('select2.css'), array('select2.js'), array('jquery')); ?>
<?php $formId = lcfirst($modelClass) . '-' . $attribute . '-' . \uniqid() . '-form'; ?>
<div class="control-group">
    <div class="controls">
        <br>
        <?php echo $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('app', 'Upload'),
                'icon' => TbHtml::ICON_PLUS,
                'htmlOptions' => array(
                    'class' => 'upload-btn',
                    'data-toggle' => 'modal',
                    'data-target' => '#' . $formId . '-modal',
                ),
            ),
            true
        ); ?>
    </div>
</div>
<?php $this->beginClip('modal:' . $formId . '-modal'); ?>
<?php $this->renderPartial('//p3Media/_modal_form', array(
    'formId' => $formId,
    'inputSelector' => "#{$modelClass}_{$attribute}",
    'model' => new P3Media,
    'pk' => 'id',
    'field' => 'itemLabel',
)); ?>
<?php $this->endClip(); ?>
