<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $name
 * @property string $author
 * @property string $data
 * @property int $ISBN
 *
 * @property Booksrubrics[] $booksrubrics
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data'], 'safe'],
            [['ISBN'], 'integer'],
            [['name'], 'string', 'max' => 200],
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
            'author' => 'Author',
            'data' => 'Data',
            'ISBN' => 'Isbn',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooksrubrics()
    {
        return $this->hasMany(Booksrubrics::className(), ['id_books' => 'id']);
    }

    public function getALl()
    {
        $sql='SELECT b.name,b.author,b.data,b.ISBN,r.name as rubrics_name FROM books b JOIN booksrubrics br on b.id=br.id_books join rubrics r on r.id=br.id_rubrics';
        return Books::findBySql($sql)->asArray()->all();
    }

}
