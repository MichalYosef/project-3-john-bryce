<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Course;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php 
    
    $form = ActiveForm::begin(
        ['options' => ['enctype' => 'multipart/form-data']]
    ); 
    
    echo $form->field($model, 'name')->textInput(['maxlength' => true]);
    echo $form->field($model, 'phone')->textInput(['maxlength' => true]);
    echo $form->field($model, 'email')->textInput(['maxlength' => true]);
    echo $form->field($model, 'img')->fileInput();
    
    $courses = $model->getCourses();

    // echo checkBoxList(CModel $model, string $attribute, array $data, array $htmlOptions=array ( ));
    // foreach($courses as $course) 
    // {
    //     echo $form->checkBox($model,'attribute');
    // }
    /*
    
    */
    ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
