<?php
namespace App\Helpers;

class AppHelper
{
    public static $bn_month = [
        "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"
    ];

    public static $en_month = [
        "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0"
    ];

    public static function en2bnMonth($month)
    {
        return str_replace(self::$en_month, self::$bn_month, $month);
    }

    public static $bn_number = [ "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০" ];
    public static $en_number = [ "1", "2", "3", "4", "5", "6", "7", "8", "9", "0" ];

    public static function en2bn($number)
    {
        return str_replace(self::$en_number, self::$bn_number, $number);
    }

    public static $bn_class = [ "৬ষ্ঠ", "৭ম", "৮ম", "৯ম", "১০ম", "৯ম (ভোক)", "১০ম (ভোক)" ];
    public static $en_class = [ "6", "7", "8", "9", "10", "901", "101"];

    public static function en2bn_class($class)
    {
        return str_replace(self::$en_class, self::$bn_class, $class);
    }
}
