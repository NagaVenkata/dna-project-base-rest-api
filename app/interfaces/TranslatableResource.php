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
    public function getTranslatableAttributes();

    /**
     * Returns the translated attributes for this resource.
     *
     * @return array the attributes.
     */
    public function getTranslatedAttributes();

    /**
     * Returns the node id for this translatable item.
     *
     * @return int the id.
     */
    public function getNodeId();
}
