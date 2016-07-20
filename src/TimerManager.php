<?php
/**
 *
 * @breif 计时器管理类库
 */

namespace Ritoyan\Timer;

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
    public static function setPrecision($precision)
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
            self::$allTimer[$name] = new Timer(self::$precision, true);
            return true;
        } else {
            $ret = self::$allTimer[$name]->start();
            return $ret;
        }
    }

    /**
     *
     * @breif 结束一个计时器
     */
    public static function stop($name)
    {
        if (!array_key_exists($name, self::$allTimer)) {
            return false;
        }
        $ret = self::$allTimer[$name]->stop();
        return $ret;
    }

    /**
     *
     * @breif 获取所有的计时器信息
     */
    public static function allTimerUsed()
    {
        $ret = [];
        foreach (self::$allTimer as $name => $timer) {
            $ret[$name] = $timer->getTimeUsed();
        }
        return $ret;
    }
}
