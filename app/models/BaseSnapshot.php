<?php

/**
 * This is the model base class for the table "snapshot".
 *
 * Columns in table "snapshot" available as properties of the model:
 * @property string $id
 * @property integer $version
 * @property string $cloned_from_id
 * @property string $title_en
 * @property string $slug_en
 * @property string $about_en
 * @property string $link
 * @property string $embed_override
 * @property string $tool_id
 * @property string $created
 * @property string $modified
 * @property string $node_id
 * @property string $title_es
 * @property string $title_fa
 * @property string $title_hi
 * @property string $title_pt
 * @property string $title_sv
 * @property string $title_cn
 * @property string $title_de
 * @property string $slug_es
 * @property string $slug_fa
 * @property string $slug_hi
 * @property string $slug_pt
 * @property string $slug_sv
 * @property string $slug_cn
 * @property string $slug_de
 * @property string $about_es
 * @property string $about_fa
 * @property string $about_hi
 * @property string $about_pt
 * @property string $about_sv
 * @property string $about_cn
 * @property string $about_de
 * @property string $snapshot_qa_state_id_en
 * @property string $snapshot_qa_state_id_es
 * @property string $snapshot_qa_state_id_fa
 * @property string $snapshot_qa_state_id_hi
 * @property string $snapshot_qa_state_id_pt
 * @property string $snapshot_qa_state_id_sv
 * @property string $snapshot_qa_state_id_cn
 * @property string $snapshot_qa_state_id_de
 *
 * Relations of table "snapshot" available as properties of the model:
 * @property DataSource[] $dataSources
 * @property ExamQuestion[] $examQuestions
 * @property SectionContent[] $sectionContents
 * @property SnapshotQaState $snapshotQaStateIdDe
 * @property Node $node
 * @property Snapshot $clonedFrom
 * @property Snapshot[] $snapshots
 * @property Tool $tool
 * @property SnapshotQaState $snapshotQaStateIdEn
 * @property SnapshotQaState $snapshotQaStateIdCn
 * @property SnapshotQaState $snapshotQaStateIdEs
 * @property SnapshotQaState $snapshotQaStateIdFa
 * @property SnapshotQaState $snapshotQaStateIdHi
 * @property SnapshotQaState $snapshotQaStateIdPt
 * @property SnapshotQaState $snapshotQaStateIdSv
 */
abstract class BaseSnapshot extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'snapshot';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('version, cloned_from_id, title_en, slug_en, about_en, link, embed_override, tool_id, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, about_es, about_fa, about_hi, about_pt, about_sv, about_cn, about_de, snapshot_qa_state_id_en, snapshot_qa_state_id_es, snapshot_qa_state_id_fa, snapshot_qa_state_id_hi, snapshot_qa_state_id_pt, snapshot_qa_state_id_sv, snapshot_qa_state_id_cn, snapshot_qa_state_id_de', 'default', 'setOnEmpty' => true, 'value' => null),
                array('version', 'numerical', 'integerOnly' => true),
                array('cloned_from_id, tool_id, node_id, snapshot_qa_state_id_en, snapshot_qa_state_id_es, snapshot_qa_state_id_fa, snapshot_qa_state_id_hi, snapshot_qa_state_id_pt, snapshot_qa_state_id_sv, snapshot_qa_state_id_cn, snapshot_qa_state_id_de', 'length', 'max' => 20),
                array('title_en, slug_en, link, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de', 'length', 'max' => 255),
                array('about_en, embed_override, created, modified, about_es, about_fa, about_hi, about_pt, about_sv, about_cn, about_de', 'safe'),
                array('id, version, cloned_from_id, title_en, slug_en, about_en, link, embed_override, tool_id, created, modified, node_id, title_es, title_fa, title_hi, title_pt, title_sv, title_cn, title_de, slug_es, slug_fa, slug_hi, slug_pt, slug_sv, slug_cn, slug_de, about_es, about_fa, about_hi, about_pt, about_sv, about_cn, about_de, snapshot_qa_state_id_en, snapshot_qa_state_id_es, snapshot_qa_state_id_fa, snapshot_qa_state_id_hi, snapshot_qa_state_id_pt, snapshot_qa_state_id_sv, snapshot_qa_state_id_cn, snapshot_qa_state_id_de', 'safe', 'on' => 'search'),
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
            'dataSources' => array(self::HAS_MANY, 'DataSource', 'cloned_from_id'),
            'examQuestions' => array(self::HAS_MANY, 'ExamQuestion', 'cloned_from_id'),
            'sectionContents' => array(self::HAS_MANY, 'SectionContent', 'snapshot_id'),
            'snapshotQaStateIdDe' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_de'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            'clonedFrom' => array(self::BELONGS_TO, 'Snapshot', 'cloned_from_id'),
            'snapshots' => array(self::HAS_MANY, 'Snapshot', 'cloned_from_id'),
            'tool' => array(self::BELONGS_TO, 'Tool', 'tool_id'),
            'snapshotQaStateIdEn' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_en'),
            'snapshotQaStateIdCn' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_cn'),
            'snapshotQaStateIdEs' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_es'),
            'snapshotQaStateIdFa' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_fa'),
            'snapshotQaStateIdHi' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_hi'),
            'snapshotQaStateIdPt' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_pt'),
            'snapshotQaStateIdSv' => array(self::BELONGS_TO, 'SnapshotQaState', 'snapshot_qa_state_id_sv'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'version' => Yii::t('model', 'Version'),
            'cloned_from_id' => Yii::t('model', 'Cloned From'),
            'title_en' => Yii::t('model', 'Title En'),
            'slug_en' => Yii::t('model', 'Slug En'),
            'about_en' => Yii::t('model', 'About En'),
            'link' => Yii::t('model', 'Link'),
            'embed_override' => Yii::t('model', 'Embed Override'),
            'tool_id' => Yii::t('model', 'Tool'),
            'created' => Yii::t('model', 'Created'),
            'modified' => Yii::t('model', 'Modified'),
            'node_id' => Yii::t('model', 'Node'),
            'title_es' => Yii::t('model', 'Title Es'),
            'title_fa' => Yii::t('model', 'Title Fa'),
            'title_hi' => Yii::t('model', 'Title Hi'),
            'title_pt' => Yii::t('model', 'Title Pt'),
            'title_sv' => Yii::t('model', 'Title Sv'),
            'title_cn' => Yii::t('model', 'Title Cn'),
            'title_de' => Yii::t('model', 'Title De'),
            'slug_es' => Yii::t('model', 'Slug Es'),
            'slug_fa' => Yii::t('model', 'Slug Fa'),
            'slug_hi' => Yii::t('model', 'Slug Hi'),
            'slug_pt' => Yii::t('model', 'Slug Pt'),
            'slug_sv' => Yii::t('model', 'Slug Sv'),
            'slug_cn' => Yii::t('model', 'Slug Cn'),
            'slug_de' => Yii::t('model', 'Slug De'),
            'about_es' => Yii::t('model', 'About Es'),
            'about_fa' => Yii::t('model', 'About Fa'),
            'about_hi' => Yii::t('model', 'About Hi'),
            'about_pt' => Yii::t('model', 'About Pt'),
            'about_sv' => Yii::t('model', 'About Sv'),
            'about_cn' => Yii::t('model', 'About Cn'),
            'about_de' => Yii::t('model', 'About De'),
            'snapshot_qa_state_id_en' => Yii::t('model', 'Snapshot Qa State Id En'),
            'snapshot_qa_state_id_es' => Yii::t('model', 'Snapshot Qa State Id Es'),
            'snapshot_qa_state_id_fa' => Yii::t('model', 'Snapshot Qa State Id Fa'),
            'snapshot_qa_state_id_hi' => Yii::t('model', 'Snapshot Qa State Id Hi'),
            'snapshot_qa_state_id_pt' => Yii::t('model', 'Snapshot Qa State Id Pt'),
            'snapshot_qa_state_id_sv' => Yii::t('model', 'Snapshot Qa State Id Sv'),
            'snapshot_qa_state_id_cn' => Yii::t('model', 'Snapshot Qa State Id Cn'),
            'snapshot_qa_state_id_de' => Yii::t('model', 'Snapshot Qa State Id De'),
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
        $criteria->compare('t.title_en', $this->title_en, true);
        $criteria->compare('t.slug_en', $this->slug_en, true);
        $criteria->compare('t.about_en', $this->about_en, true);
        $criteria->compare('t.link', $this->link, true);
        $criteria->compare('t.embed_override', $this->embed_override, true);
        $criteria->compare('t.tool_id', $this->tool_id);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.node_id', $this->node_id);
        $criteria->compare('t.title_es', $this->title_es, true);
        $criteria->compare('t.title_fa', $this->title_fa, true);
        $criteria->compare('t.title_hi', $this->title_hi, true);
        $criteria->compare('t.title_pt', $this->title_pt, true);
        $criteria->compare('t.title_sv', $this->title_sv, true);
        $criteria->compare('t.title_cn', $this->title_cn, true);
        $criteria->compare('t.title_de', $this->title_de, true);
        $criteria->compare('t.slug_es', $this->slug_es, true);
        $criteria->compare('t.slug_fa', $this->slug_fa, true);
        $criteria->compare('t.slug_hi', $this->slug_hi, true);
        $criteria->compare('t.slug_pt', $this->slug_pt, true);
        $criteria->compare('t.slug_sv', $this->slug_sv, true);
        $criteria->compare('t.slug_cn', $this->slug_cn, true);
        $criteria->compare('t.slug_de', $this->slug_de, true);
        $criteria->compare('t.about_es', $this->about_es, true);
        $criteria->compare('t.about_fa', $this->about_fa, true);
        $criteria->compare('t.about_hi', $this->about_hi, true);
        $criteria->compare('t.about_pt', $this->about_pt, true);
        $criteria->compare('t.about_sv', $this->about_sv, true);
        $criteria->compare('t.about_cn', $this->about_cn, true);
        $criteria->compare('t.about_de', $this->about_de, true);
        $criteria->compare('t.snapshot_qa_state_id_en', $this->snapshot_qa_state_id_en);
        $criteria->compare('t.snapshot_qa_state_id_es', $this->snapshot_qa_state_id_es);
        $criteria->compare('t.snapshot_qa_state_id_fa', $this->snapshot_qa_state_id_fa);
        $criteria->compare('t.snapshot_qa_state_id_hi', $this->snapshot_qa_state_id_hi);
        $criteria->compare('t.snapshot_qa_state_id_pt', $this->snapshot_qa_state_id_pt);
        $criteria->compare('t.snapshot_qa_state_id_sv', $this->snapshot_qa_state_id_sv);
        $criteria->compare('t.snapshot_qa_state_id_cn', $this->snapshot_qa_state_id_cn);
        $criteria->compare('t.snapshot_qa_state_id_de', $this->snapshot_qa_state_id_de);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}