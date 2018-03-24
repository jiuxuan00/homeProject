<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/6
 * Time: 下午 04:45
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time'];

    public function img()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }
}