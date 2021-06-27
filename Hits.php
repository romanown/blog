<?php
namespace backend\modules\models;

use \yii\db\ActiveRecord;
/**
 * Hits Model
 *
 * @author romanown <romanown@gmail.com>
 */
class Hits extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'api_hits';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['id', 'name', 'created'], 'required']
        ];
    }
}