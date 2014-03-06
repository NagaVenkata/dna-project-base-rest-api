<?php
$this->breadcrumbs[Yii::t('model', $model->modelLabel, 2)] = array('index');
?>
<?php $this->renderPartial("/_item/elements/flowbar", array("model" => $model)); ?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<!--<h1>
    
    <?php echo Yii::t('model', 'Waffle'); ?>
    <small>
        <?php echo Yii::t('model', 'View') ?> #<?php echo $model->id ?>
    </small>
    
</h1>-->

<?php if (Yii::app()->user->checkAccess('Waffle.*')): ?>
    <div class="admin-container hide">
        <?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
    </div>
<?php endif; ?>

<?php $this->renderPartial("_view", array("data" => $model)); ?>
<!--
<b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>
    <br />

<b><?php echo CHtml::encode($model->getAttributeLabel('version')); ?>:</b>
<?php echo CHtml::encode($model->version); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('cloned_from_id')); ?>:</b>
<?php echo CHtml::encode($model->cloned_from_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('_title')); ?>:</b>
<?php echo CHtml::encode($model->_title); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_en')); ?>:</b>
<?php echo CHtml::encode($model->slug_en); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('json_import_media_id')); ?>:</b>
<?php echo CHtml::encode($model->json_import_media_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('created')); ?>:</b>
<?php echo CHtml::encode($model->created); ?>
<br />

<?php /*
<b><?php echo CHtml::encode($model->getAttributeLabel('modified')); ?>:</b>
<?php echo CHtml::encode($model->modified); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('owner_id')); ?>:</b>
<?php echo CHtml::encode($model->owner_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('node_id')); ?>:</b>
<?php echo CHtml::encode($model->node_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_ar')); ?>:</b>
<?php echo CHtml::encode($model->slug_ar); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_bg')); ?>:</b>
<?php echo CHtml::encode($model->slug_bg); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_ca')); ?>:</b>
<?php echo CHtml::encode($model->slug_ca); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_cs')); ?>:</b>
<?php echo CHtml::encode($model->slug_cs); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_da')); ?>:</b>
<?php echo CHtml::encode($model->slug_da); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_de')); ?>:</b>
<?php echo CHtml::encode($model->slug_de); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_en_gb')); ?>:</b>
<?php echo CHtml::encode($model->slug_en_gb); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_en_us')); ?>:</b>
<?php echo CHtml::encode($model->slug_en_us); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_el')); ?>:</b>
<?php echo CHtml::encode($model->slug_el); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_es')); ?>:</b>
<?php echo CHtml::encode($model->slug_es); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_fi')); ?>:</b>
<?php echo CHtml::encode($model->slug_fi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_fil')); ?>:</b>
<?php echo CHtml::encode($model->slug_fil); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_fr')); ?>:</b>
<?php echo CHtml::encode($model->slug_fr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_hi')); ?>:</b>
<?php echo CHtml::encode($model->slug_hi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_hr')); ?>:</b>
<?php echo CHtml::encode($model->slug_hr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_hu')); ?>:</b>
<?php echo CHtml::encode($model->slug_hu); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_id')); ?>:</b>
<?php echo CHtml::encode($model->slug_id); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_iw')); ?>:</b>
<?php echo CHtml::encode($model->slug_iw); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_it')); ?>:</b>
<?php echo CHtml::encode($model->slug_it); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_ja')); ?>:</b>
<?php echo CHtml::encode($model->slug_ja); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_ko')); ?>:</b>
<?php echo CHtml::encode($model->slug_ko); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_lt')); ?>:</b>
<?php echo CHtml::encode($model->slug_lt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_lv')); ?>:</b>
<?php echo CHtml::encode($model->slug_lv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_nl')); ?>:</b>
<?php echo CHtml::encode($model->slug_nl); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_no')); ?>:</b>
<?php echo CHtml::encode($model->slug_no); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_pl')); ?>:</b>
<?php echo CHtml::encode($model->slug_pl); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_pt')); ?>:</b>
<?php echo CHtml::encode($model->slug_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_pt_br')); ?>:</b>
<?php echo CHtml::encode($model->slug_pt_br); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_pt_pt')); ?>:</b>
<?php echo CHtml::encode($model->slug_pt_pt); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_ro')); ?>:</b>
<?php echo CHtml::encode($model->slug_ro); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_ru')); ?>:</b>
<?php echo CHtml::encode($model->slug_ru); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_sk')); ?>:</b>
<?php echo CHtml::encode($model->slug_sk); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_sl')); ?>:</b>
<?php echo CHtml::encode($model->slug_sl); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_sr')); ?>:</b>
<?php echo CHtml::encode($model->slug_sr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_sv')); ?>:</b>
<?php echo CHtml::encode($model->slug_sv); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_th')); ?>:</b>
<?php echo CHtml::encode($model->slug_th); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_tr')); ?>:</b>
<?php echo CHtml::encode($model->slug_tr); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_uk')); ?>:</b>
<?php echo CHtml::encode($model->slug_uk); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_vi')); ?>:</b>
<?php echo CHtml::encode($model->slug_vi); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_zh')); ?>:</b>
<?php echo CHtml::encode($model->slug_zh); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_zh_cn')); ?>:</b>
<?php echo CHtml::encode($model->slug_zh_cn); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('slug_zh_tw')); ?>:</b>
<?php echo CHtml::encode($model->slug_zh_tw); ?>
<br />

<b><?php echo CHtml::encode($model->getAttributeLabel('waffle_qa_state_id')); ?>:</b>
<?php echo CHtml::encode($model->waffle_qa_state_id); ?>
<br />

    */
?>
-->