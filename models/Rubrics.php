<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rubrics".
 *
 * @property int $id
 * @property string $name
 *
 * @property Booksrubrics[] $booksrubrics
 */
class Rubrics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rubrics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 32],
            [['author'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooksrubrics()
    {
        return $this->hasMany(Booksrubrics::className(), ['id_rubrics' => 'id']);
    }
    
}
