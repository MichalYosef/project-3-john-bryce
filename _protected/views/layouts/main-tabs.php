<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
// use yii\bootstrap\Nav;
// use yii\bootstrap\NavBar;
// use yii\widgets\Breadcrumbs;
use yii\bootstrap\Tabs;

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
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    $logoSrc = Yii::getAlias('@webroot')."/_protected/views/layouts/images/theSchoolLogo.jpg";
    $imgTag = '<img src='.$logoSrc.'>';

    echo Tabs::widget([
        'items' => [
            // [ TODO: Load LOGO
            //     'label' => $imgTag,
            //     'encode' =>false,
            //     'active' => true
            // ],
            [
                'label' => 'TheSchool',
                // 'content' => 'Anim pariatur cliche...',
                // // 'headerOptions' => [...],
                // 'options' => ['id' => 'myveryownID'],
            ],
            [
                'label' => 'School',
                'url' => 'http://www.example.com',
            ],
            [
                'label' => 'Dropdown',
                'items' => [
                     [
                         'label' => 'DropdownA',
                         'content' => 'DropdownA, Anim pariatur cliche...',
                     ],
                     [
                         'label' => 'DropdownB',
                         'content' => 'DropdownB, Anim pariatur cliche...',
                     ],
                     [
                         'label' => 'External Link',
                         'url' => 'http://www.example.com',
                     ],
                ],
            ],
        ],
    ]);
    // NavBar::begin([
    //     'brandLabel' => Yii::t('app', Yii::$app->name),
    //     'brandUrl' => Yii::$app->homeUrl,
    //     'options' => [
    //         'class' => 'navbar-default navbar-fixed-top',
    //     ],
    // ]);

    
    // we do not need to display About and Contact pages to employee+ roles
    // if (!Yii::$app->user->can('employee')) {
    //     $menuItems[] = ['label' => Yii::t('app', 'School'), 'url' => ['/school/index']];
    //     $menuItems[] = ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']];
    // }

    // // display Users to admin+ roles
    // if (Yii::$app->user->can('manager')){
    //     $menuItems[] = ['label' => Yii::t('app', 'Users'), 'url' => ['/user/index']];
    // }
    
    // // display Logout to logged in users
    // if (!Yii::$app->user->isGuest) {
    //     $menuItems[] = [
    //         'label' => Yii::t('app', 'Logout'). ' (' . Yii::$app->user->identity->username . ')',
    //         'url' => ['/site/logout'],
    //         'linkOptions' => ['data-method' => 'post']
    //     ];
    // }

    // // display Signup and Login pages to guests of the site
    // if (Yii::$app->user->isGuest) {
    //     $menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']];
    //     $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
    // }

    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right'],
    //     'items' => $menuItems,
    // ]);

    // NavBar::end();
    ?>

    
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
