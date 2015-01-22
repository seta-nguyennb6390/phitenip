<?php

namespace backend\modules\users\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Member;
use yii\web\Request;
use backend\components\MyController;
use yii\base\View;

/**
 * Default controller class
 * Member class
 *
 * @package 
 * @category Member
 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
 * @copyright
 * @link 
 */
class DefaultController extends Controller {

	public $enableCsrfValidation = false;

	/**
	 * @Action: Index Action
	 * @Description: Listmember
	 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
	 * @date: 21/01/2014
	 */
	public function actionIndex() {
		
		Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜会員管理';
		$model = new \common\models\Member();
		$limit = 10;
		
		//Ajax pagination
		if (isset($_POST['action']) && $_POST['action'] == 'ajax') {
			$page = $_POST['page'];
			$listMem = $model->listMemberAjax($page, $limit);
			if ($listMem) {
				$value = $this->renderPartial('list_order', ['listAll' => $listMem]);
			} else {
				$value = 'max';
			}
			echo $value; return FALSE;
		}
		//Sort by
		if (isset($_POST['flag']) && $_POST['flag'] == 'sort') {
			$value = [
				'sort'=>$_POST['sort'],
				'type'=>$_POST['type'],
				'start'=>($_POST['total'])
			];
            $listAll = $this->ActionOrderBy($value, $limit);

			if($listAll){
				$val = $this->renderPartial('list_order', ['listAll' => $listAll]);
			}else{
				$val = "max";
			}
			echo $val;  return FALSE;
		}
		//Ssearch
		if (isset($_POST['flag']) && $_POST['flag'] == 'search') {
			$value = [
				'member'=>$_POST['member'],
				'status'=>$_POST['status'],
			];
			echo "<pre>";
			print_r($value);
			echo "</pre>";
			
			return FALSE;
		}
		$data['listAll'] = $model->listMembers($limit);
		$data['model'] = $model;
		$data['limit'] = $limit;
		
		return $this->render('index', $data);
	}

	/**
	 * @Action: Order by 
	 * @Description: Ordey by id, name or phone
	 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
	 * @date: 22/01/2014
	 */
	public function ActionOrderBy($data=array(), $limit){
		if($data['sort'] == NULL || $data['type'] == NULL){
			return FALSE;
		}
		switch ($data['type']){
			case 'id' : $type = 'member_id'; break;
			case 'name' : $type = 'user_name'; break;
			case 'phone' : $type = 'user_tel'; break;
			default : $type = 'member_id'; break;
		}
		$data['type'] = $type;
		
		$model = new \common\models\Member();
		
		$listAll =  $model->orderByMember($data, $limit);
		//return $listAll; die();
		$array = [];
		if($listAll){
			$i=1;
		    foreach($listAll as $key => $value){
			    $array[$value[$type].'-'.$i] = $value;
				$i++;
		    }
		    // Sort type
		    if($data['sort'] == 'asc'){
			    ksort($array);
		    }else{
			    krsort($array);
		    }
		}
		return $array;
	}
}