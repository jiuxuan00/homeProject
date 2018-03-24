<?php
/**
 * Created by PhpStorm.
 * User: efeiyi
 * Date: 18/3/21
 * Time: 下午11:25
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['img_id', 'delete_time', 'product_id'];

    public function imgUrl()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}