<?php
/* @var $this yii\web\View */

$this->title = Yii::t('app', Yii::$app->name);

?>


    <div class="container-fluid">

        <div class="row">
            
            <div class="col-lg-3 col-md-3 col-sm-3 leftCol">

                <?php 
                    if(isset($this->blocks['leftBlock'])) 
                    { 
                        echo $this->blocks['leftBlock'];  
                    } 
                ?>

            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-3 midCol">
            midCol
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 mainContainer">
            mainContainer
            </div>

        </div> <!-- row -->

    </div> <!-- body-content -->



