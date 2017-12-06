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
 * @property string $img_name
 *
 * @property StudentInCourse[] $studentInCourses
 * @property Course[] $courses
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'img_name'], 'required'],
            [['name', 'phone', 'email', 'img_name'], 'string', 'max' => 50],
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
            'img_name' => 'Img Name',
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
