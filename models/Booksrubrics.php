<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booksrubrics".
 *
 * @property int $id
 * @property int $id_books
 * @property int $id_rubrics
 *
 * @property Books $books
 * @property Rubrics $rubrics
 */
class Booksrubrics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booksrubrics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_books', 'id_rubrics'], 'integer'],
            [['id_books'], 'exist', 'skipOnError' => true, 'targetClass' => Books::className(), 'targetAttribute' => ['id_books' => 'id']],
            [['id_rubrics'], 'exist', 'skipOnError' => true, 'targetClass' => Rubrics::className(), 'targetAttribute' => ['id_rubrics' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_books' => 'Id Books',
            'id_rubrics' => 'Id Rubrics',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['id' => 'id_books']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRubrics()
    {
        return $this->hasMany(Rubrics::className(), ['id' => 'id_rubrics']);
    }
}
