<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
    <style>
        .navbar-brand {
            padding: 3px;
        }
        .navbar-brand img {
            height: 100%;
        }
        
        div{
            border: 1px solid black;
        }
        .row{
            height: 80vh;
            border: 1px solid red;
        }
        .leftCol, .midCol, .mainContainer{
            height: 100%;
            
            
        }
        
        *{
            box-sizing: border-box;
        }
        .container {
   
            padding-left: 0;
            padding-right: 0;
        }
        
    </style>
    
    <?php echo $this->head() ;
    // TODO: Make register css file work!
    $this->registerCssFile(Yii::getAlias('@web').'/_protected/views/site/css/site.css', [
1    // 'media' => 'print',
], 'main-site-css');
?>

</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php

    NavBar::begin([
        
        'brandLabel' => Html::img('@themes'.'/siteImages/theSchoolLogo.jpg', ['alt'=>Yii::$app->name]), 
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);

    // display Login page to guests of the site
    if (Yii::$app->user->isGuest) {
        
        $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
    }
    else
    {
               // Show sales content to sales+ users
        if ( Yii::$app->user->can('useSalesContent')) 
        {
            $menuItems[] = ['label' => Yii::t('app', 'School'), 
                            // 'class' => "pull-left",
                            'url' =>  Yii::$app->homeUrl,
                            'linkOptions' => ['id' => 'school']];

            $this->registerJs(
                "$('#school').on('click', function() { alert('School Button clicked!'); });",
                View::POS_READY,
                'school-block');
        }

        // Show Admin content to manager+ users
        if (Yii::$app->user->can('useAdminContent')) 
        {
            $menuItems[] = ['label' => Yii::t('app', 'Administration'), 
                            'url' => Yii::$app->homeUrl,
                            'linkOptions' => ['id' => 'admin']];

            $this->registerJs(
                "$('#admin').on('click', function() { alert('Admin Button clicked!'); });",
                View::POS_READY,
                'admin-block');

                // display Users to admin+ roles
            if (Yii::$app->user->can('manageUsers')){
                $menuItems[] = ['label' => Yii::t('app', 'Users'), 
                                'url' => ['/user/index']];
            }
        }

        // display Logout to logged in users
        if (!Yii::$app->user->isGuest) {
            $menuItems[] = [
                'label' => Yii::t('app', 'Logout'). ' (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ];
        }

    }

    // echo navbar with selected items
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::t('app', Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
