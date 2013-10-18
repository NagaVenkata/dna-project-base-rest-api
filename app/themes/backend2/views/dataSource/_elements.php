<div class="row">
    <div class="span8"> <!-- main inputs -->

        <div class="form-horizontal">

            <?php echo $form->textFieldRow($model, 'version'); ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'clonedFrom',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'cloned_from_id', $input);
            ?>

            <?php
            $formId = 'data-source-cloned_from_id-' . \uniqid() . '-form';
            ?>

            <div class="control-group">
                <div class="controls">
                    <?php
                    echo $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'Snapshot'))),
                        'icon' => 'icon-plus',
                        'htmlOptions' => array(
                            'data-toggle' => 'modal',
                            'data-target' => '#' . $formId . '-modal',
                        ),
                    ), true);
                    ?>                </div>
            </div>

            <?php
            $this->beginClip('modal:' . $formId . '-modal');
            $this->renderPartial('//snapshot/_modal_form', array(
                'formId' => $formId,
                'inputSelector' => '#DataSource_cloned_from_id',
                'model' => new Snapshot,
                'pk' => 'id',
                'field' => 'itemLabel',
            ));
            $this->endClip();
            ?>

            <?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_en', array('maxlength' => 255)); ?>

            <?php echo $form->textAreaRow($model, 'about_en', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'logoMedia',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'logo_media_id', $input);
            ?>

            <?php
            $formId = 'data-source-logo_media_id-' . \uniqid() . '-form';
            ?>

            <div class="control-group">
                <div class="controls">
                    <?php
                    echo $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'P3 Media'))),
                        'icon' => 'icon-plus',
                        'htmlOptions' => array(
                            'data-toggle' => 'modal',
                            'data-target' => '#' . $formId . '-modal',
                        ),
                    ), true);
                    ?>                </div>
            </div>

            <?php
            $this->beginClip('modal:' . $formId . '-modal');
            $this->renderPartial('//p3Media/_modal_form', array(
                'formId' => $formId,
                'inputSelector' => '#DataSource_logo_media_id',
                'model' => new P3Media,
                'pk' => 'id',
                'field' => 'itemLabel',
            ));
            $this->endClip();
            ?>

            <?php
            $input = $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'miniLogoMedia',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                , true);
            echo $form->customRow($model, 'mini_logo_media_id', $input);
            ?>

            <?php
            $formId = 'data-source-mini_logo_media_id-' . \uniqid() . '-form';
            ?>

            <div class="control-group">
                <div class="controls">
                    <?php
                    echo $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('model', 'Create {model}', array('{model}' => Yii::t('model', 'P3 Media'))),
                        'icon' => 'icon-plus',
                        'htmlOptions' => array(
                            'data-toggle' => 'modal',
                            'data-target' => '#' . $formId . '-modal',
                        ),
                    ), true);
                    ?>                </div>
            </div>

            <?php
            $this->beginClip('modal:' . $formId . '-modal');
            $this->renderPartial('//p3Media/_modal_form', array(
                'formId' => $formId,
                'inputSelector' => '#DataSource_mini_logo_media_id',
                'model' => new P3Media,
                'pk' => 'id',
                'field' => 'itemLabel',
            ));
            $this->endClip();
            ?>

            <?php echo $form->textFieldRow($model, 'link', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'node_id', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'title_es', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_fa', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_hi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_pt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_sv', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_cn', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'title_de', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_es', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_fa', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_hi', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_pt', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_sv', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_cn', array('maxlength' => 255)); ?>

            <?php echo $form->textFieldRow($model, 'slug_de', array('maxlength' => 255)); ?>

            <?php echo $form->textAreaRow($model, 'about_es', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php echo $form->textAreaRow($model, 'about_fa', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php echo $form->textAreaRow($model, 'about_hi', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php echo $form->textAreaRow($model, 'about_pt', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php echo $form->textAreaRow($model, 'about_sv', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php echo $form->textAreaRow($model, 'about_cn', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php echo $form->textAreaRow($model, 'about_de', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

            <?php echo $form->textFieldRow($model, 'data_source_qa_state_id_en', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'data_source_qa_state_id_es', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'data_source_qa_state_id_fa', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'data_source_qa_state_id_hi', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'data_source_qa_state_id_pt', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'data_source_qa_state_id_sv', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'data_source_qa_state_id_cn', array('maxlength' => 20)); ?>

            <?php echo $form->textFieldRow($model, 'data_source_qa_state_id_de', array('maxlength' => 20)); ?>
        </div>
    </div>
    <!-- main inputs -->

    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>