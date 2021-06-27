<?php
namespace backend\modules\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class HitsController extends Controller
{
    public $modelClass = 'backend\modules\models\Hits';
	
	public function actions()
{
	$actionsParent = parent::actions();

    // disable the "delete" and "create" actions
    unset($actionsParent['delete'],);

    // customize the data provider preparation with the "prepareDataProvider()" method
    $actionsParent['index1']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

    $actions = [
        'index1' => [
            'class' => backend\modules\actions\Index1Action::class,
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ],
    ];
    
    return array_merge($actionsParent, $actions);
}	
	public function prepareDataProvider()
    {
		$modelClass = $this->modelClass;
		$query = $modelClass::find()
		->where(['=', 'is_active', 1])
        ->all();
		
        return $this->render('index');
    }
	
	public function actionIndex()
    {
       return $this->render('index');
    }
	
	public function actionShow()
    {
		$modelClass = $this->modelClass;
		$query = $modelClass::find()
		->where(['=', 'is_active', 1])
        ->all();
		
        return $this->render('index');
    }
	
}