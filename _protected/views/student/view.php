<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Student */

$this->title = $studentModel->name;
// $this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--'studentModel' => $studentModel,
        'studentCourses' => $studentCourses, -->

    <p>
        <?= Html::a('Edit', ['update', 'id' => $studentModel->id], ['class' => 'btn btn-primary']) ?>
        <?php 
            // echo Html::a('Delete', ['delete', 'id' => $model->id], [
            // 'class' => 'btn btn-danger',
            // 'data' => [
            //     'confirm' => 'Are you sure you want to delete this item?',
            //     'method' => 'post',
            // ],
            // ]) 
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $studentModel,
        'attributes' => [
            'id',
            'name',
            'phone',
            'email:email',
            'img:image',
        ],
    ]) ?>

</div>
