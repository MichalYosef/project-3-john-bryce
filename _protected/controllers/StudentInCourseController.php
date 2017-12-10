<?php

namespace app\controllers;

use Yii;
use app\models\StudentInCourse;
use app\models\StudentInCourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentInCourseController implements the CRUD actions for StudentInCourse model.
 */
class StudentInCourseController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all StudentInCourse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentInCourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StudentInCourse model.
     * @param integer $student_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionView($student_id, $course_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($student_id, $course_id),
        ]);
    }

    /**
     * Creates a new StudentInCourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StudentInCourse();

        if ($model->load(Yii::$app->request->post()))
        {
            try
            {
                $model->save();
            }
            catch(\yii\db\Exception $e )
            {
                if($e->getCode() == 23000)
                {
                    // key violation allready exist
                }

            }
            
        
            return $this->redirect(['view', 'student_id' => $model->student_id, 'course_id' => $model->course_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StudentInCourse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $student_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionUpdate($student_id, $course_id)
    {
        $model = $this->findModel($student_id, $course_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'student_id' => $model->student_id, 'course_id' => $model->course_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StudentInCourse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $student_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionDelete($student_id, $course_id)
    {
        $this->findModel($student_id, $course_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StudentInCourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $student_id
     * @param integer $course_id
     * @return StudentInCourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($student_id, $course_id)
    {
        if (($model = StudentInCourse::findOne(['student_id' => $student_id, 'course_id' => $course_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
