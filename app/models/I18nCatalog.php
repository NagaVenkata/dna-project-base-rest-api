<?php

// auto-loading
Yii::setPathOfAlias('I18nCatalog', dirname(__FILE__));
Yii::import('I18nCatalog.*');

/**
 * i18n properties for this model fetched through the I18nColumnsBehavior class.
 * @property string $po_contents
 */
class I18nCatalog extends BaseI18nCatalog
{
    use ItemTrait;

    public $firstTranslationFlowStep = 'i18n';

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        $this->itemDescription = Yii::t('itemDescription', 'For developers to manage GUI string po-files.');
        parent::init();
    }

    public function getItemLabel()
    {
        return (string) !empty($this->title) ? $this->title : "I18n Catalog #" . $this->id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function rules()
    {

        $return = array_merge(
            parent::rules(),
            array(
                array('slug_en, slug_es, slug_hi, slug_pt, slug_sv, slug_de, slug_zh, slug_ar, slug_bg, slug_ca, slug_cs, slug_da, slug_en_gb, slug_en_us, slug_el, slug_fi, slug_fil, slug_fr, slug_he, slug_hr, slug_hu, slug_id, slug_it, slug_ja, slug_ko, slug_lt, slug_lv, slug_nl, slug_no, slug_pl, slug_pt_br, slug_pt_pt, slug_ro, slug_ru, slug_sk, slug_sl, slug_sr, slug_th, slug_tr, slug_uk, slug_vi, slug_zh_cn, slug_zh_tw, slug_fa', 'unique', 'className' => 'I18nCatalog'),
            ),
            $this->statusRequirementsRules(),
            $this->flowStepRules(),
            $this->i18nRules(),
            array(

                array('title', 'length', 'min' => 10, 'max' => 200),
                array('about', 'length', 'min' => 3, 'max' => 400),
                array('pot_import_media_id', 'validateFile', 'on' => implode("-step_import,", array('temporary', 'draft', 'reviewable', 'publishable')) . "-step_import,step_import"),
                array('po_contents', 'validatePoContents', 'on' => 'publishable'),

            )
        );
        Yii::log("model->rules(): " . print_r($return, true), "trace", __METHOD__);
        return $return;
    }

    public function validateFile($attribute)
    {
        if (!is_null($this->pot_import_media_id)) {
            // Should not throw an exception or cause an error until we actually have implemented a check of the file to import
            //$this->addError($attribute, Yii::t('app', '!validateFile'));
        }
    }

    public function validatePoContents($attribute)
    {

        if (!is_null($this->po_contents)) {
            $entries = $this->parsePoContents();
            if (!$entries) {
                $this->addError($attribute, Yii::t('app', 'Could not parse po contents'));
            }
        }

    }

    public function validatePoContentsTranslation($attribute)
    {

        // Throw exception when there are no po_contents to translate
        if (is_null($this->po_contents)) {
            throw new CException('There are currently no po_contents to translate, nevertheless validation was attempted');
        }

        // TODO: Implement and remove
        $this->addError($attribute, Yii::t('app', 'not valid translation since validation logic is not written'));

    }

    /**
     * TODO html-length...
     * @return bool
     */
    public function htmlLength()
    {
        if (false) {
        }
    }

    /**
     * @return Array contains every string information in your pofile
     */
    public function parsePoContents()
    {
        // TODO: Implement error handling. The parser currently raises an ambiguous undefined variable error if the format of the submitted PO content is invalid.
        $poparser = new Sepia\PoParser();
        $entries = $poparser->readVariable($this->po_contents);
        return $entries;
    }

    /**
     * Converts the parsed po entries to source messages in choiceformat (if plural_form entry) for translation
     * @return array
     * @throws CException
     */
    public function getParsedPoContentsForTranslation()
    {
        $entries = $this->parsePoContents();
        $parsedForTranslation = array();

        $i = 1;

        //$intoLocale = CLocale::getInstance($translateInto);
        //var_dump($sourceLocale->pluralRules, $intoLocale->pluralRules);

        foreach ($entries as $translationKey => $t) {

            $pft = new stdClass();
            $pft->id = $i;
            $pft->reference = isset($t['reference']) ? $t['reference'] : null;
            $pft->fuzzy = isset($t['fuzzy']) ? $t['fuzzy'] : null;

            $entry = array();
            if (isset($t["msgid_plural"])) {
                $entry[0] = isset($t["msgid_plural"]) ? $t["msgid_plural"][0] : null;
                $entry[1] = $t["msgstr"][0];
                isset($t["msgstr"][1]) ? ($entry[2] = $t["msgstr"][1]) : null;
                isset($t["msgstr"][2]) ? ($entry[3] = $t["msgstr"][2]) : null;
            } else {
                $entry[0] = null;
                $entry[1] = implode("", $t["msgstr"]);
            }

            // msg id json format
            if ($t["msgid"][0] == '' && isset($t["msgid"][1])) {
                array_shift($t["msgid"]);
                $msgid = implode("", $t["msgid"]);
            } else {
                $msgid = implode("", $t["msgid"]);
            }

            // source message context as metadata
            if (isset($t["msgctxt"][0])) {
                $pft->context = implode("", $t["msgctxt"]);
            }

            // convert to choice format if necessary
            if (isset($t["msgid_plural"])) {
                $sourceLocale = CLocale::getInstance($this->source_language);
                // Po format only supports two plural forms as source message (?) so we hard-code it for two plural forms
                $pft->sourceMessage = $sourceLocale->pluralRules[0] . "#" . $msgid . "|" . $sourceLocale->pluralRules[1] . "#" . $entry[0];
                $pft->plural_forms = true;
            } else {
                $pft->sourceMessage = $msgid;
                $pft->plural_forms = false;
            }

            /*
            // do not include fuzzy messages if not wanted
            if (!empty($t["fuzzy"])) {
                if (!$fuzzy) {
                    continue;
                } else {
                    // todo
                    // if (!fuzzy || options . fuzzy) {result}[translationKey] = [t . msgid_plural ? t . msgid_plural : null] . concat(t . msgstr);
                    throw new \CException("TODO");
                }
            }
            */

            $parsedForTranslation[] = $pft;
            $i++;
        }
        return $parsedForTranslation;
    }

    public function translatePoJsonMessages($messages, $lang)
    {
        $return = $messages;
        foreach ($return as $key => &$entry) {
            // Skip headers entry
            if (empty($key)) {
                continue;
            }

            $items = explode("\x04", $key);
            $context = (count($items) > 1) ? $items[0] : null;
            $sourceMessage = (isset($items[1])) ? $items[1] : $items[0];
            $category = $this->getTranslationCategory('po_contents', $context);

            // The entry has plural forms if the first array element is not null
            if (!is_null($entry[0])) {
                // The source content first plural form (the singular form) is the $sourceMessage,
                // the second plural form is the first $entry element
                $sourceMessage = ChoiceFormatHelper::toString(array($sourceMessage, $entry[0]), $this->source_language);
                $message = Yii::t($category, $sourceMessage, array(), 'displayedMessages');
                // The translation should be sent as elements 1->end of array
                $entry = array($entry[0]);
                $translationChoiceFormatArray = ChoiceFormatHelper::toArray($message, $lang);
                foreach ($translationChoiceFormatArray as $translation) {
                    // Special fallback - in case the target language has more plural forms than the source language
                    // we'll supply the "true" plural form as fallback for the non-existing plural forms
                    if (is_null($translation)) {
                        $translation = $translationChoiceFormatArray["true"];
                    }
                    $entry[] = $translation;
                }
            } else {
                $message = Yii::t($category, $sourceMessage, array(), 'displayedMessages');
                // The translation should be sent as element 1
                $entry[1] = $message;
            }
        }
        return $return;
    }

    /**
     * Define status-dependent fields
     * @return array
     */
    public function statusRequirements()
    {
        return array(
            'draft' => array(
                'title',
                'slug_' . $this->source_language,
            ),
            'reviewable' => array(
                'po_contents',
            ),
            'publishable' => array(
                'about',
            ),
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
                'title',
                'slug_' . $this->source_language,
                'about',
            ),
            'i18n' => array(
                'i18n_category',
                'po_contents',
            ),
            'import' => array(
                'pot_import_media_id',
            ),
        );
    }

    public function flowStepCaptions()
    {
        return array(
            'info' => Yii::t('app', 'Info'),
            'i18n' => Yii::t('app', 'I18n'),
            'import' => Yii::t('app', 'Import'),
        );
    }

    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(), array(
                'title' => Yii::t('model', 'Title'),
                'slug' => Yii::t('model', 'Nice link'),
                'slug_en' => Yii::t('model', 'English Nice link'),
                'about' => Yii::t('model', 'About'),
                'file' => Yii::t('model', 'File'),
            )
        );
    }

    public function attributeHints()
    {
        return array_merge(
            parent::attributeHints(), array(
                'title' => Yii::t('model', 'Title'),
                'about' => Yii::t('model', 'What is this .po file for?'),
                'file' => Yii::t('model', 'The actual file'),
            )
        );
    }

    /**
     * The attributes that is returned by the REST api
     */
    public function getAllAttributes()
    {

        $response = new stdClass();

        $response->id = $this->id;
        $response->title = $this->title;
        $response->slug = $this->slug;
        $response->about = $this->about;

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

    /**
     * Returns the PO files.
     * @return P3Media[]
     */
    public function getPoFiles()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition("mime_type IN ('text/x-po','text/plain')");
        $criteria->addCondition("t.type = 'file'");
        $criteria->addCondition("t.original_name LIKE '%.po%'");
        $criteria->limit = 100;
        $criteria->order = "t.created_at DESC";
        return P3Media::model()->findAll($criteria);
    }

    /**
     * Returns the PO file options.
     * @return array
     */
    public function getPoOptions()
    {
        return $this->getOptions($this->getPoFiles());
    }

    /**
     * Returns the translation category for the current model and attribute.
     *
     * @param string $attribute
     * @param string|null $context
     * @return string
     */
    public function getTranslationCategory($attribute, $context = null)
    {
        if ($context !== null) {
            return 'i18n_catalog-' . $this->id . '-' . $context . '-' . $attribute;
        } else {
            return 'i18n_catalog-' . $this->id . '-' . $attribute;
        }
    }

}
