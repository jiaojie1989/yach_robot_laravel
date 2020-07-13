<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tal\Yach\Robot\Messages;

/**
 * Description of Text
 *
 * @author JIAO Jie <thomasjiao@vip.qq.com>
 */
class Text extends Message
{

    public function __construct($content) {
        $this->message = [
            'msgtype' => 'text',
            'text'    => [
                'content' => $content
            ]
        ];
    }

}
