<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Tal\Yach\Robot\Robot;

if (!function_exists('yach_robot')) {

    /**
     * @return bool|Robot
     */
    function yach_robot() {

        $arguments = func_get_args();

        if (empty($arguments)) {
            return Robot::instance();
        } else {
            return Robot::instance($arguments[0]);
        }
    }

}