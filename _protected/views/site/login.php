<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Login');

?>
<div class="site-login">

    <div class="col-md-5 well bs-component">
        
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?php //-- use email or username field depending on model scenario --// ?>
        <?php if ($model->scenario === 'lwe'): ?>

            <?= $form->field($model, 'email')->input('email', 
                ['placeholder' => Yii::t('app', 'Enter your e-mail'), 'autofocus' => true]) ?>
        
        <?php else: ?>

            <?= $form->field($model, 'username')->textInput(
                ['placeholder' => Yii::t('app', 'Enter your username'), 'autofocus' => true]) ?>

        <?php endif ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('app', 'Enter your password')]) ?>
                    
        <p><?= Yii::t('app', 'Registered users:') ?></p>
        <p><?= Yii::t('app', 'Username: owner     Password: ownerpass') ?></p>
        <p><?= Yii::t('app', 'Username: manager1     Password: manager1pass') ?></p>
        <p><?= Yii::t('app', 'Username: manager2     Password: manager2pass') ?></p>
        <p><?= Yii::t('app', 'Username: sales     Password: salespass') ?></p>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
  
</div>
