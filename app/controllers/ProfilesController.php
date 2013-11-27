<?php

class ProfilesController extends Controller
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
                    'toggleCanTranslate',
                    'toggleOwn',
                ),
                'users' => array('@'),
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
                    'admin',
                    'delete',
                    'toggle',
                ),
                'roles' => array('Profiles.*'),
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
        if (!isset($_GET['id']) && isset($_GET['user_id'])) {
            $model = Profiles::model()->find(
                'user_id = :user_id',
                array(
                    ':user_id' => $_GET['user_id']
                )
            );
            if ($model !== null) {
                $_GET['id'] = $model->user_id;
            } else {
                throw new CHttpException(400);
            }
        }
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/' . $this->module->Id);
        }
        return true;
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new Profiles;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'profiles-form');

        if (isset($_POST['Profiles'])) {
            $model->attributes = $_POST['Profiles'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->user_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('user_id', $e->getMessage());
            }
        } elseif (isset($_GET['Profiles'])) {
            $model->attributes = $_GET['Profiles'];
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'profiles-form');

        if (isset($_POST['Profiles'])) {
            $model->attributes = $_POST['Profiles'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view', 'id' => $model->user_id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('user_id', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionToggleOwn($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'toggle';

        // Verify that this is in fact the logged in user's profile
        $account = Account::model()->findByPk(Yii::app()->user->id);
        if (Yii::app()->user->id !== $account->profiles->user_id) {
            throw new CHttpException(403, "The current logged in user does not match the profile which was supposed to be altered.");
        }

        $this->actionToggle($id);

    }

    public function actionEditableSaver()
    {
        Yii::import('TbEditableSaver'); //or you can add import 'ext.editable.*' to config
        $es = new TbEditableSaver('Profiles'); // classname of model to be updated
        $es->update();
    }

    public function actionEditableCreator()
    {
        if (isset($_POST['Profiles'])) {
            $model = new Profiles;
            $model->attributes = $_POST['Profiles'];
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
        $dataProvider = new CActiveDataProvider('Profiles');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin()
    {
        $model = new Profiles('search');
        $model->unsetAttributes();

        if (isset($_GET['Profiles'])) {
            $model->attributes = $_GET['Profiles'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id)
    {
        $model = Profiles::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('model', 'The requested page does not exist.'));
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'profiles-form') {
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
