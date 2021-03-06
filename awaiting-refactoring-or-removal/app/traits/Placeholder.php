<?php

trait Placeholder
{

    /**
     * Returns any related items for the owner node.
     *
     * @param int $nodeId
     * @return array
     */
    public static function getItems($nodeId)
    {
        $command = \barebones\Barebones::fpdo()
            ->from('node related')
            ->select('related.id AS related_id, item.id AS item_id, item.model_class AS item_model_class')
            ->where(
                '(`relation`="related") AND (`relation`="related") AND (`node`.`id`=:nodeId)',
                array(':nodeId' => (int) $nodeId)
            )
            ->order('outEdges.weight ASC')
            ->leftOuterJoin('`node` `outNodes` ON (`outNodes`.`id`=`related`.`id`)')
            ->leftOuterJoin('`edge` `outEdges` ON (`outEdges`.`to_node_id`=`outNodes`.`id`)')
            ->leftOuterJoin('`node` `node` ON (`node`.`id`=`outEdges`.`from_node_id`)')
            ->innerJoin('`item` `item` ON (`item`.`node_id`=`related`.`id`)');

        $related = array();
        foreach ($command as $row) {
            $modelId = (int) $row['item_id'];
            $modelClass = (string) $row['item_model_class'];
            $model = RestApiModel::loadRelatedByIdAndClass($modelId, $modelClass);
            if (is_null($model)) {
                continue;
            }
            $related[] = $model->getRelatedAttributes();
        }
        return $related;
    }


}