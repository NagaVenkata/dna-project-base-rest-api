<?php

use Propel\Runtime\Propel;
use Propel\Runtime\Exception\PropelException;
use barebones\HttpException;

trait RestApiPropelObjectControllerTrait
{

    /**
     * @inheritdoc
     */
    public function getModel()
    {
        $id = $this->request->getParam('id');
        $modelName = '\\propel\\models\\' . ucfirst(str_replace("RestApi", "", $this->_modelName));
        if (empty($this->_modelName) || !class_exists($modelName)) {
            throw new HttpException(500, 'Invalid configuration');
        }
        if ($id) {
            $queryClass = $modelName . 'Query';
            $model = $queryClass::create()->findPk($id);
        } else {
            $model = new $modelName();
        }
        if ($model === null) {
            throw new HttpException(404);
        }
        return $model;
    }

    public $page = 'Foo_page';
    public $limit = 'Foo_limit';
    //public $offset = 'Foo_offset';
    public $order = 'Foo_order';
    public $info = 'Foo_info';
    public $defaultLimit = 10;
    public $nullString = 'null';

    /**
     * @param $filterBy
     * @param \Propel\Runtime\ActiveQuery\ModelCriteria $query
     */
    protected function applyFilterQuery($filterBy, &$query)
    {

        //$dirName = array("priority1", "priority2", "priority3");
        $dirName = \propel\models\CategoryQuery::create()->select(array('name'))
                                                         ->find()
                                                         ->toArray();
        // Make sure the filter parameters are allowed for rest-filtering
        $orderParam = $this->request->getParam($this->order);

        $orderByStatements = explode(",", $orderParam);

        $campaign_info_found = false;

        
        if (get_class($this->getModel()) == 'propel\models\Campaign') {

            $campaign_info_found  = true;
        }



        foreach ($orderByStatements as $orderByStatement) {

            $filter_key = null;

            if(stripos($orderByStatement, 'Campaign.info') !== false) {

                $dir_key = explode(" ", $orderByStatement)[2];

                if(in_array($dir_key, $dirName)) {

                    /*$columnName = str_ireplace(' priority1', '', $orderByStatement);
                    $filter_key = 'priority1';*/
                    $filter_key = $dir_key;
                }

            }

            /*if(array_search($orderByStatement, $dirName)) {

                /*$columnName = str_ireplace(' priority1', '', $orderByStatement);
                $filter_key = 'priority1';
                print_r($orderByStatement);
                print_r($dirName[array_search($orderByStatement, $dirName)]);
                $filter_key = $dirName[array_search($orderByStatement, $dirName)];
            }

            /*if (stripos($orderByStatement, ' priority1') !== false) {
                $columnName = str_ireplace(' priority1', '', $orderByStatement);
                $filter_key = 'priority1';
            }

            if (stripos($orderByStatement, ' priority2') !== false) {
                $columnName = str_ireplace(' priority2', '', $orderByStatement);
                $filter_key = 'priority2';
            }

            if (stripos($orderByStatement, ' priority3') !== false) {
                $columnName = str_ireplace(' priority3', '', $orderByStatement);
                $filter_key = 'priority3';
            }*/

        }
            
        if (!empty($filterBy) && is_array($filterBy)) {
            foreach ($filterBy as $key => $val) {
                if($key == 'facebook_tab_enabled') {
                    $query->where($key . ' IS NULL');
                }
                if (!is_null($this->request->getParam($val))) {
                    // Add model name if no relation is specified
                    if (stripos($key, '.') === false) {
                        $key = $query->getModelShortName() . '.' . $key;
                    }
                    $param = $this->request->getParam($val);
                    if ($param === $this->nullString) {
                        $query->where($key . ' IS NULL');
                    } elseif ($param === "<>" . $this->nullString) {
                        $query->where($key . ' IS NOT NULL');
                    } else {
                        AppUtil::compare($query, $key, $param);
                    }
                }
            }
        }

        if(!empty($filter_key)) {
            if($filter_key != "priority1") {
                $query->where("info='" . $filter_key . "'" . " AND facebook_tab_enabled IS NULL");
            } else {
                $query->where("info='" . $filter_key . "'" . " OR info IS NULL AND facebook_tab_enabled IS NULL");
            }
        } else if($campaign_info_found){
            $query->where("(info='priority1' OR info IS NULL) AND facebook_tab_enabled IS NULL");
        } 

    }

    /**
     * @param \Propel\Runtime\ActiveQuery\ModelCriteria $query
     */
    protected function applyListQuery(&$query)
    {

        $actions = $this->actions();
        $params = $actions["list"];

        $filterBy = $params["filterBy"];
        $this->applyFilterQuery($filterBy, $query);

        /*
        $c->limit = (int) (($limit = $this->request->getParam($this->limit)) ? $limit : $this->defaultLimit);
        $page = (int) $this->request->getParam($this->page) - 1;
        $c->offset = ($offset = $limit * $page) ? $offset : 0;
        */
        

        $orderParam = $this->request->getParam($this->order);

        
        if (!empty($orderParam)) {

            // Split into propel syntax, for instance 'Foo.official_ordinal DESC, Bar.ordinal'
            $orderByStatements = explode(",", $orderParam);
            foreach ($orderByStatements as $orderByStatement) {
                // Handle DESC/ASC
                if(stripos($orderByStatement, 'Campaign.info') === false) {
                    $order = null;
                    if (stripos($orderByStatement, ' desc') !== false) {
                        $columnName = str_ireplace(' desc', '', $orderByStatement);
                        $order = 'desc';
                    } elseif (stripos($orderByStatement, ' asc') !== false) {
                        $columnName = str_ireplace(' asc', '', $orderByStatement);
                        $order = 'asc';
                    } else {
                        $columnName = $orderByStatement;
                    }
                    // Handle calculated columns
                    if (stripos($columnName, ' is null') !== false) {
                        $query->withColumn($columnName, md5($columnName));
                        $columnName = md5($columnName);
                    }
                    if ($order) {
                        $query->orderBy(trim($columnName), $order);
                    }else {
                        $query->orderBy(trim($columnName));
                    }
                }    
            }

        }

        /*
        $reverse = $this->request->getParam('reverse');
        if ($reverse == 1) {
            $c->order .= " DESC";
        } else {
            $c->order .= " ASC";
        }
        */

    }

    protected function getPaginatedListActionResults($model)
    {

        // Get list action configuration from controller list action configuration
        $actions = $this->actions();
        $params = $actions["list"];
        if (is_array($params)) {
            foreach ($params as $param => $value) {
                if (property_exists($this, $param)) {
                    $this->$param = $value;
                }
            }
        }

        // Initiate propel object query
        $propelObjectQueryClass = get_class($model) . "Query";

        /** @var \Propel\Runtime\ActiveQuery\ModelCriteria $query */
        $query = $propelObjectQueryClass::create();
        // $query->setFormatter(\Propel\Runtime\ActiveQuery\ModelCriteria::FORMAT_ON_DEMAND); // Does not work with populateRelation() below...

        // Compile criteria
        /** @var \Propel\Runtime\ActiveQuery\ModelCriteria $query */
        $this->applyListQuery($query);
        //var_dump(__LINE__, $query->toString());

        // Get pagination options from request parameters
        $pageSize = (int) $this->request->getParam($this->limit);
        $page = (int) $this->request->getParam($this->page);

        // Support global (as in all item types) per-request defaults
        if (empty($pageSize)) {
            $pageSize = (int) $this->request->getParam("default_limit");
        }
        if (empty($page)) {
            $page = (int) $this->request->getParam("default_page");
        }

        // Always set a page size
        if (empty($pageSize)) {
            $pageSize = $this->defaultLimit;
        }

        $directories_names = array();   

        
        $folders = \propel\models\CategoryQuery::create()->find();

        foreach ($folders as $folder) { 
            $campaign_count = \propel\models\CampaignQuery::create()->filterByInfo($folder->getName())
                                                                    ->count();    
            array_push($directories_names, array('id' => $folder->getId(),
                                                'name' => $folder->getName(),
                                                'campaign_count' => $campaign_count));
        }

        // Pager
        $models = $query->paginate($page, $pageSize);

        $result = array(
            "items" => [],
            "_meta" => [
                "totalCount" => (int) $models->getNbResults(),
                "pageCount" => (int) $models->getLastPage(),
                "getFirstIndex" => (int) $models->getFirstIndex(),
                "getLastIndex" => (int) $models->getLastIndex(),
                "currentPage" => (int) $models->getPage(),
                "perPage" => (int) $models->getMaxPerPage(),
                'attributes' => $directories_names,
            ],
        );

        // Invoke hook for controller to modify the collection before iterating through it to build the response tree
        $this->beforeIteratingThroughPaginatedItems($result, $models, $query);

        if ($models) {
            foreach ($models as $item) {
                $restApiModelClass = $this->_modelName;
                $result["items"][] = $restApiModelClass::getApiAttributes($item);
            }
        }

        // Invoke hook for controller to modify the response, for instance in order to specify additional metadata about the collection
        $this->beforeReturningPaginatedListActionResults($result, $models, $query);

        return $result;

    }

    /**
     * Hook for controller to modify the collection before iterating through it to build the response tree
     * @param $result
     * @param \Propel\Runtime\Util\PropelModelPager $pager
     * @param \Propel\Runtime\ActiveQuery\ModelCriteria $query
     * @return null
     */
    protected function beforeIteratingThroughPaginatedItems(
        &$result,
        \Propel\Runtime\Util\PropelModelPager &$pager,
        &$query
    ) {

    }

    /**
     * Hook for controller to override in order to modify the response, for instance in order to specify additional metadata about the collection
     * @param $result
     * @param \Propel\Runtime\Util\PropelModelPager $pager
     * @param \Propel\Runtime\ActiveQuery\ModelCriteria $query
     * @return null
     */
    protected function beforeReturningPaginatedListActionResults(
        &$result,
        \Propel\Runtime\Util\PropelModelPager &$pager,
        &$query
    ) {

    }

    public $scenario = null;

    public function actionUpdate()
    {

        // Disable propel instance pooling for update requests
        Propel::disableInstancePooling();

        // PDO
        $pdo = Propel::getWriteConnection('default');

        // set autocommit to 0 to prevent saving of data within transaction
        $pdo->exec("SET autocommit=0");

        // start transaction
        $pdo->beginTransaction();
        try {

            $this->tryUpdate($pdo);

        } catch (PDOException $e) {

            $pdo->rollback();
            throw $e;

        } catch (PropelException $e) {

            $pdo->rollback();
            throw $e;

        }

    }

    protected function tryUpdate($pdo)
    {

        $requestAttributes = $this->request->getAllRestParams();

        $model = $this->getModel();
        $restApiModelClass = $this->_modelName;
        $restApiModelClass::setUpdateAttributes($model, $requestAttributes);
        $model->save();

        $pdo->commit();
        $this->sendResponse(200, $restApiModelClass::getApiAttributes($model));

    }

    public function actionCreate()
    {

        // Disable propel instance pooling for update requests
        Propel::disableInstancePooling();

        // PDO
        $pdo = Propel::getWriteConnection('default');

        // set autocommit to 0 to prevent saving of data within transaction
        $pdo->exec("SET autocommit=0");

        // start transaction
        $pdo->beginTransaction();
        try {

            $this->tryCreate($pdo);

        } catch (PDOException $e) {

            $pdo->rollback();
            throw $e;

        } catch (PropelException $e) {

            $pdo->rollback();
            throw $e;

        }

    }

    protected function tryCreate($pdo)
    {

        $requestAttributes = $this->request->getAllRestParams();

        $model = $this->getModel();
        $restApiModelClass = $this->_modelName;
        $restApiModelClass::setCreateAttributes($model, $requestAttributes);
        $model->save();

        $pdo->commit();
        $this->sendResponse(200, $restApiModelClass::getApiAttributes($model));

    }

    public function actionDelete()
    {

        // Disable propel instance pooling for update requests
        Propel::disableInstancePooling();

        $model = $this->getModel();
        $id = $model->getId();
        $model->delete();
        $this->sendResponse(200, array('id' => $id));

    }

    public function actionGet()
    {

        $model = $this->getModel();
        $restApiModelClass = $this->_modelName;
        $this->sendResponse(200, $restApiModelClass::getApiAttributes($model));

    }

}