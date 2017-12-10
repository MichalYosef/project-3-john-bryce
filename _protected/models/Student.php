<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $img
 *
 * @property StudentInCourse[] $studentInCourses
 * @property Course[] $courses
 */
class Student extends \yii\db\ActiveRecord
{
    public $fileImage;
    public $studentCourses;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    public function SetCourses($studentCourses)
    {
        $this->studentCourses = $studentCourses;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email'], 'required'],
            [['img'], 'file', 'extensions' => 'png,jpg,gif,jpeg'],
            [['name', 'phone'], 'string', 'max' => 50],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['studentCourses','safe']
            
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'img' => 'Upload Image',
            'studentCourses' => 'Courses'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentInCourses()
    {
        return $this->hasMany(StudentInCourse::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['id' => 'course_id'])->viaTable('student_in_course', ['student_id' => 'id']);
    }
}
