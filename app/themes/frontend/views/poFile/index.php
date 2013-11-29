<?php
$this->breadcrumbs[Yii::t('model', 'Po Files')] = array('index');
$this->breadcrumbs[] = Yii::t('model', 'Index');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
<?php
if (!isset($this->menu) || $this->menu === array()) {
    $this->menu = array(
        array('label' => Yii::t('app', 'Create'), 'url' => array('create')),
        array('label' => Yii::t('app', 'Manage'), 'url' => array('admin')),
    );
}
?>
    <h1><?php echo Yii::t('model', 'Po Files'); ?> <small><?php echo PoFile::model()->itemDescriptionTooltip(); ?></small></h1>

<?php $this->renderPartial("_toolbar"); ?>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '/_item/_list-item',
));
?>