<?php

class SelectProfileLanguage extends CWidget
{
    public $model;
    public $attributes = array();
    public $defaultValues = array();
    public $form;
    public $htmlOptions = array();

    /**
     * Initializes the widget.
     */
    public function init()
    {
        $this->setDefaultValues();
        $this->render('view', array(
            'model' => $this->model,
            'attributes' => $this->attributes,
            'form' => $this->form,
            'htmlOptions' => $this->getHtmlOptions(),
        ));
    }

    /**
     * Returns the HTML options.
     * @return array
     */
    public function getHtmlOptions()
    {
        $htmlOptions = array(
            'empty' => Yii::t('app', '- None -'),
        );

        return array_merge($htmlOptions, $this->htmlOptions);
    }

    /**
     * Sets the default attribute values.
     */
    public function setDefaultValues()
    {
        foreach ($this->defaultValues as $attribute => $defaultValue) {
            /** @var Profiles $this->model */
            if ($this->model->hasAttribute($attribute) && !isset($this->model->{$attribute})) {
                $this->model->{$attribute} = $defaultValue;
            }
        }
    }

    /**
     * Checks if a particular language attribute is set.
     * @param string $attribute the language attribute name (referring to e.g. $model->language1).
     * @return boolean
     */
    public function isLanguageSet($attribute)
    {
        return ($this->model->hasAttribute($attribute) && isset($this->model->{$attribute}));
    }

    /**
     * Renders a dropdown field.
     * @param string $attribute the model attribute (e.g. language1).
     * @return string the field markup.
     */
    public function renderDropdown($attribute)
    {
        $isRequiredAsteriskRed = $attribute === $this->attributes[0] && !$this->isLanguageSet($attribute);

        ob_start();
        echo $isRequiredAsteriskRed ? TbHtml::openTag('div', array('class' => 'required-red')) : '';
        echo $this->form->dropDownListRow($this->model, $attribute, Html::getLanguages(), $this->getHtmlOptions());
        echo $isRequiredAsteriskRed ? TbHtml::closeTag('div') : '';
        return ob_get_clean();
    }
}