<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $created_at
 * @property integer $active
 *
 * @property Comments[] $comments
 * @property PostCategory[] $postCategories
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'created_at'], 'required'],
            [['created_at', 'active'], 'integer'],
            ['id_category', 'safe'],
            [['title'], 'string', 'max' => 255, 'message' => 'Не может быть больше 255 символов.'],
            [['description'], 'string', 'max' => 50000, 'message' => 'Не может быть больше 50 000 символов.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Post created at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['id_post' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(),['id' => 'id_category'])
            ->viaTable('post_category',['id_post' => 'id']);
    }
}
