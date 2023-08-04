<?php

namespace frontend\controllers;

use frontend\models\AddressBook;
use frontend\models\AddressBookSearch;
use frontend\models\PathInfo;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

/**
 * AddressBookController implements the CRUD actions for AddressBook model.
 */
// class AddressBookController extends Controller
class AddressBookController extends ActiveController
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST', 'DELETE'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all AddressBook models.
     *
     * @return string
     */
    public $modelClass = 'frontend\models\AddressBook';
    public function actionIndex()
    {
        $searchModel = new AddressBookSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $info = new PathInfo();
        $info->access_time = date("Y-m-d H:i:s");
        $info->user_ip = Yii::$app->request->userIP;
        $info->user_host = gethostname();
        $info->path_info = Yii::$app->request->pathInfo;
        $info->query_string = Yii::$app->request->queryString;
        $info->save();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AddressBook model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $info = new PathInfo();
        $info->access_time = date("Y-m-d H:i:s");
        $info->user_ip = Yii::$app->request->userIP;
        $info->user_host = gethostname();
        $info->path_info = Yii::$app->request->pathInfo;
        $info->query_string = Yii::$app->request->queryString;
        $info->save();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AddressBook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new AddressBook();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);

                // return array('status' => true, 'data' => 'Contact Profile record is successfully created');
            }
        } else {
            $model->loadDefaultValues();

            // return array('status' => false, 'data' => $model->getErrors());
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AddressBook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AddressBook model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AddressBook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AddressBook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AddressBook::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
