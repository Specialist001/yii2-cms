<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "template".
 *
 * @property int $id ID
 * @property string $name Наименование
 * @property string $description Описание
 * @property string $mark Путь к файлу
 * @property int $status Статус
 *
 * @property Document[] $documents
 * @property Field[] $fields
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'mark'], 'required'],
            [['description'], 'string'],
            [['status'], 'integer'],
            [['name', 'mark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Наименование'),
            'description' => Yii::t('app', 'Описание'),
            'mark' => Yii::t('app', 'Метка для шаблона'),
            'status' => Yii::t('app', 'Статус'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['template_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFields()
    {
        return $this->hasMany(Field::className(), ['template_id' => 'id']);
    }
}
