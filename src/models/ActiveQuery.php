<?php

namespace thienhungho\ActiveQuery\models;

use yii\db\ActiveQuery as BaseActiveQuery;

/**
 * Class ActiveQuery
 * @package thienhungho\ActiveQuery\models
 */
class ActiveQuery extends BaseActiveQuery
{
    /**
     * @param $data_type
     *
     * @return $this
     */
    public function dataType($data_type)
    {
        if ($data_type === DATA_TYPE_ARRAY) {
            $this->asArray();
        }

        return $this;
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function nextRecord($id)
    {
        $this->andWhere(['>', 'id', $id]);

        return $this;
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function previousRecord($id)
    {
        $this->andWhere(['<', 'id', $id]);

        return $this;
    }

    /**
     * @return $this
     */
    public function latestRecord()
    {
        $this->orderBy(['id' => SORT_DESC]);

        return $this;
    }

    /**
     * @return $this
     */
    public function oldestRecord()
    {
        $this->orderBy(['id' => SORT_ASC]);

        return $this;
    }

    /**
     * @inheritdoc
     * @return \thienhungho\PostManagement\modules\PostBase\query\Post[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \thienhungho\PostManagement\modules\PostBase\query\Post|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param $column
     * @param $start
     * @param $end
     *
     * @return $this
     */
    public function between($column, $start, $end)
    {
        $this->andWhere(['between', $column, $start, $end]);

        return $this;
    }

    /**
     * @param $column
     * @param $value
     *
     * @return $this
     */
    public function like($column, $value)
    {
        $this->andWhere(['like', $column, $value]);

        return $this;
    }
}
