<?php

/**
 * This is the model base class for the table "po_file_qa_state".
 *
 * Columns in table "po_file_qa_state" available as properties of the model:
 * @property string $id
 * @property string $status
 * @property integer $draft_validation_progress
 * @property integer $preview_validation_progress
 * @property integer $public_validation_progress
 * @property integer $approval_progress
 * @property integer $proofing_progress
 * @property integer $translations_draft_validation_progress
 * @property integer $translations_preview_validation_progress
 * @property integer $translations_public_validation_progress
 * @property integer $translations_approval_progress
 * @property integer $translations_proofing_progress
 * @property integer $previewing_welcome
 * @property integer $candidate_for_public_status
 * @property integer $title_approved
 * @property integer $file_approved
 * @property integer $title_proofed
 * @property integer $file_proofed
 *
 * Relations of table "po_file_qa_state" available as properties of the model:
 * @property PoFile[] $poFiles
 * @property PoFile[] $poFiles1
 * @property PoFile[] $poFiles2
 * @property PoFile[] $poFiles3
 * @property PoFile[] $poFiles4
 * @property PoFile[] $poFiles5
 * @property PoFile[] $poFiles6
 * @property PoFile[] $poFiles7
 */
abstract class BasePoFileQaState extends ActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'po_file_qa_state';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, title_approved, file_approved, title_proofed, file_proofed', 'default', 'setOnEmpty' => true, 'value' => null),
                array('draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, title_approved, file_approved, title_proofed, file_proofed', 'numerical', 'integerOnly' => true),
                array('status', 'length', 'max' => 255),
                array('id, status, draft_validation_progress, preview_validation_progress, public_validation_progress, approval_progress, proofing_progress, translations_draft_validation_progress, translations_preview_validation_progress, translations_public_validation_progress, translations_approval_progress, translations_proofing_progress, previewing_welcome, candidate_for_public_status, title_approved, file_approved, title_proofed, file_proofed', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->status;
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
            'poFiles' => array(self::HAS_MANY, 'PoFile', 'po_file_qa_state_id_de'),
            'poFiles1' => array(self::HAS_MANY, 'PoFile', 'po_file_qa_state_id_en'),
            'poFiles2' => array(self::HAS_MANY, 'PoFile', 'po_file_qa_state_id_cn'),
            'poFiles3' => array(self::HAS_MANY, 'PoFile', 'po_file_qa_state_id_es'),
            'poFiles4' => array(self::HAS_MANY, 'PoFile', 'po_file_qa_state_id_fa'),
            'poFiles5' => array(self::HAS_MANY, 'PoFile', 'po_file_qa_state_id_hi'),
            'poFiles6' => array(self::HAS_MANY, 'PoFile', 'po_file_qa_state_id_pt'),
            'poFiles7' => array(self::HAS_MANY, 'PoFile', 'po_file_qa_state_id_sv'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('model', 'ID'),
            'status' => Yii::t('model', 'Status'),
            'draft_validation_progress' => Yii::t('model', 'Draft Validation Progress'),
            'preview_validation_progress' => Yii::t('model', 'Preview Validation Progress'),
            'public_validation_progress' => Yii::t('model', 'Public Validation Progress'),
            'approval_progress' => Yii::t('model', 'Approval Progress'),
            'proofing_progress' => Yii::t('model', 'Proofing Progress'),
            'translations_draft_validation_progress' => Yii::t('model', 'Translations Draft Validation Progress'),
            'translations_preview_validation_progress' => Yii::t('model', 'Translations Preview Validation Progress'),
            'translations_public_validation_progress' => Yii::t('model', 'Translations Public Validation Progress'),
            'translations_approval_progress' => Yii::t('model', 'Translations Approval Progress'),
            'translations_proofing_progress' => Yii::t('model', 'Translations Proofing Progress'),
            'previewing_welcome' => Yii::t('model', 'Previewing Welcome'),
            'candidate_for_public_status' => Yii::t('model', 'Candidate For Public Status'),
            'title_approved' => Yii::t('model', 'Title Approved'),
            'file_approved' => Yii::t('model', 'File Approved'),
            'title_proofed' => Yii::t('model', 'Title Proofed'),
            'file_proofed' => Yii::t('model', 'File Proofed'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.status', $this->status, true);
        $criteria->compare('t.draft_validation_progress', $this->draft_validation_progress);
        $criteria->compare('t.preview_validation_progress', $this->preview_validation_progress);
        $criteria->compare('t.public_validation_progress', $this->public_validation_progress);
        $criteria->compare('t.approval_progress', $this->approval_progress);
        $criteria->compare('t.proofing_progress', $this->proofing_progress);
        $criteria->compare('t.translations_draft_validation_progress', $this->translations_draft_validation_progress);
        $criteria->compare('t.translations_preview_validation_progress', $this->translations_preview_validation_progress);
        $criteria->compare('t.translations_public_validation_progress', $this->translations_public_validation_progress);
        $criteria->compare('t.translations_approval_progress', $this->translations_approval_progress);
        $criteria->compare('t.translations_proofing_progress', $this->translations_proofing_progress);
        $criteria->compare('t.previewing_welcome', $this->previewing_welcome);
        $criteria->compare('t.candidate_for_public_status', $this->candidate_for_public_status);
        $criteria->compare('t.title_approved', $this->title_approved);
        $criteria->compare('t.file_approved', $this->file_approved);
        $criteria->compare('t.title_proofed', $this->title_proofed);
        $criteria->compare('t.file_proofed', $this->file_proofed);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}