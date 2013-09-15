<div class="btn-toolbar">
    <div class="btn-group">
        <?php  ?><?php
        switch ($this->action->id) {
            case "create":
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                        "label" => Yii::t("crud", "Manage"),
                        "icon" => "icon-list-alt",
                        "url" => array("admin")
                    )
                );
                break;
            case "admin":
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                        "label" => Yii::t("crud", "Create"),
                        "icon" => "icon-plus",
                        "url" => array("create")
                    )
                );
                break;
            case "view":
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                        "label" => Yii::t("crud", "Manage"),
                        "icon" => "icon-list-alt",
                        "url" => array("admin")
                    )
                );
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                        "label" => Yii::t("crud", "Update"),
                        "icon" => "icon-edit",
                        "url" => array("update", "id" => $model->{$model->tableSchema->primaryKey})
                    )
                );
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                        "label" => Yii::t("crud", "Create"),
                        "icon" => "icon-plus",
                        "url" => array("create")
                    )
                );
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                        "label" => Yii::t("crud", "Delete"),
                        "type" => "danger",
                        "icon" => "icon-remove icon-white",
                        "htmlOptions" => array(
                            "submit" => array(
                                "delete",
                                "id" => $model->{$model->tableSchema->primaryKey},
                                "returnUrl" => (Yii::app()->request->getParam("returnUrl")) ? Yii::app(
                                )->request->getParam("returnUrl") : $this->createUrl("admin")
                            ),
                            "confirm" => Yii::t("crud", "Do you want to delete this item?")
                        )
                    )
                );
                break;
            case "update":
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                        "label" => Yii::t("crud", "Manage"),
                        "icon" => "icon-list-alt",
                        "url" => array("admin")
                    )
                );
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                        "label" => Yii::t("crud", "View"),
                        "icon" => "icon-eye-open",
                        "url" => array("view", "id" => $model->{$model->tableSchema->primaryKey})
                    )
                );
                $this->widget(
                    "bootstrap.widgets.TbButton",
                    array(
                        "label" => Yii::t("crud", "Delete"),
                        "type" => "danger",
                        "icon" => "icon-remove icon-white",
                        "htmlOptions" => array(
                            "submit" => array(
                                "delete",
                                "id" => $model->{$model->tableSchema->primaryKey},
                                "returnUrl" => (Yii::app()->request->getParam("returnUrl")) ? Yii::app(
                                )->request->getParam("returnUrl") : $this->createUrl("admin")
                            ),
                            "confirm" => Yii::t("crud", "Do you want to delete this item?")
                        )
                    )
                );
                break;
        }
        ?>    </div>
    <?php if ($this->action->id == 'admin'): ?>
        <div class="btn-group">
            <?php
            $this->widget(
                "bootstrap.widgets.TbButton",
                array(
                    "label" => Yii::t("crud", "Search"),
                    "icon" => "icon-search",
                    "htmlOptions" => array("class" => "search-button")
                )
            );?>    </div>

        <div class="btn-group">
            <?php $this->widget(
                'bootstrap.widgets.TbButtonGroup',
                array(
                    'buttons' => array(
                        array(
                            'label' => Yii::t('crud', 'Relations'),
                            'icon' => 'icon-search',
                            'items' => array(
                                array(
                                    'label' => 'sectionContents - SectionContent',
                                    'url' => array('//sectionContent/admin')
                                ),
                                array(
                                    'label' => 'translationWorkflowExecutionIdDe - Execution',
                                    'url' => array('//execution/admin')
                                ),
                                array(
                                    'label' => 'translationWorkflowExecutionIdEn - Execution',
                                    'url' => array('//execution/admin')
                                ),
                                array(
                                    'label' => 'translationWorkflowExecutionIdCn - Execution',
                                    'url' => array('//execution/admin')
                                ),
                                array(
                                    'label' => 'translationWorkflowExecutionIdEs - Execution',
                                    'url' => array('//execution/admin')
                                ),
                                array(
                                    'label' => 'translationWorkflowExecutionIdFa - Execution',
                                    'url' => array('//execution/admin')
                                ),
                                array(
                                    'label' => 'translationWorkflowExecutionIdHi - Execution',
                                    'url' => array('//execution/admin')
                                ),
                                array(
                                    'label' => 'translationWorkflowExecutionIdPt - Execution',
                                    'url' => array('//execution/admin')
                                ),
                                array(
                                    'label' => 'translationWorkflowExecutionIdSv - Execution',
                                    'url' => array('//execution/admin')
                                ),
                                array(
                                    'label' => 'authoringWorkflowExecution - Execution',
                                    'url' => array('//execution/admin')
                                ),
                                array('label' => 'originalMedia - P3Media', 'url' => array('//p3Media/admin')),
                                array('label' => 'processedMediaIdEn - P3Media', 'url' => array('//p3Media/admin')),
                                array('label' => 'processedMediaIdCn - P3Media', 'url' => array('//p3Media/admin')),
                                array('label' => 'processedMediaIdDe - P3Media', 'url' => array('//p3Media/admin')),
                                array('label' => 'processedMediaIdEs - P3Media', 'url' => array('//p3Media/admin')),
                                array('label' => 'processedMediaIdFa - P3Media', 'url' => array('//p3Media/admin')),
                                array('label' => 'processedMediaIdHi - P3Media', 'url' => array('//p3Media/admin')),
                                array('label' => 'processedMediaIdPt - P3Media', 'url' => array('//p3Media/admin')),
                                array('label' => 'processedMediaIdSv - P3Media', 'url' => array('//p3Media/admin')),
                            )
                        ),
                    ),
                )
            );
            ?>        </div>


    <?php endif; ?></div>

<?php if ($this->action->id == 'admin'): ?>
    <div class="search-form" style="display:none">
    <?php $this->renderPartial(
        '_search',
        array(
            'model' => $model,
        )
    ); ?>
    </div>
<?php endif; ?>