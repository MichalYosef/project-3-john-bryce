<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $courseSearchModel app\models\CourseSearch */
/* @var $courseDataProvider yii\data\ActiveDataProvider */
/* @var $studentSearchModel app\models\StudentSearch */
/* @var $studentDataProvider yii\data\ActiveDataProvider */
?>

<div class="school-index container-fluid">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container-fluid">
        <div class="row">

           
            <div class="col-md-2 col-lg-2 col-sm-3">
                 courses   
            </div>
            
           
            <div class="col-md-2 col-lg-2  col-sm-3">
               students
                
            </div>
           
            <div class="col-md-4 col-lg-4  col-sm-6">
                 single obj
            </div>
        </div>
    </div>
</div>
