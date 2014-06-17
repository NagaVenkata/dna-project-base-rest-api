<?php /* @var Controller $this */ ?>
    <?php
    Yii::import('p3pages.modules.*');

    $rootNode = P3Page::model()->findByAttributes(array('name_id' => 'Navbar'));
    $page = P3Page::getActivePage();
    if ($page !== null) {
        $translation = $page->getTranslationModel();
    } else {
        $translation = null;
    }

    $this->widget(
        '\TbNavbar',
        array(
            //'fluid' => true,
            'brandLabel' => Html::renderLogo(),
            'collapse' => true,
            'display' => TbHtml::NAVBAR_DISPLAY_FIXEDTOP,
            'items' => array(
                array(
                    'class' => '\TbNav',
                    'items' => P3Page::getMenuItems($rootNode)
                ),
                array(
                    'class' => '\TbNav',
                    'htmlOptions' => array(),
                    'items' => array(
                        array(
                            'label' => Yii::t('app', 'Dashboard'),
                            'icon' => TbHtml::ICON_TH,
                            'url' => array('/dashboard/index'),
                            'visible' => !Yii::app()->user->isGuest,
                        ),
                    ),
                ),
                //'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
                array(
                    'class' => '\TbNav',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        array(
                            'class' => 'language-menu',
                            'label' => Yii::app()->language,
                            'htmlOptions' => array('class' => 'language-menu'),
                            'items' => Controller::getLanguageMenuItems(),
                        ),
                        array(
                            'label' => Yii::app()->user->usernameShortened,
                            'visible' => !Yii::app()->user->isGuest,
                            'id' => 'accountMenuLink',
                            'items' => array(
                                array(
                                    'label' => Yii::t('app', 'Dashboard'),
                                    'url' => array('/dashboard/index'),
                                    'visible' => !Yii::app()->user->isGuest
                                ),
                                /*
                                array(
                                    'label' => Yii::t('app', 'Translations'),
                                    'icon' => 'globe',
                                    'url' => array('/account/translations'),
                                    'visible' => !Yii::app()->user->isGuest
                                ),
                                */
                                array(
                                    'label' => Yii::t('app', 'Profile'),
                                    'url' => array('/profile/edit'),
                                    'visible' => !Yii::app()->user->isGuest
                                ),
                                /*
                                array(
                                    'label' => Yii::t('app', 'History'),
                                    'icon' => 'time',
                                    'url' => array('/account/history'),
                                    'visible' => !Yii::app()->user->isGuest
                                ),
                                */
                                array(
                                    'label' => Yii::t('app', 'Manage Accounts'),
                                    'url' => array('/admin/manageAccounts'),
                                    'visible' => Yii::app()->user->isAdmin(),
                                ),
                                '---',
                                array(
                                    'label' => Yii::t('app', 'Logout'),
                                    'url' => array('/account/authenticate/logout'),
                                    'visible' => !Yii::app()->user->isGuest,
                                    'id' => 'logoutLink',
                                ),
                            )
                        ),
                        array(
                            'label' => Yii::t('app', 'Login'),
                            'url' => array('/account/authenticate/login'),
                            'visible' => Yii::app()->user->isGuest,
                            'id' => 'loginLink',
                        ),
                    ),
                ),
            )
        )
    );
    ?>
