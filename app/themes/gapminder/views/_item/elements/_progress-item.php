<div class="progress-item">
    <?php if ($this->action->id != "edit"): ?>
        <div class="span1">
            <?php
            // TODO: Move logic to controller.
            $validationScenario = $this->workflowData["validationScenario"];
            $invalidFields = $model->calculateInvalidFields($validationScenario . "-step_" . $step);
            if ($invalidFields > 0): ?>
                <div class="pull-left"><span class="required"><i class="glyphicon-asterisk"
                                                                 title="<?php print $invalidFields; ?>"></i></span>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="progress-bar-container">
        <?php $this->widget(
            '\TbProgress',
            array(
                'type' => 'success', // 'info', 'success' or 'danger'
                'percent' => $progress,
            )
        ); ?>
    </div>
    <div class="progress-actions">
        <?php
        // TODO: Move logic to controller.
        $action = array($editAction, "id" => $model->{$model->tableSchema->primaryKey}, "step" => $step);
        if (!is_null($translateInto)) {
            $action["translateInto"] = $translateInto;
        }
        $this->widget("\TbButton", array(
            "label" => Yii::t("model", $caption),
            "type" => $_GET['step'] == $step ? "inverse" : null,
            "size" => TbHtml::BUTTON_SIZE_XS,
            'block' => true,
            "icon" => "glyphicon-edit" . ($this->action->id == $action ? " icon-white" : null),
            "url" => $action,
        ));
        ?>
    </div>
</div>