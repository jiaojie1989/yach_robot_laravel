<?php

return [
    // 默认发送的机器人

    'default' => [
        // 是否要开启机器人，关闭则不再发送消息
        'enabled'    => env('YACH_ROBOT_ENABLED', true),
        // 机器人的access_token
        'token'      => env('YACH_ROBOT_TOKEN', ''),
        // 钉钉请求的超时时间
        'timeout'    => env('YACH_ROBOT_TIME_OUT', 2.0),
        // 是否开启ss认证
        'ssl_verify' => env('YACH_ROBOT_SSL_VERIFY', true),
        // 开启安全配置
        'secret'     => env('YACH_ROBOT_SECRET', true),
    ],
    'other'   => [
        'enabled'    => env('YACH_ROBOT_ENABLED', true),
        'token'      => env('YACH_ROBOT_TOKEN', ''),
        'timeout'    => env('YACH_ROBOT_TIME_OUT', 2.0),
        'ssl_verify' => env('YACH_ROBOT_SSL_VERIFY', true),
        'secret'     => env('YACH_ROBOT_SECRET', true),
    ]
];
