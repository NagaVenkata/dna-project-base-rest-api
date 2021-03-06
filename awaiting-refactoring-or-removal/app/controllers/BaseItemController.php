<?php

/**
 * Item resource controller.
 * This is a wrapper for all item resources, e.g. compositions, video files etc.
 * It works based on the node ID of the item which is provided instead of the resource ID when performing actions.
 */
abstract class BaseItemController extends AppRestController
{
    /**
     * @inheritdoc
     */
    protected $_modelName = 'Item';

    /**
     * @inheritdoc
     */
    public function accessRules()
    {
        return array(
            // Not logged in users can do the following actions.
            array(
                'allow',
                'actions' => array(
                    'preflight',
                    'getByRoute',
                    'getByNodeId',
                )
            ),
            // Logged in users can do whatever they want to.
            array('allow', 'users' => array('@')),
            // Not logged in users can't do anything except above.
            array('deny'),
        );
    }

    /**
     * Returns the requested item resource by node id.
     * Responds to path 'api/<version>/item/{node_id}'.
     * This endpoint is public but the resources are restricted by "RestrictedAccessBehavior".
     *
     * @param int $node_id the node id of the item to get, e.g 1234
     * @throws CHttpException
     */
    public function actionGetByNodeId($node_id)
    {
        if (!ctype_digit($node_id)) {
            throw new CHttpException(404, sprintf('Invalid node id %s - node ids must be numerical.', $node_id));
        }
        $model = $this->loadByNodeId($node_id);
        $this->sendResponse(200, $model->getAllAttributes());
    }

    /**
     * Returns the requested item resource.
     * Responds to path 'api/<version>/item/{route}'.
     * This endpoint is public but the resources are restricted by "RestrictedAccessBehavior".
     *
     * @param string $route the route of the item to get, e.g."/1234", "/terms".
     * @throws CHttpException
     */
    public function actionGetByRoute($route)
    {
        if (ctype_digit($route)) {
            throw new CHttpException(404, sprintf('Invalid route %s - routes must start with "/".', $route));
        }
        $model = $this->loadByRoute($route);
        $this->sendResponse(200, $model->getAllAttributes());
    }

    /**
     * @param int $node_id the node id of the item to get, e.g 1234
     * @return ActiveRecord
     * @throws CHttpException
     */
    public function loadByNodeId($node_id)
    {
        $modelId = null;
        $modelClass = null;
        $command = Yii::app()->getDb()->createCommand()
            ->select('id, model_class')
            ->from('item')
            ->where('node_id=:nodeId');
        $row = $command->queryRow(true, array(':nodeId' => (int) $node_id));
        if (!empty($row)) {
            $modelId = (int) $row['id'];
            $modelClass = (string) $row['model_class'];
        }
        if (empty($modelId) || empty($modelClass)) {
            throw new CHttpException(404, sprintf('Could not find node #%s.', $node_id));
        }
        $model = RestApiModel::loadItemByIdAndClass($modelId, $modelClass);
        if (is_null($model)) {
            throw new CHttpException(404, sprintf('Could not find model %s#%d.', $modelClass, $modelId));
        }
        return $model;
    }

    /**
     * @param string $route the route of the item to get, e.g."/1234", "/terms".
     * @return ActiveRecord
     * @throws CHttpException
     */
    public function loadByRoute($route)
    {
        $modelId = null;
        $modelClass = null;
        $command = Yii::app()->getDb()->createCommand()
            ->select('item.id, item.model_class, route.translation_route_language')
            ->from('route')
            ->leftJoin('item', 'item.node_id=route.node_id')
            ->where('route.route=:route');
        $row = $command->queryRow(true, array(':route' => strtolower((string) $route)));
        if (!empty($row)) {
            $modelId = (int) $row['id'];
            $modelClass = (string) $row['model_class'];
            // Set the application language to the route language.
            // This way we know which language the item and it's relations should be returned in.
            if (!empty($row['translation_route_language']) && Yii::app()->language !== $row['translation_route_language']) {
                Yii::app()->language = $row['translation_route_language'];
            }
        }
        if (empty($modelId) || empty($modelClass)) {
            throw new CHttpException(404, sprintf('Could not find node by route %s.', $route));
        }
        $model = RestApiModel::loadItemByIdAndClass($modelId, $modelClass);
        if (is_null($model)) {
            throw new CHttpException(404, sprintf('Could not find model %s#%d.', $modelClass, $modelId));
        }
        return $model;
    }
}
