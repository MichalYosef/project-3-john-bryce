<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\assets\AppAsset;

AppAsset::register($this);
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

            <!-- courses -->
            <div class="col-md-3 col-lg-3 col-sm-3">
                    <p>
                        <?= Html::a('+', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $courseDataProvider,
                        'filterModel' => $courseSearchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'img',
                            'name',
                            'description',
                        ],
                    ]); ?>
                <?php Pjax::end(); ?>
            </div>
            
            <!-- students -->
            <div class="col-md-3 col-lg-3  col-sm-3">
                    <p>
                        <?= Html::a('+', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $studentDataProvider,
                        'filterModel' => $studentSearchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'img',
                            'name',
                            'phone',
                            
                        ],
                    ]); ?>
                <?php Pjax::end(); ?>
            </div>
            <!-- single obj -->
            <div class="col-md-6 col-lg-6  col-sm-6">
                    main contianer
            </div>
        </div>
    </div>
</div>
