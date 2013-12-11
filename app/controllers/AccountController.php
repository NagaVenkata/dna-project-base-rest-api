<?php

class AccountController extends Controller
{
    #public $layout='//layouts/column2';

    public $defaultAction = "admin";
    public $scenario = "crud";

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array(
                    'admin',
                    'toggleRole',
                ),
                'roles' => array('Administrator'),
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
                'roles' => array('Account.*'),
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
                'deny',
                'users' => array('*'),
            ),
        );
    }

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
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/' . $this->module->Id);
        }
        return true;
    }

    public function actionDashboard()
    {
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id);
        $this->render('dashboard', array('model' => $model,));
    }

    public function actionTranslations()
    {
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id);
        $this->render('translations', array('model' => $model,));
    }

    public function actionProfile()
    {
        $id = user()->id;
        $model = $this->loadModel($id); // Account

        if (!request()->isAjaxRequest && isset($_POST['Profiles'], $_POST['Users'])) {
            $model->attributes = $_POST['Users'];
            $model->profiles->attributes = $_POST['Profiles'];

            if ($model->validate()
                && $model->profiles->validate()
                && $model->save()
                && $model->profiles->save())
            {
                setFlash(TbAlert::TYPE_SUCCESS, t('app', 'Your account information has been updated.'));
                $this->refresh();
            }
        }

        $this->render('profile', array(
            'model' => $model,
        ));
    }

    public function actionHistory()
    {
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id);
        $this->render('history', array('model' => $model,));
    }

    public function actionPublicProfile($id)
    {
        $model = $this->loadModel($id);
        $this->render('public-profile', array('model' => $model,));
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view', array('model' => $model,));
    }

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
        Yii::import('TbEditableSaver'); //or you can add import 'ext.editable.*' to config
        $es = new TbEditableSaver('Account'); // classname of model to be updated
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

    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
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

    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Account');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin()
    {
        $model = new Account('search');
        $model->unsetAttributes();

        if (isset($_GET['Account'])) {
            $model->attributes = $_GET['Account'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Toggles a role for a given user.
     * @param integer $id the user ID.
     */
    public function actionToggleRole($id)
    {
        if (isset($_GET['attribute'])) {
            $attribute = $_GET['attribute'];

            if (Yii::app()->authManager->isAssigned($attribute, $id)) {
                Yii::app()->authManager->revoke($attribute, $id);
            } else {
                Yii::app()->authManager->assign($attribute, $id);
            }
        }
    }

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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'account-form') {
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
