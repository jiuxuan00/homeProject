<?php
/**
 * Created by PhpStorm.
 * User: efeiyi
 * Date: 18/3/22
 * Time: 下午10:11
 */

namespace app\api\controller\v1;


use app\api\model\User as UserModel;
use app\api\service\Token as TokenService;
use app\api\validate\AddressNew;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\TokenException;
use app\lib\exception\UserException;

class Address
{
    //
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createOrUpdateAddress']
    ];

    //
    public function checkPrimaryScope()
    {
        $scope = TokenService::getCurrentTokenVar('scope');
        if ($scope) {
            if ($scope >= ScopeEnum::User) {
                return true;
            } else {
                throw new ForbiddenException();
            }
        } else {
            throw new TokenException();
        }
    }


    //新增地址或更新地址
    public function createOrUpdateAddress()
    {
        $validate = (new AddressNew());
        $validate->goCheck();
        //根据token获取UID
        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);
        //根据uid来查找用户数据，判断用户是否存在，如果不存在抛出异常
        if (!$user) {
            throw new UserException([
                'code' => 404,
                'msg' => '用户收获地址不存在',
                'errorCode' => 60001
            ]);
        }
        //获取用户从客户端提交来的地址信息
        $data = $validate->getDataByRule(input('post.'));

        //根据用户地址信息是否存在，从而判断是添加地址还是更新地址
        $userAddress = $user->address;
        if (!$userAddress) {
            //新增
            $user->address()->save($data);
        } else {
            //更新
            $user->address->save($data);
        }

        return json(new SuccessMessage(), 201);
    }
}