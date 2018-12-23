<?php if (!class_exists('CaptchaConfiguration')) { return; }

/**
 * Created by PhpStorm.
 * User: Benoit
 * Date: 23/12/2018
 * Time: 15:11
 */
// BotDetect PHP Captcha configuration options

return [
    // Captcha configuration for example page
    'Captach_contact' => [
        'UserInputID' => 'captchaCode',
        'ImageWidth' => 250,
        'ImageHeight' => 50,
    ],

];