<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property string $name
 * @property string $title
 * @property integer $id
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string'],
            [['name'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'title' => 'Title',
            'id' => 'ID',
        ];
    }
}
