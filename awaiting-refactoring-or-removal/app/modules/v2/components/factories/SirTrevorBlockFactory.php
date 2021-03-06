<?php

class SirTrevorBlockFactory extends \CApplicationComponent
{
    /**
     * @var array map of models that represent a Sir Trevor block.
     * Must extend RestApiSirTrevorBlock base class.
     */
    protected static $blocks = array(
        'text' => 'RestApiSirTrevorBlockText',
        'heading' => 'RestApiSirTrevorBlockHeading',
        'quote' => 'RestApiSirTrevorBlockQuote',
        'list' => 'RestApiSirTrevorBlockList',
        'linked_image' => 'RestApiSirTrevorBlockLinkedImage',
        'html_chunk' => 'RestApiSirTrevorBlockHtmlChunk',
        'download_link' => 'RestApiSirTrevorBlockDownloadLink',
        'video_file' => 'RestApiSirTrevorBlockVideoFile',
        'item_list_config' => 'RestApiSirTrevorBlockItemList',
        'slideshow_file' => 'RestApiSirTrevorBlockSlideshowFile',
        'visualization' => 'RestApiSirTrevorBlockVisualization',
    );

    /**
     * Forges a new block model for the given data.
     * The data must include at least an `id` and a `type`.
     *
     * @param array $data the data for the block model.
     * @param TranslatableResource $parent the context model that includes the block in it's composition.
     * @return RestApiSirTrevorBlock the block model.
     * @throws \CException if model cannot be created.
     */
    public function forgeBlock(array $data, $parent)
    {
        if (!isset($data['type'], $data['id'])) {
            throw new \RestApiInvalidBlockData('Block data is missing either `type` or `id`.');
        }
        if (!isset(self::$blocks[$data['type']])) {
            throw new \RestApiNoBlockModelFound(sprintf('No block model found for `%s`.', $data['type']));
        }

        /** @var RestApiSirTrevorBlock $model */
        $model = new self::$blocks[$data['type']]();
        // Only apply attributes to non-node referring blocks. Blocks referring nodes don't have any data anyways.
        if (!empty($data['data']) && !($model instanceof RestApiSirTrevorBlockNode)) {
            $model->setAttributes((array)$data['data']);
        }
        $model->context = $parent;
        $model->id = $data['id'];
        $model->type = $data['type'];
        if (isset($data['data']['node_id']) && $model instanceof RestApiSirTrevorBlockNode) {
            /** @var RestApiSirTrevorBlockNode $model */
            $model->nodeId = (int)$data['data']['node_id'];
            $model->applyData();
        }
        return $model;
    }
}

class RestApiInvalidBlockData extends CException
{

}

class RestApiNoBlockModelFound extends CException
{

}
