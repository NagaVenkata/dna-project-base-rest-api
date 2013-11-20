<div class="view well well-white">

    <div class="admin-container show">
        <?php echo CHtml::link('<i class="icon-eye-open"></i> ' . Yii::t('model', 'View {model}', array('{model}' => Yii::t('model', 'Vector Graphic'))), array('vectorGraphic/view', 'id' => $data->id), array('class' => 'btn')); ?>
    </div>
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('vectorGraphic/view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
    <?php echo CHtml::encode($data->version); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cloned_from_id')); ?>:</b>
    <?php echo CHtml::encode($data->cloned_from_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('_title')); ?>:</b>
    <?php echo CHtml::encode($data->_title); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_en')); ?>:</b>
    <?php echo CHtml::encode($data->slug_en); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('_about')); ?>:</b>
    <?php echo CHtml::encode($data->_about); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('original_media_id')); ?>:</b>
    <?php echo CHtml::encode($data->original_media_id); ?>
    <br/>

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_en')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_en); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($data->created); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($data->modified); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('node_id')); ?>:</b>
    <?php echo CHtml::encode($data->node_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_es')); ?>:</b>
    <?php echo CHtml::encode($data->slug_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_fa')); ?>:</b>
    <?php echo CHtml::encode($data->slug_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_hi')); ?>:</b>
    <?php echo CHtml::encode($data->slug_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_pt')); ?>:</b>
    <?php echo CHtml::encode($data->slug_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_sv')); ?>:</b>
    <?php echo CHtml::encode($data->slug_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_cn')); ?>:</b>
    <?php echo CHtml::encode($data->slug_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('slug_de')); ?>:</b>
    <?php echo CHtml::encode($data->slug_de); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_es')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_fa')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_hi')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_pt')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_sv')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_cn')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('processed_media_id_de')); ?>:</b>
    <?php echo CHtml::encode($data->processed_media_id_de); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('vector_graphic_qa_state_id_en')); ?>:</b>
    <?php echo CHtml::encode($data->vector_graphic_qa_state_id_en); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('vector_graphic_qa_state_id_es')); ?>:</b>
    <?php echo CHtml::encode($data->vector_graphic_qa_state_id_es); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('vector_graphic_qa_state_id_fa')); ?>:</b>
    <?php echo CHtml::encode($data->vector_graphic_qa_state_id_fa); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('vector_graphic_qa_state_id_hi')); ?>:</b>
    <?php echo CHtml::encode($data->vector_graphic_qa_state_id_hi); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('vector_graphic_qa_state_id_pt')); ?>:</b>
    <?php echo CHtml::encode($data->vector_graphic_qa_state_id_pt); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('vector_graphic_qa_state_id_sv')); ?>:</b>
    <?php echo CHtml::encode($data->vector_graphic_qa_state_id_sv); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('vector_graphic_qa_state_id_cn')); ?>:</b>
    <?php echo CHtml::encode($data->vector_graphic_qa_state_id_cn); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('vector_graphic_qa_state_id_de')); ?>:</b>
    <?php echo CHtml::encode($data->vector_graphic_qa_state_id_de); ?>
    <br />

    */
    ?>
    <?php if (Yii::app()->user->checkAccess('VectorGraphic.*')): ?>
        <div class="admin-container show">
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Edit {model}', array('{model}' => Yii::t('model', 'Vector Graphic'))), array('vectorGraphic/continueAuthoring', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('Developer')): ?>
        <div class="admin-container show">
            <h3>Developer access</h3>
            <?php echo CHtml::link('<i class="icon-edit"></i> ' . Yii::t('model', 'Update {model}', array('{model}' => Yii::t('model', 'Vector Graphic'))), array('vectorGraphic/update', 'id' => $data->id, 'returnUrl' => Yii::app()->request->url), array('class' => 'btn')); ?>
        </div>
    <?php endif; ?>

</div>
