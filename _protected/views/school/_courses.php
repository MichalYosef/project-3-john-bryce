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

<?php $this->beginBlock('leftBlock'); ?>

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

<?php $this->endBlock(); ?>
