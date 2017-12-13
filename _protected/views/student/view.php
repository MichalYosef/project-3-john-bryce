<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
// use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Student */

$this->title = $model->name;
// $this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--'studentModel' => $studentModel,
        'studentCourses' => $studentCourses, -->

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
   
    
    <?php
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'phone',
            'email:email',
            // 'img:image',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => Html::img($model->img, ['width' => '100px', 'height' => '100px'])
            ],
        ],
    ]) ;

    // echo CHtml::activeCheckBoxList($model, 'studentCourses', $model->getCourses(), 'itemId', 'itemData'));

    

    // echo DetailView::widget([
    //     'model'=>$model,
    //     'condensed'=>true,
    //     'hover'=>true,
    //     'mode'=>DetailView::MODE_VIEW,
    //     'panel'=>[
    //         'heading'=>'Student # ' . $model->id,
    //         'type'=>DetailView::TYPE_INFO,
    //     ],
    //     'attributes'=>[
    //         'id',
    //         'name',
    //         'phone',
    //         'email:email',
    //         'img:image',
    //         // ['attribute'=>'studentCourses', 'type'=>DetailView::INPUT_CHECKBOX_LIST]
    //         // ['attribute'=>'publish_date', 'type'=>DetailView::INPUT_DATE],
    //     ]
    // ]);
    ?>

</div>
