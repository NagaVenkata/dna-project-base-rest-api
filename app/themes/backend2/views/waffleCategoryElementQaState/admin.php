<?php
$this->setPageTitle(
    Yii::t('model', 'Waffle Category Element Qa States')
    . ' - '
    . Yii::t('crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('model', 'Waffle Category Element Qa States');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'waffle-category-element-qa-state-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('model', 'Waffle Category Element Qa States'); ?>
        <small><?php echo Yii::t('crud', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('WaffleCategoryElementQaState.view.grid'); ?>


<?php
$this->widget('\TbGridView',
    array(
        'id' => 'waffle-category-element-qa-state-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        #'responsiveTable' => true,
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => '\TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'CLinkColumn',
                'header' => '',
                'labelExpression' => '$data->itemLabel',
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("id" => $data["id"]))'
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'id',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'status',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'draft_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'preview_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'public_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_en_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_ar_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_bg_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_ca_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_cs_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_da_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_de_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_en_gb_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_en_us_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_el_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_es_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_fi_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_fil_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_fr_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_hi_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_hr_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_hu_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_id_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_iw_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_it_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_ja_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_ko_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_lt_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_lv_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_nl_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_no_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_pl_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_pt_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_pt_br_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_pt_pt_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_ro_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_ru_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_sk_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_sl_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_sr_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_sv_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_th_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_tr_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_uk_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_vi_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_zh_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_zh_cn_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'translate_into_zh_tw_validation_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'approval_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'proofing_progress',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'previewing_welcome',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'candidate_for_public_status',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_approved',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'short_name_approved',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'ref_approved',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'name_approved',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'title_proofed',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'short_name_proofed',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'ref_proofed',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'name_proofed',
                'editable' => array(
                    'url' => $this->createUrl('/waffleCategoryElementQaState/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            */

            array(
                'class' => '\TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("WaffleCategoryElementQaState.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("WaffleCategoryElementQaState.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("WaffleCategoryElementQaState.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('WaffleCategoryElementQaState.view.grid'); ?>