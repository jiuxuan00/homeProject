<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/5
 * Time: 下午 05:34
 */

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = ['delete_time', 'main_img_id', 'pivot', 'from', 'category_id', 'create_time', 'update_time'];

    //补全图片地址
    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

    public function imgs()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }

    public function properties()
    {
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }

    //获取更多数据
    public static function getMostRecent($count)
    {
        $products = self::limit($count)->order('create_time desc')->select();
        return $products;
    }

    public static function getProductsByCategoryID($categoryId)
    {
        $products = self::where('category_id', '=', $categoryId)->select();
        return $products;
    }

    //获取产品详情
    public static function getProductDetail($id)
    {
//        $product = self::with(['imgs.imgUrl','properties'])->find($id);
        $product = self::with([
            'imgs'=>function($query){
                $query->with(['imgUrl'])->order('order','asc');
            }
        ])->with(['properties'])->find($id);
        return $product;
    }
}