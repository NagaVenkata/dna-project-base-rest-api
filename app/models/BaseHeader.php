<?php

/**
 * This is the model base class for the table "header".
 *
 * Columns in table "header" available as properties of the model:
 * @property string $id
 * @property string $title
 * @property string $menu_title
 * @property string $created
 * @property string $modified
 *
 * Relations of table "header" available as properties of the model:
 * @property PageAssociation[] $pageAssociations
 */
abstract class BaseHeader extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'header';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('title, menu_title, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
			array('title, menu_title', 'length', 'max'=>255),
			array('created, modified', 'safe'),
			array('id, title, menu_title, created, modified', 'safe', 'on'=>'search'),
		    )
		);
	}

	public function behaviors()
	{
		return array_merge(
		    parent::behaviors(), array(
			'savedRelated' => array(
				'class' => 'gii-template-collection.components.CSaveRelationsBehavior'
			)
		    )
		);
	}

	public function relations()
	{
		return array(
			'pageAssociations' => array(self::HAS_MANY, 'PageAssociation', 'header_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('crud', 'ID'),
			'title' => Yii::t('crud', 'Title'),
			'menu_title' => Yii::t('crud', 'Menu Title'),
			'created' => Yii::t('crud', 'Created'),
			'modified' => Yii::t('crud', 'Modified'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.id', $this->id, true);
		$criteria->compare('t.title', $this->title, true);
		$criteria->compare('t.menu_title', $this->menu_title, true);
		$criteria->compare('t.created', $this->created, true);
		$criteria->compare('t.modified', $this->modified, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}