<?php echo $form->textAreaRow($model, 'embed_template', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php if ($this->workflowData["translateInto"]) echo $form->textAreaRow($model, 'about_'.$this->workflowData["translateInto"], array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<p class="alert alert-info help-block">
    <?php echo $model->getAttributeHint("embed_template"); ?>
</p>