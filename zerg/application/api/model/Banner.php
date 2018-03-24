<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/1
 * Time: 下午 04:48
 */

namespace app\api\model;


class Banner extends BaseModel
{
    protected $hidden = ['id'];


    /**
     * @ BannerItem  关联模型
     * @ banner_id   关联模型的外键
     * @ id          当前模型的ID
     */
    public function items()
    {
        return $this->hasMany('BannerItem','banner_id', 'id');
    }


    public static function getBannerById($id)
    {
        $banner = self::with(['items','items.img'])->find($id);
        return $banner;
    }



}