<?php
/**
 * Created by PhpStorm.
 * User: efeiyi
 * Date: 18/3/21
 * Time: 下午11:30
 */

namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected $hidden = ['product_id', 'delete_time', 'update_time', 'id'];
}