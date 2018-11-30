<?php

namespace Wandx\Weather\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Mockery\Matcher\AnyArgs;
use Wandx\Weather\Exceptions\HttpException;
use Wandx\Weather\Exceptions\InvalidArgumentException;
use Wandx\Weather\Weather;
use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    public function testGetWeather()
    {

    }

    public function testGetHttpClient()
    {

    }

    public function testSetGuzzleOptions()
    {
        
    }

    //检查$type参数
    public function testGetWeatherWithInvalidType()
    {
        $w = new Weather('mock-key');
    }
}

