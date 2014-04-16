<?php

// auto-loading
Yii::setPathOfAlias('Section', dirname(__FILE__));
Yii::import('Section.*');

class Section extends BaseSection
{

    use ItemTrait;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function getItemLabel()
    {
        return isset($this->title) ? $this->title : 'Section #' . $this->id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(),
            array(
                'contents' => array(
                    self::HAS_MANY,
                    'Node',
                    array('id', 'id'),
                    'through' => 'outNodes',
                    'condition' => 'relation = :relation',
                    'params' => array(':relation' => 'contents')
                ),
            )
        );
    }

    public function rules()
    {
        $return = array_merge(
            parent::rules(),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            array(
                // Ordinary validation rules
                array('title_' . $this->source_language, 'length', 'min' => 3, 'max' => 200),
            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'title_' . $this->source_language,
            ),
            'reviewable' => array(
                'slug_' . $this->source_language,
            ),
            'publishable' => array(),
        );
    }

    /**
     * Define step-dependent fields
     * @return array
     */
    public function flowSteps()
    {
        return array(
            'info' => array(
                'title_' . $this->source_language,
                'slug_' . $this->source_language,
                'menu_label_' . $this->source_language,
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
        );
    }

}
