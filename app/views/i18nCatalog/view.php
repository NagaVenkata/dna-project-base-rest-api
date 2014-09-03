<?php
/* @var I18nCatalogController|WorkflowUiControllerTrait $this */
/* @var I18nCatalog|ItemTrait $model */
?>
<div class="<?php echo $this->getCssClasses($model); ?>">
<h1>
    <?php echo $model->title; ?>
    <?php if ($this->actionIsEvaluate()): ?>
        <small><?php echo $this->getViewActionLabel(); ?></small>
    <?php endif; ?>
</h1>
<div class="admin-container hide">
    <div class="btn-toolbar">
        <div class="btn-group">
            <?php $this->widget('\TbButton', array(
                'label' => Yii::t('model', 'Manage'),
                'icon' => TbHtml::ICON_EDIT,
                'url' => array('admin'),
            )); ?>
            <?php $this->widget('\TbButton', array(
                'label' => Yii::t('model', 'Edit'),
                'icon' => TbHtml::ICON_EDIT,
                'url' => array(
                    'continueAuthoring',
                    'id' => $model->{$model->tableSchema->primaryKey},
                ),
            )); ?>
            <?php $this->widget('\TbButton', array(
                'label' => Yii::t('model', 'Update'),
                'icon' => TbHtml::ICON_EDIT,
                'url' => array(
                    'update',
                    'id' => $model->{$model->tableSchema->primaryKey},
                ),
            )); ?>
            <?php $this->widget('\TbButton', array(
                'label' => Yii::t('model', 'Delete'),
                'color' => 'danger',
                'icon' => 'glyphicon-remove icon-white',
                'htmlOptions' => array(
                    'submit' => array(
                        'delete',
                        'id' => $model->{$model->tableSchema->primaryKey},
                        'returnUrl' => Yii::app()->request->getParam('returnUrl')
                                ? Yii::app()->request->getParam('returnUrl')
                                : $this->createUrl('admin'),
                    ),
                    'confirm' => Yii::t('model', 'Do you want to delete this item?')),
            )); ?>
        </div>
    </div>
</div>
<?php $this->renderPartial('_view', array('data' => $model)); ?>
<?php /*
    <b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('version')); ?>:</b>
    <?php echo CHtml::encode($model->version); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('cloned_from_id')); ?>:</b>
    <?php echo CHtml::encode($model->cloned_from_id); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($model->title); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('about')); ?>:</b>
    <?php echo CHtml::encode($model->about); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('pot_import_media_id')); ?>:</b>
    <?php echo CHtml::encode($model->pot_import_media_id); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($model->created); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
    <?php echo CHtml::encode($model->modified); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('owner_id')); ?>:</b>
    <?php echo CHtml::encode($model->owner_id); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('node_id')); ?>:</b>
    <?php echo CHtml::encode($model->node_id); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_es')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_es); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_hi')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_hi); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_pt')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_pt); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_sv')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_sv); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_de')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_de); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('po_file_qa_state_id')); ?>:</b>
    <?php echo CHtml::encode($model->po_file_qa_state_id); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_zh')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_zh); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_ar')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_ar); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_bg')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_bg); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_ca')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_ca); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_cs')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_cs); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_da')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_da); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_en_gb')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_en_gb); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_en_us')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_en_us); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_el')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_el); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_fi')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_fi); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_fil')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_fil); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_fr')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_fr); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_hr')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_hr); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_hu')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_hu); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_id')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_id); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_iw')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_iw); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_it')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_it); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_ja')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_ja); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_ko')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_ko); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_lt')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_lt); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_lv')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_lv); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_nl')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_nl); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_no')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_no); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_pl')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_pl); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_pt_br')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_pt_br); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_pt_pt')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_pt_pt); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_ro')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_ro); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_ru')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_ru); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_sk')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_sk); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_sl')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_sl); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_sr')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_sr); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_th')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_th); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_tr')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_tr); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_uk')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_uk); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_vi')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_vi); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_zh_cn')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_zh_cn); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('processed_media_id_zh_tw')); ?>:</b>
    <?php echo CHtml::encode($model->processed_media_id_zh_tw); ?>
    <br />
    */
?>
</div>