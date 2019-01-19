<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $category
 * @property int $created_at
 */
class Product extends \yii\db\ActiveRecord
{
  const SCENARIO_UPDATE = 'update';
  const SCENARIO_CREATE = 'create';

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'product';
  }

  public function scenarios()
  {
    $scenarios = parent::scenarios();
    $scenarios[self::SCENARIO_DEFAULT] = ['name', 'price', 'created_at'];
    $scenarios[self::SCENARIO_CREATE] = ['name', 'price', 'created_at'];
    $scenarios[self::SCENARIO_UPDATE] = ['price', 'created_at'];

    return $scenarios;
  }


  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['price', 'created_at'], 'integer'],
      [['name', 'category'], 'string', 'max' => 20],
      [['name'], 'filter', 'filter' => function ($value) {

        $value = trim($value);
        return strip_tags($value);
      }],
      [['price'], 'integer', 'min' => 1, 'max' => 1000],
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
      'price' => 'Price',
      'category' => 'Category',
      'created_at' => 'Created At',
    ];
  }
}
