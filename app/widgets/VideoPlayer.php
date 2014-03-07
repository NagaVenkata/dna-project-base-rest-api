<?php

/**
 * VideoPlayer class.
 */
class VideoPlayer extends CWidget
{
    /**
     * @var VideoFile
     */
    public $videoFile;
    /**
     * @var P3Media[]
     */
    public $p3MediaFiles = array();
    /**
     * @var string
     */
    public $srcLang;

    public function init()
    {
        parent::init();
        if (!$this->videoFile instanceof VideoFile) {
            throw new CException(Yii::t('error', 'The passed model is not a VideoFile.'));
        }
        $this->p3MediaFiles = $this->getP3MediaFiles();
        $this->_initSrcLang();
        $this->_registerAssets();
    }

    public function run()
    {
        parent::run();
        $this->_registerJs();
        $this->render('view', array(
            'playerUrl' => $this->getPlayerUrl(),
            'srcLang' => $this->srcLang,
            'p3MediaFiles' => $this->p3MediaFiles,
        ));
    }

    /**
     * Returns P3Media files.
     * @return P3Media[]
     */
    public function getP3MediaFiles()
    {
        return $this->videoFile->getUploadedVideos();
    }

    /**
     * Returns the video player URL.
     * @return string
     */
    public function getPlayerUrl()
    {
        return request()->baseUrl . '/../components/mediaelement/build/flashmediaelement.swf';
    }

    /**
     * Returns the raw video URL.
     * @return string
     */
    public function getRawVideoUrl()
    {
        return rawurlencode($this->videoFile->getVideoUrl());
    }

    /**
     * Returns the video URL for a P3Media file.
     * @param integer $p3MediaId
     * @return null|string
     */
    public function getVideoUrl($p3MediaId)
    {
        return $this->videoFile->getVideoUrlForP3Media($p3MediaId);
    }

    /**
     * Returns the subtitle URL.
     * @return string
     */
    public function getSubtitleUrl()
    {
        return e($this->videoFile->getSubtitleUrl());
    }

    /**
     * Checks if a video exists.
     * @return boolean
     */
    public function videoExists()
    {
        return !empty($this->p3MediaFiles);
    }

    /**
     * Initializes the source language.
     */
    protected function _initSrcLang()
    {
        if (!isset($this->srcLang)) {
            $this->srcLang = substr(app()->language, 0, 2);
        }
    }

    /**
     * Registers the JS and CSS assets.
     */
    protected function _registerAssets()
    {
        app()->params['bowerAssets'] = app()->assetManager->publish(
            Yii::getPathOfAlias('bower-components'),
            true // hash by name
        );

        $assetsPath = app()->params['bowerAssets'];

        app()->clientScript->registerScriptFile($assetsPath . '/mediaelement/build/mediaelement-and-player.min.js');
        app()->clientScript->registerCssFile($assetsPath . '/mediaelement/build/mediaelementplayer.min.css');
    }

    /**
     * Registers the video player JS.
     */
    protected function _registerJs()
    {
        $js = <<<EOF
$(document).ready(function () {
    $('video').mediaelementplayer({
        startLanguage: '{$this->srcLang}',
        enablePluginDebug: true,
        plugins: ['flash', 'silverlight']
    });
});
EOF;

        app()->clientScript->registerScript('mediaelementplayer', $js, CClientScript::POS_END);
    }
}