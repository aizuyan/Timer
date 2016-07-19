<?php
/**
 *
 * @breif 计时器，可选s/ms级别精度
 */
class Timer
{
    //精度
    private $precision;
    const PRECISION_S   = 1;
    const PRECISION_MS  = 2;
    const PRECISION_US  = 3;

    //开始时间记录（us时间戳）
    private $beginTime  = 0;

    //结束记录的时间（us时间戳）
    private $endTime    = 0;

    //使用的时间，存储为微妙（ms），获取的时候可以灵活使用
    private $timeUsed   = 0;

    /**
     *
     * @breif 构造函数
     * @param precision int | 计时器的精度
     */
    public function __construct($precision = self::PRECISION_S)
    {
        $this->precision = $precision;
    }

    /**
     *
     * @breif 计时器开始计时
     *
     * @return int | 开始计数的时间微妙（us）
     */
    public function start()
    {
        $this->beginTime = $this->getTime(self::PRECISION_US);
        return $tihs->beginTime;
    }

    /**
     *
     * @breif 计时器停止计数
     *
     * @return int | 经过的时间的微秒数（us）
     */
    public function stop()
    {
        $endTime    = $this->getTime(self::PRECISION_US);
        $this->timeUsed += $endTime - $this->beginTime;
        return $endTime;
    }

    /**
     *
     * @breif 根据精度换算使用的时间
     * @param precision int | 精度类型
     *
     * @return int | 使用的时间长度
     */
    public function getTimeUsed($precision = null)
    {
        $precision  = $precision ? $precision : $this->precision;
        switch ($precision) {
            case self::PRECISION_S:
                return intval($this->timeUsed/1000000);
                break;
            case self::PRECISION_MS:
                return intval($this->timeUsed/1000);
                break;
            case self::PRECISION_US:
                return $this->timeUsed;
                break;
            default:
                return 0;
        }
    }

    private function getTime($precision)
    {
        list($usec, $sec) = explode(" ", microtime());
        switch ($precision) {
        case self::PRECISION_S:
            return $sec;
            break;
        case self::PRECISION_MS:
            return intval((floatval($sec) + floatval($usec))*1000);
            break;
        case self::PRECISION_US:
            return intval((floatval($sec) + floatval($usec)) * 1000000);
            break;
        default:
            return 0;
        }
    }
}

var_dump(new Timer(Timer::PRECISION_US));