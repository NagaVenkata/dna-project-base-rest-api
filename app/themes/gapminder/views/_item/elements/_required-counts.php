<?php
/* @var Controller|ItemController $this */
/* @var ActiveRecord|ItemTrait $model */
/* @var AppActiveForm $form */
/* @var array $requiredCounts */
?>
<?php if (!empty($requiredCounts) && $requiredCounts['remaining'] > 0): ?>
    <div class="required-counts">
        <span class="required-text">
            <?php echo Yii::t(
                'app',
                '* <em id="remaining-count">{remaining}</em> required fields missing.',
                array('{remaining}' => $requiredCounts['remaining'])
            ); ?>
        </span>
        <?php $this->widget(
            '\TbButton',
            array(
                'label' => Yii::t('button', 'Take action'),
                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                'url' => '#',
                'htmlOptions' => array(
                    'class' => 'required-button',
                    'id' => 'next-required',
                ),
            )
        ); ?>
    </div>
    <?php /*$this->widget(
        '\TbButton',
        array(
            'label' => Yii::t('button', 'Translation Done'),
            'type' => TbHtml::BUTTON_COLOR_DEFAULT,
            'url' => '#',
            'htmlOptions' => array(
                'id' => 'translation-done',
            ),
        )
    );*/ ?>
    <?php /*$this->widget(
        '\TbButton',
        array(
            'label' => Yii::t('button', 'Cancel'),
            'type' => TbHtml::BUTTON_COLOR_DEFAULT,
            'url' => '#',
            'htmlOptions' => array(
                'id' => 'translation-cancel',
            ),
        )
    );*/ ?>
    <?php publishJs('/themes/frontend/js/flowbar-form-controls.js', CClientScript::POS_END); ?>
<?php endif; ?>