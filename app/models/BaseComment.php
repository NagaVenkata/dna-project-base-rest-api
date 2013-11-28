<?php

/**
 * This is the model base class for the table "comment".
 *
 * Columns in table "comment" available as properties of the model:
 * @property string $id
 * @property integer $author_user_id
 * @property string $parent_id
 * @property string $_comment
 * @property string $created
 * @property string $modified
 *
 * Relations of table "comment" available as properties of the model:
 * @property Users $authorUser
 * @property Comment $parent
 * @property Comment[] $comments
 */
abstract class BaseComment extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'comment';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('author_user_id', 'required'),
                array('parent_id, _comment, created, modified', 'default', 'setOnEmpty' => true, 'value' => null),
                array('author_user_id', 'numerical', 'integerOnly' => true),
                array('parent_id', 'length', 'max' => 20),
                array('_comment, created, modified', 'safe'),
                array('id, author_user_id, parent_id, _comment, created, modified', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->parent_id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => '\GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(), array(
                'authorUser' => array(self::BELONGS_TO, 'Users', 'author_user_id'),
                'parent' => array(self::BELONGS_TO, 'Comment', 'parent_id'),
                'comments' => array(self::HAS_MANY, 'Comment', 'parent_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'author_user_id' => Yii::t('model', 'Author User'),
            'parent_id' => Yii::t('model', 'Parent'),
            '_comment' => Yii::t('model', 'Comment'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.author_user_id', $this->author_user_id);
        $criteria->compare('t.parent_id', $this->parent_id);
        $criteria->compare('t._comment', $this->_comment, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);


        return $criteria;

    }

}
