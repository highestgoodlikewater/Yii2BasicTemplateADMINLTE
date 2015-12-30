<?php

namespace app\modules\trans\controllers;

use Yii;
use app\models\Employees;
use app\models\EmployeesSearch;
use app\models\Transactions;
use app\models\TransactionsSearch;
use app\models\TransactionDetail;
use app\models\TransactionDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransactionsController implements the CRUD actions for Transactions model.
 */
class TransactionsController extends Controller
{
	public $_buttons = array();
	public $_pagetitle =  array();
	public $_newTrans =  '';
	
    public function init(){
		parent::init();
		$this->_buttons =  array(
			array ('title'=>'Kembali ke Daftar','link'=>'index','class'=>'info','id' => 'btnList','rule'=>'all'),
			array ('title'=>'Tambah','link'=>'create','class'=>'info','id' => 'btnCreate','rule'=>'all'),
			//array ('title'=>'Trash','link'=>'trash','class'=>'info','id' => 'btnTrash','rule'=>'all'),
			// array ('title'=>'Hapus','link'=>'#','class'=>'danger','id' => 'deleteAll','rule'=>'admin'),
		);
		$this->_pagetitle = array(
			'_title'=> 'Transaksi '.Yii::$app->params['application']['name'],
			'_breadcrumbs'=> '',
			'_module'=> Yii::$app->awscomponent->string_ucfirst('Transaksi'),
			'_subModule'=> '',
		);

		$options = array(
			'field' => 'trans_id',
			'table' => 'transactions',
			'key' => 'trans_id',
			'orderKey' => 'trans_id',
			'parse' => 'T'.date('dmY').'-',
			'digit' => 3,
		);
		$this->_newTrans = Yii::$app->awsautonumber->_getnewNumber($options);
	}
	
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
     * Lists all Transactions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransactionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		

		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,            
        ]);
    }

    /**
     * Displays a single Transactions model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


	private function _saveHeader ($mode,$transaction_id,$transaction_date,$employee,$amount)
	{
		if ($mode == 'insert')
		{
			$header=Yii::$app->db->createCommand()
				->insert('transactions',
					array(
						'trans_id'=>$transaction_id,
						'trans_date'=>$transaction_date,
						'trans_employee'=>$employee,
						'trans_total'=>$amount,
						));
		}else{
			$header=Yii::$app->db->createCommand()
				->update('transactions', 
					array(
						'trans_date'=>$transaction_date,
						'trans_employee'=>$employee,
						'trans_total'=>$amount,
					), 'trans_id=:id', array(':id'=>$transaction_id));
		}
		$header->execute();
		return $transaction_id;
	}
	private function _deleteDetail ($transaction_id)
	{
		$detail=Yii::$app->db->createCommand()->delete('transaction_detail', 'trans_id=:id', array(':id'=>$transaction_id))->execute();
	}
	
	private function _saveDetail ($transaction_id,$service_id,$quantity,$amount)
	{
		$detail=Yii::$app->db->createCommand()
					->insert('transaction_detail',
						array(
							'trans_id'=>$transaction_id,
							'trans_service_id'=>$service_id,
							'trans_qty'=>$quantity,
							'price'=>$amount,
						));
					$detail->execute();
		return TRUE;
	}
   
   public function actionCreate()
    {
        $model = new Transactions();
		
		$detailModel = new TransactionDetailSearch();
        $detailProvider = $detailModel->search(Yii::$app->request->queryParams);
		

        if ($model->load(Yii::$app->request->post())) {
			$data = Yii::$app->request->post();
			$_tanggal = explode("/",$data["Transactions"]["trans_date"]);
			$transaction_date = $_tanggal[2].'-'.$_tanggal[1].'-'.$_tanggal[0];
			$transaction_id = $this->_newTrans;
						
			// HEADER 
			if (sizeof ($data["item"]["code"]) > 0)
			{
				
				$transaction_id =  $this->_saveHeader ('insert',$transaction_id,$transaction_date,$data["Transactions"]["trans_employee"],array_sum($data["item"]["price"]));
				
				for ($i = 0;$i<sizeof($data["item"]["code"]) ; $i++)
				{
					$transactions =  $this->_saveDetail ($transaction_id,$data["item"]["code"][$i],$data["item"]["qty"][$i],$data["item"]["price"][$i]);
				}
			}
			Yii::$app->session->setFlash('success', 'Transaksi berhasil disimpan');
			return $this->redirect(['index']);
        } else {
			$employee = Employees::find()->one();
			$q = \Yii::$app->db;
			$rowsDetail = $q->createCommand("SELECT * FROM vtransdetail_init WHERE trans_id='".$this->_newTrans."'")->queryAll();
			
            return $this->render('create', [
                'model' => $model,
                'transid' => $this->_newTrans,
				'detailModel' => $detailModel,
				'detailProvider' => $detailProvider,
				'rows' => $rowsDetail,
            ]);
        }
    }

    /**
     * Updates an existing Transactions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
           $data = Yii::$app->request->post();
			$_tanggal = explode("/",$data["Transactions"]["trans_date"]);
			$transaction_date = $_tanggal[2].'-'.$_tanggal[1].'-'.$_tanggal[0];
			$transaction_id = $id;
						
			// HEADER 
			if (sizeof ($data["item"]["code"]) > 0)
			{
				$transaction_id =  $this->_saveHeader ('update',$id,$transaction_date,$data["Transactions"]["trans_employee"],array_sum($data["item"]["price"]));
				$this->_deleteDetail ($id);
				for ($i = 0;$i<sizeof($data["item"]["code"]) ; $i++)
				{
					$transactions =  $this->_saveDetail ($id,$data["item"]["code"][$i],$data["item"]["qty"][$i],$data["item"]["price"][$i]);
				}
			}
			
			Yii::$app->session->setFlash('success', 'Transaksi berhasil disimpan');
			return $this->redirect(['index']);
        } else {
			$employee = Employees::find()->one();
			$q = \Yii::$app->db;
			$rowsDetail = $q->createCommand("SELECT * FROM vtransdetail_init WHERE trans_id='".$id."'")->queryAll();
			
            return $this->render('update', [
                'transid'=> $model->trans_id,
				'model' => $model,
				'rows' => $rowsDetail,
            ]);
        }
    }

    /**
     * Deletes an existing Transactions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Transactions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Transactions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transactions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
