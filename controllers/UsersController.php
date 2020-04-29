<?php

namespace app\controllers;

use app\models\Users;
use Yii;
use yii\data\SqlDataProvider;

class UsersController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $sql = "SELECT u.*, SUM(b.amount) as userSum
                FROM users as u
                left join billing as b on b.userId = u.id
                where b.id is not null
                group by u.id
                order by userSum DESC";

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);

        $result = $command->queryAll();


        $provider = new SqlDataProvider([
            'sql' => $sql,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => [
                    'title',
                    'view_count',
                    'created_at',
                ],
            ],
        ]);

        return $this->render('index', compact('result', 'provider'));
    }

}
