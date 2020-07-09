<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tal\Yach\Robot;

use Illuminate\Support\Facades\Http;
use Tal\Yach\Robot\Exception\ConfigNotFoundException;
use Tal\Yach\Robot\Exception\SendFailException;
use Tal\Yach\Robot\Message\Message;

/**
 * Description of Robot
 *
 * @author JIAO Jie <thomasjiao@vip.qq.com>
 */
class Robot
{

    const ROBOT_ENDPOINT = 'https://yach-oapi.zhiyinlou.com/robot/send';

    protected static $robots = [];
    protected $config;
    protected $robot         = 'default';

    public static function instance($robot = 'default') {
        if (!empty(self::$robots[$robot])) {
            return self::$robots[$robot];
        }

        $config = config("yach.robot.{$robot}");
        if (null === $config) {
            throw new ConfigNotFoundException();
        }

        self::$robots[$robot] = new self($robot, $config);
        return self::$robots[$robot];
    }

    protected function __construct($robot, $config) {
        $this->robot  = $robot;
        $this->config = $config;
    }

    /**
     * @param string $content
     * @return mixed
     */
    public function text($content = '') {
        return $this->dingTalkService
                        ->setTextMessage($content)
                        ->send();
    }

    protected function buildUrl() {
        $ts   = '' . time() . '000';
        $sign = urlencode(base64_encode(hash_hmac('sha256', "" . "{$ts}\n{$this->config['secret']}", $this->config['secret'], true)));
        return self::ROBOT_ENDPOINT . "?access_token={$this->config['token']}&timestamp={$ts}&sign={$sign}";
    }

    protected function send(Message $message) {
        $url  = $this->buildUrl();
        $data = $message->getBody();
        try {
            $response = Http::asJson()->post($url, $data)->json();
            if (empty($response)) {
                throw new SendFailException();
            }
            if (empty($response)) {
                throw new SendFailException();
            }
        } catch (\Exception $e) {
            throw new SendFailException();
        }

        if (0 == $response['code']) {
            return true;
        } else {
            throw new SendFailException($response['msg'], $response['code']);
        }
    }

}
