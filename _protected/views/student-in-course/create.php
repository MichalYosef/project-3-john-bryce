<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StudentInCourse */

$this->title = 'Create Student In Course';
$this->params['breadcrumbs'][] = ['label' => 'Student In Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-in-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
