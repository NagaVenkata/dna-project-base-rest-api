<div class="row">
    <div class="span8"> <!-- main inputs -->


        <?php echo $form->textFieldRow($model, 'title_en', array('maxlength' => 255)); ?>

        <?php echo $form->html5EditorRow($model, 'embed_template', array('rows' => 6, 'cols' => 50, 'class' => 'span8', 'options' => array(
            'link' => true,
            'image' => false,
            'color' => false,
            'html' => true,
        ))); ?>

        <?php echo $form->textFieldRow($model, 'title_es', array('maxlength' => 255)); ?>

        <?php echo $form->textFieldRow($model, 'title_fa', array('maxlength' => 255)); ?>

        <?php echo $form->textFieldRow($model, 'title_hi', array('maxlength' => 255)); ?>

        <?php echo $form->textFieldRow($model, 'title_pt', array('maxlength' => 255)); ?>

        <?php echo $form->textFieldRow($model, 'title_sv', array('maxlength' => 255)); ?>

        <?php echo $form->textFieldRow($model, 'title_de', array('maxlength' => 255)); ?>

        <?php echo $form->textFieldRow($model, 'title_cn', array('maxlength' => 255)); ?>
    </div>
    <!-- main inputs -->


    <div class="span4"> <!-- sub inputs -->

    </div>
    <!-- sub inputs -->
</div>