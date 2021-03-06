<?php

/**
 * Interface used by models that are available for translation.
 *
 * @see ItemTranslator
 */
interface TranslatableResource
{
    /**
     * Returns the attribute names that are allowed to be translated for this resource.
     *
     * @return array the attributes.
     */
    public function getTranslationAttributes();

    /**
     * Returns the translated attributes for this resource.
     *
     * @return array the attributes.
     */
    public function getTranslatedAttributes();
}
