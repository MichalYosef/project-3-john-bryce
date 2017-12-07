<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

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
        .mainCol{
            height: 100%;
            
            
        }
        .mainContainer{
            height: 100%;
            
        }
        *{
            box-sizing: border-box;
        }
        
        
    </style>
    
    <?php echo $this->head() ;
    // TODO: Make register css file work!
    $this->registerCssFile(Yii::getAlias('@webroot').'/uploads/_protected/views/site/css/site.css', [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    // 'media' => 'print',
], 'main-site-css');
?>

</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        // 'brandLabel' => Yii::t('app', Yii::$app->name),
        'brandLabel' => Html::img('siteImages/theSchoolLogo.jpg', ['alt'=>Yii::$app->name]), // /*'class' => 'some-class', */
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);

    
    // we do not need to display About and Contact pages to employee+ roles
    if (!Yii::$app->user->can('employee')) {
        $menuItems[] = ['label' => Yii::t('app', 'School'), 'url' => ['/school/index']];
        $menuItems[] = ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']];
    }

    // display Users to admin+ roles
    if (Yii::$app->user->can('manager')){
        $menuItems[] = ['label' => Yii::t('app', 'Users'), 'url' => ['/user/index']];
    }
    
    // display Logout to logged in users
    if (!Yii::$app->user->isGuest) {
        $menuItems[] = [
            'label' => Yii::t('app', 'Logout'). ' (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }

    // display Signup and Login pages to guests of the site
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']];
        $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
    }

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
