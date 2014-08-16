<?php

// Configuration specific to Gapminder School CMS

// include envbootstrap
require(dirname(__FILE__) . '/envbootstrap/include.php');

// Always use UTC
date_default_timezone_set('UTC');

// Setup some inter-app path aliases
$basePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..';
$root = $basePath . DIRECTORY_SEPARATOR . '..';
Yii::setPathOfAlias('root', $root);

$gcmsConfig = array(
    'name' => 'Gapminder CMS',
    'language' => 'en', // default language, see also components.langHandler
    'theme' => 'gapminder',
    'sourceLanguage' => 'en', // source code language
    'params' => array(
        'env' => 'development',
    ),
    'preload' => array( //'ezc', // trying out if we can lazy-load this instead of preloading it...
        // preloading 'loginReturnUrlTracker' component to track the current return url that users should be redirected to after login
        'loginReturnUrlTracker'
    ),
    'aliases' => array(
        // bower components
        'bower-components' => 'root.bower_components',
        // i18n
        'i18n-columns' => 'vendor.neam.yii-i18n-columns',
        'i18n-attribute-messages' => 'vendor.neam.yii-i18n-attribute-messages',
        // qa-state
        'qa-state' => 'vendor.neam.yii-qa-state',
        // relational-graph-db
        'relational-graph-db' => 'vendor.neam.yii-relational-graph-db',
        // phpoffice libraries
        'phpexcel' => 'vendor.phpoffice.phpexcel.Classes',
        'phpword' => 'vendor.phpoffice.phpword.src',
        'phppowerpoint' => 'vendor.phpoffice.phppowerpoint.Classes',
        // yii graphviz
        'yii-graphviz' => 'vendor.ascendro.yii-graphviz',
        // fix hard-coded aliases
        'ext.wrest' => 'vendor.weavora.wrest',
        'ext.wrest.WRestController' => 'vendor.weavora.wrest.WRestController',
        'ext.wrest.WHttpRequest' => 'vendor.weavora.wrest.WHttpRequest',
        'ext.wrest.WRestResponse' => 'vendor.weavora.wrest.WRestResponse',
        'ext.wrest.JsonResponse' => 'vendor.weavora.wrest.JsonResponse',
        'application.gii.Migrate.MigrateCode' => 'vendor.mihanentalpo.yii-sql-migration-generator.Migrate.MigrateCode',
        //'bootstrap.widgets.TbButton' => 'vendor.neam.yii-workflow-ui.widgets.TbButton',
        'bootstrap.widgets.TbButton' => 'vendor.clevertech.yiibooster.src.widgets.TbButton',
        // Aliases to help reference the current default theme
        'theme' => 'vendor.neam.yii-simplicity-theme.themes.simplicity',
        'simplicity-theme' => 'vendor.neam.yii-simplicity-theme',
    ),
    'import' => array(
        'i18n-columns.behaviors.I18nColumnsBehavior',
        'i18n-attribute-messages.behaviors.I18nAttributeMessagesBehavior',
        'i18n-attribute-messages.components.MissingTranslationHandler',
        'vendor.motin.yii-owner-behavior.OwnerBehavior',
        'qa-state.behaviors.QaStateBehavior',
        'relational-graph-db.behaviors.RelationalGraphDbBehavior',
        'vendor.weavora.wrest.*',
        'vendor.weavora.wrest.actions.*',
        'vendor.weavora.wrest.behaviors.*',
        'application.components.dashboard.*',
        'application.components.user.*',
        'application.components.validators.*',
        'application.behaviors.EzcWorkflowBehavior',
        'application.behaviors.*',
        'application.workflows.custom.*',
        'application.workflows.*',
        'application.controllers.traits.*',
        'application.models.traits.*',
        'application.models.wrappers.Users',
        'application.exceptions.*',
    ),
    'modules' => array(
        // code generator
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => YII_GII_PASSWORD,
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1', '10.0.2.2'),
            'generatorPaths' => array(
                'vendor.phundament.gii-template-collection', // giix generators
                'vendor.mihanentalpo.yii-sql-migration-generator',
                'bootstrap.gii', // bootstrap generator
            ),
        ),
        'p3media' => array(
            'params' => array(
                'presets' => array(
                    'related-thumb' => array(
                        'name' => 'Related Panel Thumbnail',
                        'commands' => array(
                            'resize' => array(200, 200, 2),
                            'quality' => '100',
                        ),
                        'type' => 'jpg',
                    ),
                    'wide-profile-info-picture' => array(
                        'name' => 'Wide Profile Info Picture',
                        'commands' => array(
                            'resize' => array(110, 110, 7),
                            'quality' => 85,
                        ),
                    ),
                    'user-profile-picture' => array(
                        'name' => 'User Profile Picture',
                        'commands' => array(
                            'resize' => array(160, 160, 7), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type' => 'jpg',
                    ),
                    'user-profile-picture-small' => array(
                        'name' => 'User Profile Picture Small',
                        'commands' => array(
                            'resize' => array(70, 70, 7), // Image::AUTO
                            'quality' => '85',
                        ),
                        'type' => 'jpg',
                    ),
                    'original-public-webm' => array(
                        //'name'         => 'Original File Public',
                        'originalFile' => true,
                        'savePublic' => true,
                        'type' => 'webm',
                    ),
                    'original-public-mp4' => array(
                        //'name'         => 'Original File Public',
                        'originalFile' => true,
                        'savePublic' => true,
                        'type' => 'mp4',
                    ),
                ),
            ),
        ),
        'account' => array(
            'class' => 'application.components.AccountModule',
            'classMap' => array(
                'account' => 'Account',
                'signupForm' => 'SignupForm',
            ),
            'controllerMap' => array(
                'authenticate' => array(
                    'class' => 'application.controllers.AuthenticateController',
                    'layout' => WorkflowUi::LAYOUT_NARROW,
                ),
                'password' => array(
                    'class' => 'application.controllers.PasswordController',
                ),
                'signup' => array(
                    'class' => 'application.controllers.SignupController',
                    'layout' => WorkflowUi::LAYOUT_MINIMAL,
                ),
            ),
            'defaultLayout' => WorkflowUi::LAYOUT_NARROW,
            'fromEmailAddress' => \gapminder\envbootstrap\Identity::brand()->mailSentByMail,
        ),
    ),
    'components' => array(
        'loginReturnUrlTracker' => array(
            'class' => 'application.components.LoginReturnUrlTracker',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                //rest url patterns
                array('api/<model>/delete', 'pattern' => 'api/<model:\w+>/<_id:\d+>', 'verb' => 'DELETE'),
                array('api/<model>/update', 'pattern' => 'api/<model:\w+>/<_id:\d+>', 'verb' => 'PUT'),
                array('api/<model>/list', 'pattern' => 'api/<model:\w+>', 'verb' => 'GET'),
                array('api/<model>/get', 'pattern' => 'api/<model:\w+>/<_id:\d+>', 'verb' => 'GET'),
                array('api/<model>/create', 'pattern' => 'api/<model:\w+>', 'verb' => 'POST'),
                // REST CORS pattern
                array('api/<model>/preflight', 'pattern' => 'api/<model:\w+>', 'verb' => 'OPTIONS'),
                array('api/<model>/preflight', 'pattern' => 'api/<model:\w+>/<_id:\d+>', 'verb' => 'OPTIONS'),
                array('api/<model>/preflight', 'pattern' => 'api/<model:\w+>/subtitles', 'verb' => 'OPTIONS'),
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=' . YII_DB_HOST . (defined('YII_DB_PORT') ? ';port=' . YII_DB_PORT : '') . ';dbname=' . YII_DB_NAME,
            'emulatePrepare' => true,
            'username' => YII_DB_USER,
            'password' => YII_DB_PASSWORD,
            'charset' => 'utf8',
            'enableParamLogging' => true, // Log SQL parameters
            //'schemaCachingDuration'=>3600*24,
        ),
        'dbTest' => array(
            'connectionString' => 'mysql:host=' . TEST_DB_HOST . (defined('TEST_DB_PORT') ? ';port=' . TEST_DB_PORT : '') . ';dbname=' . TEST_DB_NAME,
            'emulatePrepare' => true,
            'username' => TEST_DB_USER,
            'password' => TEST_DB_PASSWORD,
            'charset' => 'utf8',
            'enableParamLogging' => true, // Log SQL parameters
            //'schemaCachingDuration'=>3600*24,
        ),
        // Supplied in main config
        'langHandler' => array(),
        // Static messages
        'messages' => array(
            'class' => 'CPhpMessageSource',
        ),
        // Db messages - component 1 - used for output in views
        'displayedMessages' => array(
            'class' => 'CDbMessageSource',
            'onMissingTranslation' => array('MissingTranslationHandler', 'returnSourceLanguageContents'),
        ),
        // Db messages - component 2 - used for input forms through virtual attributes
        'editedMessages' => array(
            'class' => 'CDbMessageSource',
            'onMissingTranslation' => array('MissingTranslationHandler', 'returnNull'),
        ),
        /*
        'messages' => array(
            'class' => 'P3PhpMessageSource',
            'mappings' => array(
                'en_us' => 'en',
                'es_es' => 'es',
                'fa_ir' => 'fa',
                'hi_in' => 'hi',
                'pt_pt' => 'pt',
                'sv_se' => 'sv',
            )
        ),
        */
        'authManager' => array(
            'class' => 'vendor.codemix.hybridauthmanager.HybridAuthManager',
            'authFile' => Yii::getPathOfAlias('root') . '/app/data/auth-gcms.php',
            'defaultRoles' => array('Anonymous', 'Member'),
        ),
        'assetManager' => array(
            'class' => 'AssetManager',
        ),
        'ezc' => array(
            'class' => 'application.components.EzcComponent',
            'tablePrefix' => 'ezc_',
        ),
        'sentry' => array(
            'dns' => SENTRY_DSN,
            'enabledEnvironments' => array(ENV),
            'environment' => ENV,
        ),
        'user' => array(
            'class' => 'application.components.WebUser',
            'loginUrl' => array('/account/authenticate/login'),
        ),
        'widgetFactory' => array(
            'widgets' => array(
                'TbSelect2' => array(
                    'assetPath' => dirname(__DIR__) . '/../vendor/crisu83/yiistrap-widgets/lib/select2',
                ),
            ),
        ),
    )
);

require('includes/logging.php');
require('includes/mail.php');

$config =& $gcmsConfig;
$applicationDirectory =& $basePath;

require($applicationDirectory . '/../vendor/neam/yii-workflow-core/config/yii-workflow-core.php');
require($applicationDirectory . '/../vendor/neam/yii-workflow-ui/config/yii-workflow-ui.php');
require($applicationDirectory . '/../vendor/neam/yii-simplicity-theme/config/yii-simplicity-theme.php');
require($applicationDirectory . '/../vendor/neam/yii-restricted-access/config/yii-restricted-access.php');
require($applicationDirectory . '/../vendor/neam/yii-workflow-task-list/config/yii-workflow-task-list.php');

return $gcmsConfig;
