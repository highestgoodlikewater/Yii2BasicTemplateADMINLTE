<?php

namespace app\modules\trans\controllers;

use Yii;
use app\models\TransactionDetail;
use app\models\TransactionDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransactiondetailController implements the CRUD actions for TransactionDetail model.
 */
class TransactiondetailController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TransactionDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransactionDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TransactionDetail model.
     * @param string $trans_id
     * @param string $trans_service_id
     * @return mixed
     */
    public function actionView($trans_id, $trans_service_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($trans_id, $trans_service_id),
        ]);
    }

    /**
     * Creates a new TransactionDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TransactionDetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'trans_id' => $model->trans_id, 'trans_service_id' => $model->trans_service_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TransactionDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $trans_id
     * @param string $trans_service_id
     * @return mixed
     */
    public function actionUpdate($trans_id, $trans_service_id)
    {
        $model = $this->findModel($trans_id, $trans_service_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'trans_id' => $model->trans_id, 'trans_service_id' => $model->trans_service_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TransactionDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $trans_id
     * @param string $trans_service_id
     * @return mixed
     */
    public function actionDelete($trans_id, $trans_service_id)
    {
        $this->findModel($trans_id, $trans_service_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TransactionDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $trans_id
     * @param string $trans_service_id
     * @return TransactionDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($trans_id, $trans_service_id)
    {
        if (($model = TransactionDetail::findOne(['trans_id' => $trans_id, 'trans_service_id' => $trans_service_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
