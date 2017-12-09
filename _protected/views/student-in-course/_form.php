<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Course;
use app\models\Student;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\StudentInCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-in-course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->dropDownList(ArrayHelper::map(Student::find()->all(),'id','name'),['prompt' => 'Select a student']) ?>

    <?= $form->field($model, 'course_id')->dropDownList(ArrayHelper::map(Course::find()->all(),'id','name'),['prompt' => 'Select a course']) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
