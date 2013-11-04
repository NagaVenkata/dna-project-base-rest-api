<?php

// auto-loading
Yii::setPathOfAlias('Chapter', dirname(__FILE__));
Yii::import('Chapter.*');

class Chapter extends BaseChapter
{

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
        return (string) $this->title;
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
                'videos' => array(self::HAS_MANY, 'VideoFile', array('id' => 'node_id'), 'through' => 'outNodes'),
                'exercises' => array(self::HAS_MANY, 'Exercise', array('id' => 'node_id'), 'through' => 'outNodes'),
                'snapshots' => array(self::HAS_MANY, 'Snapshot', array('id' => 'node_id'), 'through' => 'outNodes'),
            )
        );
    }

    public $thumbnail;
    public $video;
    public $credits;

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                // Define status-dependent fields
                array('title, slug', 'required', 'on' => 'draft,preview,public'),
                array('thumbnail, about, video, teachers_guide, exercises, snapshots, credits', 'required', 'on' => 'public'),
                // Define step-dependent fields
                array('title, slug', 'safe', 'on' => 'step_title'),
                array('thumbnail_media_id', 'safe', 'on' => 'step_thumbnail'),
                array('about', 'safe', 'on' => 'step_about'),
                array('video', 'safe', 'on' => 'step_video'),
                array('teachers_guide', 'safe', 'on' => 'step_teachers_guide'),
                array('exercises', 'safe', 'on' => 'step_exercises'),
                array('snapshots', 'safe', 'on' => 'step_credits'),
                array('title, slug', 'required', 'on' => 'step_title'),
                array('thumbnail_media_id', 'required', 'on' => 'step_thumbnail'),
                array('about', 'required', 'on' => 'step_about'),
                array('video', 'required', 'on' => 'step_video'),
                array('teachers_guide', 'required', 'on' => 'step_teachers_guide'),
                array('exercises', 'required', 'on' => 'step_exercises'),
                array('snapshots', 'required', 'on' => 'step_credits'),
                // Ordinary validation rules
                array('thumbnail', 'validateThumbnail', 'on' => 'public'),
                array('about', 'length', 'min' => 10, 'max' => 200, 'on' => 'public'),
                array('video', 'validateVideo', 'on' => 'public'),
                array('teachers_guide', 'length', 'min' => 150, 'max' => 400, 'on' => 'public'),
                array('exercises', 'validateExercises', 'on' => 'public'),
                array('snapshots', 'validateSnapshots', 'on' => 'public'),
                array('credits', 'length', 'min' => 1, 'max' => 200, 'on' => 'public'),
            )
        );
    }

    public function validateThumbnail()
    {
        return !is_null($this->thumbnail_media_id);
    }

    public function validateVideo()
    {
        return count($this->videos) == 1;
    }

    public function validateExercises()
    {
        return count($this->exercises) > 0;
    }

    public function validateSnapshots()
    {
        return count($this->snapshots) > 0;
    }

    /**
     * TODO html-length...
     * @return bool
     */
    public function htmlLength()
    {
        return true;
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'title_en' => Yii::t('model', 'English Title'),
            )
        );
    }

    public function getAttributeHint($key)
    {
        $a = $this->attributeHints();
        if (isset($a[$key])){
            return $a[$key];
        }
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title_en' => Yii::t('model', 'Chapter titles are descriptive with common language. Mentioning what data, geography and time is covered. '),
                'slug_en' => Yii::t('model', 'This is part of the web-link to a page with this content. Keep the important words in there which makes the page rank higher in search engines. The identifier is "regional_population_map" url to the chapter with populatoins on the map.'),
                'thumbnail' => Yii::t('model', 'This thumbnail is the visual symbol that enables users to reconginze the chapter again in a list of thumbnails. It should capture the essence of the visual presentation. and should not look like other chapters. Many chapters show bubblechart, so th thumbnail must capture the specific aspect by focusing on an essential detail.'),
                'about_en' => Yii::t('model', 'Describe the purpose of the chapter, try aviding using the word "and". When repeating a lot of aspects there is probably a uniting aspect that should be written instead.'),
                'teachers_guide_en' => Yii::t('model', 'You are a teacher. Your time is presious and your students are picky.  By watching the video you\'ve already understood the content of this chapter. Now you are reading the guide looking for ways to engage your students without loosing time. If the guide is good, you will realize you don\'t need any fancy technology. Maybe you just need seven small stones. You may get an advice to give the students one of the exercises first and then give the presentation, when they are more curious for an answer. That\'s what a good guide can do for a teacher!'),
                'exercise' => Yii::t('model', 'Exercises let students build skills and use knowledge, instead of just memorize facts and then forget them. The exercises deal with the same phenomenas as the chapter video and mimics it\'s graphics so that students can bring their understanding from the videos and slideshows into assignments.'),
                'video' => Yii::t('model', 'The video does two things. First of all it shows some core global trends and patterns. But it also gives teachers ideas for how to make these learnings come alive with simple explanations that are easy to understand and remember.  This video does not give pracitcal advice for different equipment. Such videos are found as material with the exercises of the chapter.'),
                'snapshot' => Yii::t('model', 'The visualizaitons opens a window into the data, which let\'s the students generate their hypothesis and try answering quesitons themselves. With local data the story of the chapter can be made local, by selecting your country. The visualizations in this view should relate directly to those in the video. Visualizaitons that are indirectly relevant are in the related list.'),

                'tags' => Yii::t('model', ''),
                'dataChunks' => Yii::t('model', ''),
                'tests' => Yii::t('model', ''),
                'related' => Yii::t('model', ''),
                'credits' => Yii::t('model', ''),
            )
        );
    }

    public function search()
    {
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria(),
        ));
    }

}
