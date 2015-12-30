<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
/**
 * Quan Controller
 *
 * @property \App\Model\Table\QuanTable $Quan
 */
class QuanController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
    	$content = "【フリマ】{purchaser_name}さんが{product_name}を購入しました

{seller_name}さん

フリマをご利用いただきありがとうございます。

下記の商品を{purchaser_name}さんが購入しました。

クレジットカードで支払いしてもらいましたので、発送をお願いいたします。

■商品情報

product_id : {product_id}

product_name : {product_name}

商品価格 : {product_price}

アプリを起動しホーム画面右上のアイコンから「やることリスト」が確認できます。

※このメールは返信しても届きません。お問い合わせはアプリを起動して「お問い合

わせ」からお願いいたします。";
        $this->loadModel('Queue.QueuedTasks');
		$this->QueuedTasks->createJob('Email', [

			'settings'=> array(
				'to' => 'vhq277@gmail.com',
				'from'=>'quankim277@gmail.com',
				'subject'=>'Ahihi'
			),
			'vars'=> [
				'content'=>$content
			]
			]
		);
		echo "done";
    }
    public function test(){
    	$this->loadModel('Categories');
    	$Categories = $this->Categories->find('all')->where(['created_at >'=> new \DateTime()]);
    	pr($Categories->toArray()); 
    	die();
    }

}
