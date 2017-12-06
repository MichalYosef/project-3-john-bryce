<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentInCourse */

$this->title = 'Update Student In Course: ' . $model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Student In Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_id, 'url' => ['view', 'student_id' => $model->student_id, 'course_id' => $model->course_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-in-course-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
