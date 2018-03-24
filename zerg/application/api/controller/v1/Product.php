<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/6
 * Time: 下午 02:20
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ProductException;


class Product
{
    public function getRecent($count = 15)
    {
        (new Count())->goCheck();
        $products = ProductModel::getMostRecent($count);
        if ($products->isEmpty()) {
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return $products;
    }


    //获取分类下的产品
    public function getAllInCategory($id)
    {
        //1.验证id是否合法
        (new IDMustBePositiveInt())->goCheck();
        //2.获取数据
        $products = ProductModel::where('category_id', '=', $id)->select();
        if($products->isEmpty()){
            throw new ProductException();
        }
        return $products;
    }

    //获取详情
    public function getOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $product = ProductModel::getProductDetail($id);
        if(!$product){
            throw new ProductException();
        }
        return $product;
    }
}