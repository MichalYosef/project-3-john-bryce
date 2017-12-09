<?php

namespace app\controllers;

use Yii;
use app\models\Student;
use app\models\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\StudentInCourse;
use app\models\Course;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $studentModel = $this->findModel($id); 
        
        // $courseSearchModel = new CourseSearch();
        // $courseDataProvider = $courseSearchModel->search(Yii::$app->request->queryParams);

        $studentCourses = StudentInCourse::find()->where(['student_id' => $id]);//$this->getStudentRegisteredCourses();//

        

        return $this->render('view', [
            'studentModel' => $studentModel,
            'studentCourses' => $studentCourses,
            
        ]);
        
        
    }

    public function getStudentRegisteredCourses()
    {
        // student's registered courses, matching 'id' column of `course` to 'course_id' in student_in_course
        return $this->hasMany(Course::className(), ['course_id' => 'id'])
                    ->via('student_in_course');
    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();

        if ($model->load(Yii::$app->request->post())) 
        {
            $model->img = UploadedFile::getInstance($model,'img');
            $imgName = $model->name.rand(1,4000).'.'.$model->img->extension;
            $imgPath = Yii::getAlias('@uploads/').'students/'.$imgName;
            $model->img->saveAs( $imgPath );
            $model->img = $imgPath ;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        else 
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    // public function actionCreate()
    // {
    //     $model = new Student();

    //     if ($model->load(Yii::$app->request->post()) && $model->validate()) 
    //     {
    //         //
    //         $model->fileImage = UploadedFile::getInstance($model,'fileImage');
            
    //         if ($model->fileImage) 
    //         {
    //             $model->fileImage->saveAs( Yii::getAlias('@uploads/' .$model->fileImage->baseName . '.' . $model->fileImage->extension));
    //         }
            
    //         $modelCanSave = true;
            
    //         return $this->render('create', ['model' => $model,
    //                                         'modelSaved' => $modelCanSave]);
    //     }
    // }
    
    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
