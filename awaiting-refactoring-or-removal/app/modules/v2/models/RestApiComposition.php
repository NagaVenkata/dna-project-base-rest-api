<?php

/**
 * Composite item resource model.
 */
class RestApiComposition extends BaseRestApiComposition implements TranslatableResource
{
    /**
     * @inheritdoc
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Returns "all" attributes for this resource.
     *
     * @return array
     */
    public function getAllAttributes()
    {
        return array(
            'node_id' => (int)$this->node_id,
            'item_type' => 'go_item',
            'url' => $this->getRouteUrl(),
            'url_translations' => $this->getTranslatedRouteUrls(),
            'source_language' => $this->source_language,
            'requested_translation_language' => (Yii::app()->language !== $this->source_language) ? Yii::app()->language : null,
            'attributes' => array_merge($this->getListableAttributes(), array(
                'composition' => SirTrevorParser::populateSirTrevorBlocks($this->composition, array('localize' => true, 'parent' => $this))
            )),
            'contributors' => ContributorItems::getItems($this->node_id),
            'related' => RelatedItems::getItems($this->node_id),
            'groups' => $this->getGroupData(),
            'home_navigation_tree' => RestApiNavigationTreeItem::buildTree(RestApiNavigationTreeItem::REF_HOME),
            'footer_navigation_tree_1' => RestApiNavigationTreeItem::buildTree(RestApiNavigationTreeItem::REF_FOOTER1),
            'footer_navigation_tree_2' => RestApiNavigationTreeItem::buildTree(RestApiNavigationTreeItem::REF_FOOTER2),
        );
    }

    /**
     * @inheritdoc
     */
    public function getListableAttributes()
    {
        return array(
            'composition_type' => $this->getCompositionTypeReference(),
            'heading' => $this->heading,
            'subheading' => $this->subheading,
            'about' => $this->about,
            'caption' => $this->caption,
            'slug' => $this->slug,
            'thumb' => array(
                'original' => $this->getThumbUrl('original-public'),
                '735x444' => $this->getThumbUrl('735x444'),
                '160x96' => $this->getThumbUrl('160x96'),
                '110x66' => $this->getThumbUrl('110x66'),
                '130x77' => $this->getThumbUrl('130x77'),
                '180x108' => $this->getThumbUrl('180x108'),
                '735x444-retina' => $this->getThumbUrl('735x444-retina'),
                '160x96-retina' => $this->getThumbUrl('160x96-retina'),
                '110x66-retina' => $this->getThumbUrl('110x66-retina'),
                '130x77-retina' => $this->getThumbUrl('130x77-retina'),
                '180x108-retina' => $this->getThumbUrl('180x108-retina'),
            ),
        );
    }

    /**
     * @inheritdoc
     */
    public function getTranslationAttributes()
    {
        return array(
            'heading',
            'subheading',
            'about',
            'caption',
            'composition',
        );
    }

    /**
     * @inheritdoc
     */
    public function getTranslatedAttributes()
    {
        return array(
            'node_id' => (int)$this->node_id,
            'item_type' => 'go_item',
            'url' =>  $this->getRouteUrl(),
            'url_translations' => $this->getTranslatedRouteUrls(),
            'source_language' => $this->source_language,
            'requested_translation_language' => (Yii::app()->language !== $this->source_language) ? Yii::app()->language : null,
            'attributes' => array(
                'heading' => $this->_heading,
                'subheading' => $this->_subheading,
                'about' => $this->_about,
                'caption' => $this->_caption,
                'composition' => SirTrevorParser::populateSirTrevorBlocks(
                        $this->composition,
                        array(
                            'localize' => false,
                            'mode' => RestApiSirTrevorBlockNode::MODE_TRANSLATION,
                            'parent' => $this
                        )
                    ),
            ),
            'translations' => array(
                'heading' => $this->heading,
                'subheading' => $this->subheading,
                'about' => $this->about,
                'caption' => $this->caption,
                // We need to populate the blocks again, with localizations this time.
                'composition' => SirTrevorParser::populateSirTrevorBlocks(
                        $this->composition,
                        array(
                            'localize' => true,
                            'mode' => RestApiSirTrevorBlockNode::MODE_TRANSLATION,
                            'parent' => $this
                        )
                    ),
            ),
            'labels' => array(
                'heading' => $this->getAttributeLabel('heading'),
                'subheading' => $this->getAttributeLabel('subheading'),
                'about' => $this->getAttributeLabel('about'),
                'caption' => $this->getAttributeLabel('caption'),
            ),
        );
    }

    /**
     * Returns the items `route` in all available languages.
     *
     * First choice is the `canonical` route for the specific language. Second choice is the `latest` added route for
     * the language. If neither is found, we have no route for that language and it wont be included in the result.
     *
     * @return array the language specific routes with language code as key and route as value.
     */
    public function getTranslatedRouteUrls()
    {
        $command = \barebones\Barebones::fpdo()
            ->from('route')
            ->where('node_id=:nodeId', array(':nodeId' => (int)$this->node_id))
            ->groupBy(array('canonical', 'translation_route_language'));
        $result = $command->fetchAll();

        $routes = array();
        foreach (LanguageHelper::getCodes() as $language) {
            foreach ($result as $row) {
                if ($row['translation_route_language'] !== $language) {
                    continue;
                }
                if ((int) $row['canonical'] === 1 || !isset($routes[$language])) {
                    $routes[$language] = $row['route'];
                }
            }
        }

        return $routes;
    }
}
