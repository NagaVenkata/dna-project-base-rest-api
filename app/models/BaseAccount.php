<?php

/**
 * This is the model base class for the table "users".
 *
 * Columns in table "users" available as properties of the model:
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $activkey
 * @property integer $superuser
 * @property integer $status
 * @property string $create_at
 * @property string $lastvisit_at
 *
 * Relations of table "users" available as properties of the model:
 * @property Changeset[] $changesets
 * @property Profiles $profiles
 */
abstract class BaseAccount extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('create_at', 'required'),
                array('username, password, email, activkey, superuser, status, lastvisit_at', 'default', 'setOnEmpty' => true, 'value' => null),
                array('superuser, status', 'numerical', 'integerOnly' => true),
                array('username', 'length', 'max' => 20),
                array('password, email, activkey', 'length', 'max' => 128),
                array('lastvisit_at', 'safe'),
                array('id, username, password, email, activkey, superuser, status, create_at, lastvisit_at', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->username;
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
                'changesets' => array(self::HAS_MANY, 'Changeset', 'user_id'),
                'profiles' => array(self::HAS_ONE, 'Profiles', 'user_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'username' => Yii::t('model', 'Username'),
            'password' => Yii::t('model', 'Password'),
            'email' => Yii::t('model', 'Email'),
            'activkey' => Yii::t('model', 'Activkey'),
            'superuser' => Yii::t('model', 'Superuser'),
            'status' => Yii::t('model', 'Status'),
            'create_at' => Yii::t('model', 'Create At'),
            'lastvisit_at' => Yii::t('model', 'Lastvisit At'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.username', $this->username, true);
        $criteria->compare('t.password', $this->password, true);
        $criteria->compare('t.email', $this->email, true);
        $criteria->compare('t.activkey', $this->activkey, true);
        $criteria->compare('t.superuser', $this->superuser);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('t.create_at', $this->create_at, true);
        $criteria->compare('t.lastvisit_at', $this->lastvisit_at, true);


        return $criteria;

    }

}