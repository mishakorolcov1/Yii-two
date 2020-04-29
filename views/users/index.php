<?php
/* @var $this yii\web\View */
?>
<h1>users/index</h1>

<table class="table">
    <?php foreach($result as $res){ ?>
        <tr>
            <td><?=$res['first_name']?></td>
            <td><?=$res['last_name']?></td>
            <td><?=$res['user_email']?></td>
            <td><?=$res['userSum']?></td>
        </tr>
    <?php } ?>
</table>


<?php
echo yii\grid\GridView::widget([
    'dataProvider' => $provider,
]);
