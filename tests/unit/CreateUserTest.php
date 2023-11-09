<?php


namespace Unit;

use app\models\User;
use app\models\Users;
use \UnitTester;

class CreateUserTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    // tests
    public function testSomeFeature()
    {
        $user = new Users();
        $user->login = 'golyakov';
        $user->password = '123';
        $user->save();

        $this->assertEquals(true,$this->count(User::find()->where(['login'=>'golyakov'])->asArray()) == 1 ? true : false);
    }
}
