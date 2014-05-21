<?php

// auto-loading
Yii::setPathOfAlias('Snapshot', dirname(__FILE__));
Yii::import('Snapshot.*');

/**
 * Properties made available through the RestrictedAccessBehavior class.
 * @property boolean $enableRestriction
 *
 * The followings are the available model relations:
 * @property Chapter[] $parentChapters
 * @property Tool[] $tools
 * @property Node[] $related
 */
class Snapshot extends BaseSnapshot
{
    use ItemTrait;

    public $firstFlowStep = 'info';

    // Add your model-specific methods here. This file will not be overridden by gtc except you force it.

    /**
     * @param string $className
     * @return Snapshot
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', 'This shows a visualization of a specific kind and state. It is a link to a snapshot of a tool for visually exploration of data. The Snapshot illustrates something described in the title and the about text.');
        parent::init();
    }

    public function getItemLabel()
    {
        return (string) !empty($this->title) ? $this->title : "Snapshot #" . $this->id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
            )
        );
    }

    public function relations()
    {
        return array_merge(
            parent::relations(),
            array(
                'parentChapters' => array(self::HAS_MANY, 'Chapter', array('id' => 'node_id'), 'through' => 'inNodes'),
                'tools' => array(self::HAS_MANY, 'Tool', array('id' => 'node_id'), 'through' => 'outNodes', 'condition' => 'relation=:relation', 'params' => array(':relation' => 'tools')),
                'related' => array(self::HAS_MANY, 'Node', array('id' => 'id'), 'through' => 'outNodes', 'condition' => 'relation=:relation', 'params' => array(':relation' => 'related')),
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
                array('thumbnail_media_id', 'validateThumbnail', 'on' => 'publishable'),
                array('about_' . $this->source_language . '', 'length', 'min' => 10, 'max' => 200),
                array('vizabi_state', 'validateVizabiState'),

            )
        );
        Yii::log("model->statusRequirementsRules(): " . print_r($this->statusRequirementsRules(), true), "trace", __METHOD__);
        Yii::log("model->flowStepRules(): " . print_r($this->flowStepRules(), true), "trace", __METHOD__);
        Yii::log("model->i18nRules(): " . print_r($this->i18nRules(), true), "trace", __METHOD__);
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function validateThumbnail()
    {
        return !is_null($this->thumbnail_media_id);
    }

    public function validateVizabiState($attribute)
    {
        $json_decoded = json_decode(trim($this->vizabi_state));
        if (strlen(trim($this->vizabi_state)) > 0 && is_null($json_decoded)) {
            $this->addError('vizabi_state', Yii::t('app', 'Vizabi state could not be parsed as JSON'));
        }
    }

    public function validateRelated()
    {
        return count($this->related) > 0;
    }

    /**
     * TODO html-length...
     * @return bool
     */
    public function htmlLength()
    {
        return true;
    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'slug_' . $this->source_language,
            ),
            'reviewable' => array(
                'vizabi_state',
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
            'state' => array(
                'vizabi_state',
                'tool_id',
                'embed_override',
            ),
            'info' => array(
                'title_' . $this->source_language,
                'slug_' . $this->source_language,
                'about_' . $this->source_language,
            ),
            'related' => array(
                'related',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'state' => Yii::t('app', 'State'),
            'info' => Yii::t('app', 'Info'),
            'related' => Yii::t('app', 'Related'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'title_en' => Yii::t('model', 'English Title'),
                'slug' => Yii::t('model', 'Nice link'),
                'slug_en' => Yii::t('model', 'English Nice link'),
                'about' => Yii::t('model', 'About'),
                'about_en' => Yii::t('model', 'About (English)'),
                'thumbnail_media_id' => Yii::t('model', 'Thumbnail'),
                'related' => Yii::t('model', 'Related'),
                'dataarticles' => Yii::t('model', 'Data'),
                'vizabi_state' => Yii::t('model', 'Vizabi State'),
                'tool' => Yii::t('model', 'Tool'),
                'embed_override' => Yii::t('model', 'Embed override'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'Descriptive language including the words that people would use to search for this. The title can not be longer than what fits in a headline of a Google search-result snippet.'),
                'slug' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "regional_population_map" url to the chapter with populations on the map.'),
                'about' => Yii::t('model', 'What\'s interesting with this visualization.'),
                'thumbnail_media_id' => Yii::t('model', 'This thumbnail is used in lists of snapshots. Automatically generated'),
                'related' => Yii::t('model', 'Users seeing this visualization may also be interested in these Items. especially list other visualizations that should be of interest. For example: A linechart showing the world Population trend, should be related to at least 4 things: 1) linecharts with four lines for regional Population trends, 2) linechart showing Babies per Woman, 3)  line chart showing Life Expectancy for the World, 3) the chapter about World Population'),
                'dataarticles' => Yii::t('model', 'This is the data that is being visualized.'),
                'vizabi_state' => Yii::t('model', 'A link to the visualization on the related page.'),
                'tool' => Yii::t('model', ''),
                'embed_override' => Yii::t('model', ''),
            )
        );
    }

    /**
     * The attributes that is returned by the REST api
     */
    public function getAllAttributes($includeRelated = true)
    {
        $response = new stdClass();

        $response->id = $this->id;
        $response->vizabi_state = json_decode(trim($this->vizabi_state));
        $response->tool = ($this->tool !== null) ? $this->tool->getAllAttributes() : null;
        $response->embed_override = $this->embed_override;
        $response->title = $this->title;
        $response->slug = $this->slug;
        $response->about = $this->about;
        $response->thumbnail = new stdClass();
        if (!is_null($this->thumbnail_media_id)) {
            $response->thumbnail->original = $this->thumbnailMedia->createUrl('original-public', true);
            $response->thumbnail->thumb = $this->thumbnailMedia->createUrl('related-thumb', true);
        }

        if ($includeRelated) {
            $response->related = array();
            foreach ($this->related as $related) {
                $response->related[] = $related->item()->getAllAttributes(false);
            }
        }

        return $response;
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

}
