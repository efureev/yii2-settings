<?php
/**
 * Created by PhpStorm.
 * User: zjw
 * Date: 2017/8/7
 * Time: 下午3:56
 */

namespace pheme\settings\tests;

use Yii;

class BaseSettingModelTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->setting = Yii::$app->settings;
        $this->model->value = "i am testSet value";
        $this->model->section = "testSetKey";
        $this->model->type = 'string';
        $this->model->modified = time();
        $this->model->active = "1";
        $this->model->key = 'testSetKey';
        $this->model->save();
    }

    public function testGetSettings()
    {
        $res = $this->model->getSettings();
        $this->assertTrue(in_array(['i am testSet value', 'string'], $res['testSetKey']));
    }

    public function testSetSetting()
    {
        $res = $this->model->setSetting("testSetKey", "testSetKey", "aa", "string");
        $this->assertTrue($res);
    }

    public function testDeactivateSetting()
    {
        $res = $this->model->deactivateSetting("testSetKey", "testSetKey");
        $this->assertTrue($res);
    }

    public function testActivateSetting()
    {
        $res1 = $this->model->deactivateSetting("testSetKey", "testSetKey");
        $res2 = $this->model->activateSetting("testSetKey", "testSetKey");
        $this->assertTrue($res1 && $res2);

    }

    public function testDeleteSetting()
    {
        $res = $this->model->deleteSetting("testSetKey", "testSetKey");
        $this->assertTrue($res == 1);
    }

    public function testDeleteAllSettings()
    {
        $res = $this->model->deleteAllSettings();
        $this->assertTrue($res == 1);
    }

    public function testFindSetting()
    {
        $res = $this->model->findSetting("testSetKey", "testSetKey");
        $this->assertTrue($res->id > 0);
    }
}
