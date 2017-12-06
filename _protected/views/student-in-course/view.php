<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StudentInCourse */

$this->title = $model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Student In Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-in-course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'student_id' => $model->student_id, 'course_id' => $model->course_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'student_id' => $model->student_id, 'course_id' => $model->course_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'student_id',
            'course_id',
            'registration_date',
        ],
    ]) ?>

</div>
