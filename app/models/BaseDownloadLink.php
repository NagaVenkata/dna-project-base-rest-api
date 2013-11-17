<?php

/**
 * This is the model base class for the table "download_link".
 *
 * Columns in table "download_link" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $_title
 * @property integer $file_media_id
 * @property string $created
 * @property string $modified
 * @property string $node_id
 *
 * Relations of table "download_link" available as properties of the model:
 * @property DownloadLink $clonedFrom
 * @property DownloadLink[] $downloadLinks
 * @property Node $node
 * @property P3Media $fileMedia
 * @property SectionContent[] $sectionContents
 */
abstract class BaseDownloadLink extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'download_link';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, _title, file_media_id, created, modified, node_id', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version, file_media_id', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id', 'length', 'max' => 20),
                array('_title', 'length', 'max' => 255),
                array('created, modified', 'safe'),
                array('id, version, cloned_from_id, _title, file_media_id, created, modified, node_id', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->cloned_from_id;
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
                'clonedFrom' => array(self::BELONGS_TO, 'DownloadLink', 'cloned_from_id'),
                'downloadLinks' => array(self::HAS_MANY, 'DownloadLink', 'cloned_from_id'),
                'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
                'fileMedia' => array(self::BELONGS_TO, 'P3Media', 'file_media_id'),
                'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'download_link_id'),
            )
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            '_title' => Yii::t('model', 'Title'),
            'file_media_id' => Yii::t('model', 'File Media'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'node_id' => Yii::t('model', 'Node'),
        );
    }

    public function searchCriteria($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t._title', $this->_title, true);
        $criteria->compare('t.file_media_id', $this->file_media_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);


        return $criteria;

    }

}
