<?php

namespace app\controllers;

use Yii;
use app\models\TracesList;
use app\models\TracesListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TracesListController implements the CRUD actions for TracesList model.
 */
class TracesListController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TracesList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TracesListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TracesList model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
      $trace_model = $this->findModel($id);
      $tr_arr = $trace_model->toArray();

      $arr_freq = array_merge(unpack("d*", $tr_arr['TRACE_FREQ_DATA']));
      $arr_power = array_merge(unpack("d*", $tr_arr['TRACE_POWER_DATA']));

//        $this->layout = false;
//        return $this->renderAjax('view', [
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
            'arr_freq' => $arr_freq,
            'arr_power' => $arr_power,
          //  'freq_array' => $freq_array,
        ]);
    }

    /**
     * Creates a new TracesList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TracesList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TracesList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TracesList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TracesList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TracesList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TracesList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
