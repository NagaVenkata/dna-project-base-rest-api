<?php
$this->breadcrumbs[Yii::t('model', 'Waffle Category Things')] = array('index');
$this->breadcrumbs[] = Yii::t('model', 'Index');
?>
<?php $this->widget("\TbBreadcrumb", array("links" => $this->breadcrumbs)) ?>
<?php
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage'), 'url' => array('admin')),
    );
}
?>
    <h1><?php echo Yii::t('model', 'Waffle Category Things'); ?></h1>

<?php $this->renderPartial("_toolbar"); ?>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>