<?php

/**
 * This is the model base class for the table "html_chunk".
 *
 * Columns in table "html_chunk" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $markup_en
 * @property string $created
 * @property string $modified
 * @property string $node_id
 * @property string $markup_es
 * @property string $markup_fa
 * @property string $markup_hi
 * @property string $markup_pt
 * @property string $markup_sv
 * @property string $markup_cn
 * @property string $markup_de
 *
 * Relations of table "html_chunk" available as properties of the model:
 * @property HtmlChunk $clonedFrom
 * @property HtmlChunk[] $htmlChunks
 * @property Node $node
 * @property SectionContent[] $sectionContents
 */
abstract class BaseHtmlChunk extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'html_chunk';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, markup_en, created, modified, node_id, markup_es, markup_fa, markup_hi, markup_pt, markup_sv, markup_cn, markup_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, node_id', 'length', 'max' => 20),
                array('markup_en, created, modified, markup_es, markup_fa, markup_hi, markup_pt, markup_sv, markup_cn, markup_de', 'safe'),
                array('id, version, cloned_from_id, markup_en, created, modified, node_id, markup_es, markup_fa, markup_hi, markup_pt, markup_sv, markup_cn, markup_de', 'safe', 'on' => 'search'),
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
        return array(
            'clonedFrom' => array(self::BELONGS_TO, 'HtmlChunk', 'cloned_from_id'),
            'htmlChunks' => array(self::HAS_MANY, 'HtmlChunk', 'cloned_from_id'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'html_chunk_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'markup_en' => Yii::t('model', 'Markup En'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'node_id' => Yii::t('model', 'Node'),
            'markup_es' => Yii::t('model', 'Markup Es'),
            'markup_fa' => Yii::t('model', 'Markup Fa'),
            'markup_hi' => Yii::t('model', 'Markup Hi'),
            'markup_pt' => Yii::t('model', 'Markup Pt'),
            'markup_sv' => Yii::t('model', 'Markup Sv'),
            'markup_cn' => Yii::t('model', 'Markup Cn'),
            'markup_de' => Yii::t('model', 'Markup De'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.version', $this->version);
        $criteria->compare('t.cloned_from_id', $this->cloned_from_id);
        $criteria->compare('t.markup_en', $this->markup_en, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.markup_es', $this->markup_es, true);
        $criteria->compare('t.markup_fa', $this->markup_fa, true);
        $criteria->compare('t.markup_hi', $this->markup_hi, true);
        $criteria->compare('t.markup_pt', $this->markup_pt, true);
        $criteria->compare('t.markup_sv', $this->markup_sv, true);
        $criteria->compare('t.markup_cn', $this->markup_cn, true);
        $criteria->compare('t.markup_de', $this->markup_de, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}