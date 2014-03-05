<div class="btn-toolbar">
    <div class="btn-group">
        <?php
        switch ($this->action->id) {
            case "create":
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "glyphicon-list-alt",
                    "url" => array("admin")
                ));
                break;
            case "admin":
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Add"),
                    "icon" => "glyphicon-plus",
                    "url" => array("add")
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Create"),
                    "icon" => "glyphicon-plus",
                    "url" => array("create")
                ));
                break;
            case "view":
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "glyphicon-list-alt",
                    "url" => array("admin")
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Edit"),
                    "icon" => "glyphicon-edit",
                    "url" => array("continueAuthoring", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Update"),
                    "icon" => "glyphicon-edit",
                    "url" => array("update", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Create"),
                    "icon" => "glyphicon-plus",
                    "url" => array("create")
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Delete"),
                    "type" => "danger",
                    "icon" => "glyphicon-remove icon-white",
                    "htmlOptions" => array(
                        "submit" => array("delete", "id" => $model->{$model->tableSchema->primaryKey}, "returnUrl" => (Yii::app()->request->getParam("returnUrl")) ? Yii::app()->request->getParam("returnUrl") : $this->createUrl("admin")),
                        "confirm" => Yii::t("model", "Do you want to delete this item?"))
                ));
                break;
            case "update":
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Manage"),
                    "icon" => "glyphicon-list-alt",
                    "url" => array("admin")
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "View"),
                    "icon" => "glyphicon-eye-open",
                    "url" => array("view", "id" => $model->{$model->tableSchema->primaryKey})
                ));
                $this->widget("\TbButton", array(
                    "label" => Yii::t("model", "Delete"),
                    "type" => "danger",
                    "icon" => "glyphicon-remove icon-white",
                    "htmlOptions" => array(
                        "submit" => array("delete", "id" => $model->{$model->tableSchema->primaryKey}, "returnUrl" => (Yii::app()->request->getParam("returnUrl")) ? Yii::app()->request->getParam("returnUrl") : $this->createUrl("admin")),
                        "confirm" => Yii::t("model", "Do you want to delete this item?"))
                ));
                break;
        }
        ?>    </div>
    <?php if ($this->action->id == 'admin'): ?>
        <div class="btn-group">
            <?php
            $this->widget('\TbButton', array(
                'label' => Yii::t('model', 'Search'),
                'icon' => 'glyphicon-search',
                'htmlOptions' => array('class' => 'search-button')
            ));?>
        </div>


        <div class="btn-group">
            <?php
            $this->widget('\TbButtonGroup', array(
                'buttons' => array(
                    array(
                        'label' => Yii::t('model', 'Relations'),
                        'icon' => 'glyphicon-search',
                        'items' => array(array('label' => 'changesets - Changeset', 'url' => array('//changeset/admin')), array('label' => 'chapters - Chapter', 'url' => array('//chapter/admin')), array('label' => 'dataArticles - DataArticle', 'url' => array('//dataArticle/admin')), array('label' => 'dataSources - DataSource', 'url' => array('//dataSource/admin')), array('label' => 'downloadLinks - DownloadLink', 'url' => array('//downloadLink/admin')), array('label' => 'edges - Edge', 'url' => array('//edge/admin')), array('label' => 'edges1 - Edge', 'url' => array('//edge/admin')), array('label' => 'examQuestions - ExamQuestion', 'url' => array('//examQuestion/admin')), array('label' => 'examQuestions1 - ExamQuestion', 'url' => array('//examQuestion/admin')), array('label' => 'examQuestionAlternatives - ExamQuestionAlternative', 'url' => array('//examQuestionAlternative/admin')), array('label' => 'exercises - Exercise', 'url' => array('//exercise/admin')), array('label' => 'guiSections - GuiSection', 'url' => array('//guiSection/admin')), array('label' => 'htmlChunks - HtmlChunk', 'url' => array('//htmlChunk/admin')), array('label' => 'i18nCatalogs - I18nCatalog', 'url' => array('//i18nCatalog/admin')), array('label' => 'menus - Menu', 'url' => array('//menu/admin')), array('label' => 'nodeHasGroups - NodeHasGroup', 'url' => array('//nodeHasGroup/admin')), array('label' => 'pages - Page', 'url' => array('//page/admin')), array('label' => 'sections - Section', 'url' => array('//section/admin')), array('label' => 'slideshowFiles - SlideshowFile', 'url' => array('//slideshowFile/admin')), array('label' => 'snapshots - Snapshot', 'url' => array('//snapshot/admin')), array('label' => 'spreadsheetFiles - SpreadsheetFile', 'url' => array('//spreadsheetFile/admin')), array('label' => 'textDocs - TextDoc', 'url' => array('//textDoc/admin')), array('label' => 'tools - Tool', 'url' => array('//tool/admin')), array('label' => 'vectorGraphics - VectorGraphic', 'url' => array('//vectorGraphic/admin')), array('label' => 'videoFiles - VideoFile', 'url' => array('//videoFile/admin')), array('label' => 'waffles - Waffle', 'url' => array('//waffle/admin')), array('label' => 'waffleCategories - WaffleCategory', 'url' => array('//waffleCategory/admin')), array('label' => 'waffleCategoryElements - WaffleCategoryElement', 'url' => array('//waffleCategoryElement/admin')), array('label' => 'waffleDataSources - WaffleDataSource', 'url' => array('//waffleDataSource/admin')), array('label' => 'waffleIndicators - WaffleIndicator', 'url' => array('//waffleIndicator/admin')), array('label' => 'waffleTags - WaffleTag', 'url' => array('//waffleTag/admin')), array('label' => 'waffleUnits - WaffleUnit', 'url' => array('//waffleUnit/admin')), array('label' => 'outEdges - Edge', 'url' => array('//edge/admin')), array('label' => 'outNodes - Node', 'url' => array('//node/admin')), array('label' => 'inEdges - Edge', 'url' => array('//edge/admin')), array('label' => 'inNodes - Node', 'url' => array('//node/admin')), array('label' => 'nodes - Node', 'url' => array('//node/admin'))
                        )
                    ),
                ),
            ));
            ?>        </div>


    <?php endif; ?></div>

<?php if ($this->action->id == 'admin'): ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div>
<?php endif; ?>