<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tal\Yach\Robot\Messages;

/**
 * Description of Message
 *
 * @author JIAO Jie <thomasjiao@vip.qq.com>
 */
abstract class Message
{

    protected $message = [];
    protected $at;

    public function getMessage() {
        return $this->message;
    }

    protected function makeAt($mobiles = [], $atAll = false) {
        return [
            'at' => [
                'atMobiles' => $mobiles,
                'isAtAll'   => $atAll
            ]
        ];
    }

    public function sendAt($mobiles = [], $atAll = false) {
        $this->at = $this->makeAt($mobiles, $atAll);
        return $this;
    }

    public function getBody() {

        if (empty($this->at)) {
            $this->sendAt();
        }
        return $this->message + $this->at;
    }

}
