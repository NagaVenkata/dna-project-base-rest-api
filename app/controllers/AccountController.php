<?php

class AccountController extends Controller
{
    /**
     * @var string
     */
    public $defaultAction = 'profile';

    /**
     * @var string
     */
    public $scenario = 'crud';

    /**
     * @inheritDoc
     */
    public function filters()
    {
        return array(
            'accessControl',
            'ajaxOnly + toggleRole',
        );
    }

    /**
     * @inheritDoc
     */
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array(
                    'admin',
                    'permissions',
                    'delete',
                    'deleteRelations',
                    'view',
                    'activate',
                ),
                'roles' => array(Role::SUPER_ADMINISTRATOR),
            ),
            array(
                'allow',
                'actions' => array(
                    'index',
                    'view',
                    'create',
                    'update',
                    'editableSaver',
                    'editableCreator',
                    'delete',
                ),
                'roles' => array('Account.*'), // TODO Fix this permission check
            ),
            array(
                'allow',
                'actions' => array(
                    'publicProfile',
                ),
                'users' => array('*'),
            ),
            array(
                'allow',
                'actions' => array(
                    'dashboard',
                    'translations',
                    'profile',
                    'history',
                ),
                'users' => array('@'),
            ),
            array(
                'allow',
                'actions' => array(
                    'permissions',
                    'toggleRole',
                    'addToGroup',
                    'removeFromGroup',
                ),
                'expression' => function() {
                    return Yii::app()->user->checkAccess('GrantPermission');
                }
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * @inheritDoc
     */
    public function beforeAction($action)
    {
        parent::beforeAction($action);

        // map identifcationColumn to id
        if (!isset($_GET['id']) && isset($_GET['id'])) {
            $model = Account::model()->find(
                'id = :id',
                array(
                    ':id' => $_GET['id']
                )
            );

            if ($model !== null) {
                $_GET['id'] = $model->id;
            } else {
                throw new CHttpException(400);
            }
        }

        return true;
    }

    /**
     * Displays the translations page.
     */
    public function actionTranslations()
    {
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id);
        $this->render('translations', array('model' => $model,));
    }

    /**
     * Displays the history page.
     */
    public function actionHistory()
    {
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id);

        $userChangedItems = new Item('search');
        $userChangedItems->unsetAttributes();
        $userChangedItems->setAttribute("user_id", Yii::app()->user->id);
        $dataProvider = $userChangedItems->search();

        $this->render('history', array('model' => $model, 'dataProvider' => $dataProvider));
    }

    /**
     * Displays a public profile page.
     * @param integer $id account ID
     */
    public function actionPublicProfile($id)
    {
        $model = $this->loadModel($id);
        $this->render('public-profile', array('model' => $model,));
    }

    /**
     * Displays a profile page.
     * @param integer $id account ID
     */
    public function actionView($id)
    {
        $model = $this->loadModel($id);

        $groups = array_merge(MetaData::projectGroups(), MetaData::topicGroups(), MetaData::skillGroups());
        $groupRoles = MetaData::groupRoles();

        $rawData = array();

        $id = 1;
        foreach ($groups as $groupName => $groupLabel) {
            // TODO fix this, must use stdClass because of the stupid TbToggleColumn
            $row = new stdClass();

            $row->id = $id++;
            $row->accountId = $model->id;
            $row->groupName = $groupName;
            $row->groupLabel = $groupLabel;

            foreach ($groupRoles as $roleName => $roleLabel) {
                $row->$roleName = $model->groupRoleIsActive($groupName, $roleName);
            }

            $rawData[] = $row;
        }

        $dataProvider = new CArrayDataProvider(
            $rawData,
            array(
                'id' => 'permissions',
                'pagination' => false,
            )
        );

        $columns = array();

        $columns[] = array(
            'class' => 'CDataColumn',
            'header' => Yii::t('admin', 'Group name'),
            'name' => 'groupLabel',
        );

        $groupModeratorRoles = MetaData::groupModeratorRoles();
        foreach ($groupRoles as $roleName => $roleLabel) {
            if (Yii::app()->user->checkAccess('GrantGroupAdminPermissions')
                || (isset($groupModeratorRoles[$roleName]) && Yii::app()->user->checkAccess('GrantGroupModeratorPermissions'))
            ) {
                $columns[] = array(
                    'class' => 'GroupRoleToggleColumn',
                    'displayText' => false,
                    'header' => $roleLabel,
                    'name' => $roleName,
                    'toggleAction' => 'account/toggleRole',
                    'value' => function($data) use ($roleName) {
                        return $data->$roleName;
                    },
                );
            }
        }

        $this->render(
            'view',
            array(
                'columns' => $columns,
                'dataProvider' => $dataProvider,
                'model' => $model,
            )
        );
    }

    /**
     * Displays the account creation page.
     */
    public function actionCreate()
    {
        $model = new Account;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'account-form');

        if (isset($_POST['Account'])) {
            $model->attributes = $_POST['Account'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
            }
        } elseif (isset($_GET['Account'])) {
            $model->attributes = $_GET['Account'];
        }

        $this->render('create', array('model' => $model));
    }

    /**
     * Displays the account update page.
     * @param integer $id account ID.
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'account-form');

        if (isset($_POST['Account'])) {
            $model->attributes = $_POST['Account'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionEditableSaver()
    {
        $es = new TbEditableSaver('Account'); // class name of model to be updated
        $es->update();
    }

    public function actionEditableCreator()
    {
        if (isset($_POST['Account'])) {
            $model = new Account;
            $model->attributes = $_POST['Account'];
            if ($model->save()) {
                echo CJSON::encode($model->getAttributes());
            } else {
                $errors = array_map(
                    function ($v) {
                        return join(', ', $v);
                    },
                    $model->getErrors()
                );
                echo CJSON::encode(array('errors' => $errors));
            }
        } else {
            throw new CHttpException(400, 'Invalid request');
        }
    }

    /**
     * Deletes an account.
     * @param integer $id account ID
     * @throws CHttpException if unable to delete.
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            /** @var CDbTransaction $transaction */
            $transaction = Yii::app()->db->beginTransaction();

            try {
                $this->deleteRelations($id);
                $this->loadModel($id)->delete();
                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollback();
                throw new CHttpException(500, $e->getMessage());
            }

            if (!isset($_GET['ajax'])) {
                if (isset($_GET['returnUrl'])) {
                    $this->redirect($_GET['returnUrl']);
                } else {
                    $this->redirect(array('admin'));
                }
            }
        } else {
            throw new CHttpException(400, Yii::t('model', 'Invalid request. Please do not repeat this request again.'));
        }
    }

    /**
     * Deletes account-related records to satisfy the foreign key constraints.
     * @param integer $id account ID
     */
    public function deleteRelations($id)
    {
        // TODO: Delete account-related records.
    }

    /**
     * Displays the page for managing accounts.
     */
    public function actionAdmin()
    {
        $dataProvider = new CActiveDataProvider('Account');

        $columns = array(
            array(
                'class' => 'AccountLinkColumn',
                'header' => '',
                'labelExpression' => '$data->itemLabel',
                'urlExpression' => 'Yii::app()->createUrl("account/view", array("id" => $data["id"]))',
            ),
            array(
                'class' => 'ActivateLinkColumn',
                'labelExpression' => '(int)$data->status === 0 ? Yii::t("account", "Activate") : ""',
                'urlExpression' => '(int)$data->status === 0 ? Yii::app()->createUrl("account/activate", array("id" => $data["id"])) : ""',
            ),
            array(
                'class' => '\TbButtonColumn',
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        );

        $this->render(
            'admin',
            array(
                'dataProvider' => $dataProvider,
                'columns' => $columns,
            )
        );
    }

    /**
     * Toggles a role for a given user.
     * @param integer $id the user ID.
     * @param string $attribute the role name.
     */
    public function actionToggleRole($id, $attribute)
    {
        list ($group, $role) = explode('_', $attribute);

        $attributes = array(
            'account_id' => $id,
            'group_id' => PermissionHelper::groupNameToId($group),
            'role_id' => PermissionHelper::roleNameToId($role),
        );

        if (!PermissionHelper::groupHasAccount($attributes)) {
            PermissionHelper::addAccountToGroup($id, $group, $role);
        } else {
            PermissionHelper::removeAccountFromGroup($id, $group, $role);
        }
    }

    /**
     * Activates a given user (if not already activated).
     * @param string $id the user ID.
     */
    public function actionActivate($id)
    {
        $account = $this->loadModel($id);

        if ($account->status > 0) {
            return;
        }

        $account->status = 1;
        $account->save(true, array('status'));

        $this->redirect(array('admin'));
    }

    /**
     * @param string $id
     * @param string $group
     * @param string $role
     */
    public function actionAddToGroup($id, $group, $role, $returnUrl)
    {
        // TODO Check that the user actually has sufficient privileges to do this.
        PermissionHelper::addAccountToGroup($id, $group, $role);
        $this->redirect(TbHtml::decode($returnUrl));
    }

    /**
     * @param string $id
     * @param string $group
     * @param string $role
     */
    public function actionRemoveFromGroup($id, $group, $role, $returnUrl)
    {
        // TODO Check that the user actually has sufficient privileges to do this.
        PermissionHelper::removeAccountFromGroup($id, $group, $role);
        $this->redirect(TbHtml::decode($returnUrl));
    }

    /**
     * @param string $id
     * @return Account
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        if (is_null($id)) {
            $id = Yii::app()->user->id;
        }
        $model = Account::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('model', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'profile-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Returns a model used to populate a filterable, searchable
     * and sortable CGridView with the records found by a model relation.
     *
     * Usage:
     * $relatedSearchModel = $this->getRelatedSearchModel($model, 'relationName');
     *
     * Then, when invoking CGridView:
     *    ...
     *        'dataProvider' => $relatedSearchModel->search(),
     *        'filter' => $relatedSearchModel,
     *    ...
     * @returns CActiveRecord
     */
    public function getRelatedSearchModel($model, $name)
    {
        $md = $model->getMetaData();
        if (!isset($md->relations[$name])) {
            throw new CDbException(Yii::t('yii', '{class} does not have relation "{name}".', array('{class}' => get_class($model), '{name}' => $name)));
        }

        $relation = $md->relations[$name];
        if (!($relation instanceof CHasManyRelation)) {
            throw new CException("Currently works with HAS_MANY relations only");
        }

        if (isset($relation->through)) {

            if (!($md->relations[$relation->through] instanceof CBelongsToRelation)) {
                throw new CException("Currently works with HAS_MANY relations, optionally through a BELONGS_TO relation, only");
            }

            $fk = $relation->foreignKey;
            $_ = array_keys($fk);
            $throughPk = $_[0];
            $throughField = $fk[$throughPk];
            $className = $relation->className;
            $related = new $className('search');
            $related->unsetAttributes();
            $related->{$throughField} = $model->{$relation->through}->{$throughPk};
        } else {
            $className = $relation->className;
            $related = new $className('search');
            $related->unsetAttributes();
            $related->{$relation->foreignKey} = $model->primaryKey;
        }

        if (isset($_GET[$className])) {
            $related->attributes = $_GET[$className];
        }

        return $related;
    }

}
