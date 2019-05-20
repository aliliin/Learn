<?php
namespace Learn\Singleton\Tests;

use Learn\Singleton\Singleton;
use PHPUnit\Framework\TestCase;

/**
 * Class SingletonTest 单例模式 单元测试
 * @package Learn\Singleton\Tests
 */
class SingletonTest extends TestCase
{
    public function testGetInstance()
    {
        $firstCall  = Singleton::getInstance();
        $secondCall = Singleton::getInstance();
        $this->assertInstanceOf(Singleton::class, $firstCall);
        $this->assertSame($firstCall, $secondCall);
    }

    /**
     * 根据字段排序
     * asc正向排序 desc逆向排序 nat自然排序
     * @param     [type]     $array   需要排序的数组
     * @param     [type]     $field   指定排序的字段
     * @param     string     $sortby  排序类型
     * @return    arrayOrbool         排完序的新数组或者排序失败
     */
    public function listSortBy($array, $field, $sortby = 'asc')
    {
        if (is_array($array)) {
            $refer = $resultSet = array();
            foreach ($array as $key => $data) {
                $refer[$key] = &$data[$field];
            }
            switch ($sortby) {
                case 'asc': // 正向排序
                    asort($refer);
                    break;
                case 'desc': // 逆向排序
                    arsort($refer);
                    break;
                case 'nat': // 自然排序
                    natcasesort($refer);
                    break;
            }
            foreach ($refer as $k => $val) {
                $resultSet[] = &$array[$k];
            }
            return $resultSet;
        }
        return false;
    }
}
