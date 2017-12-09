<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $img
 *
 * @property StudentInCourse[] $studentInCourses
 * @property Student[] $students
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'description', 'img'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
            [['img'], 'string', 'max' => 30],
            
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
            'description' => 'Description',
            'img' => 'Img',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentInCourses()
    {
        return $this->hasMany(StudentInCourse::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['id' => 'student_id'])->viaTable('student_in_course', ['course_id' => 'id']);
    }
}
