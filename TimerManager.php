<?php
require "Timer.php";
/**
 *
 * @breif 计时器管理类库
 */
class TimerManager
{
    private static $allTimer    = [];
    private static $precision   = Timer::PRECISION_S;

    /**
     *
     * @breif 不让构造函数运行
     */
    private function __construct()
    {
    }

    /**
     *
     * 设置精度
     */
    private static function setPrecision($precision)
    {
        self::$precision = $precision;
    }

    /**
     *
     * @breif 开启一个计时器
     * @param name string | 计时器名称 
     */
    public static function start($name)
    {
        if (!array_key_exists($name, self::$allTimer)) {
            self::$allTimer[$name] = new Timer(self::$precision);
            return true;
        } else {
            return self::$allTimer[$name]->start();
        }
    }
}
