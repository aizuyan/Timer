<?php
use Timer\Timer;
use Timer\TimerManager;

require "vendor/autoload.php";
TimerManager::setPrecision(Timer::PRECISION_MS);
TimerManager::start('ps_yanruitao');
sleep(1);
TimerManager::start('ps_yrt');
usleep(1000);
TimerManager::stop('ps_yrt');
TimerManager::stop('ps_yanruitao');

print_r(TimerManager::allTimerUsed());
