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
        $this->andWhere(['id', '>', $id]);

        return $this;
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function previousRecord($id)
    {
        $this->andWhere(['id', '<', $id]);

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
     * @param $column
     * @return $this
     */
    public function orderByASC($column = 'id')
    {
        $this->orderBy([$column => SORT_ASC]);

        return $this;
    }

    /**
     * @param string $column
     * @return $this
     */
    public function orderByDESC($column = 'id')
    {
        $this->orderBy([$column => SORT_DESC]);

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
}
