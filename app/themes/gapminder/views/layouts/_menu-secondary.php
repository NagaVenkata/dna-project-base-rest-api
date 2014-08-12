<?php
/** @var SiteController $this */
?>
<?php $this->widget(
    '\TbNavbar',
    array(
        'brandLabel' => Yii::t('app', 'Gapminder.org Home'),
        'brandUrl' => $this->getBrandUrl(),
        'collapse' => true,
        'display' => TbHtml::NAVBAR_DISPLAY_FIXEDTOP,
        'fluid' => true,
        'htmlOptions' => array(
            'class' => 'navbar-secondary',
            'containerOptions' => array(
                'class' => 'container-fluid',
            ),
        ),
        'items' => array(
            array(
                'class' => '\TbNav',
            ),
            array(
                'class' => '\TbNav',
                'htmlOptions' => array(
                    'class' => 'navbar-left',
                ),
                'items' => array(
                    array(
                        'label' => Yii::t('app', 'Dashboard'),
                        'icon' => TbHtml::ICON_TH,
                        'url' => array('/dashboard/index'),
                        'visible' => !Yii::app()->user->isGuest,
                    ),
                ),
            ),
            array(
                'class' => '\TbNav',
                'htmlOptions' => array(
                    'class' => 'navbar-right',
                ),
                'items' => array(
                    array(
                        'label' => Yii::t('app', 'Sign In'),
                        'url' => user()->loginUrl,
                        'visible' => Yii::app()->user->isGuest,
                        'id' => 'loginLink',
                    ),
                ),
            ),
        )
    )
); ?>
