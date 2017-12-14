<?php

class MyAutoloader
{
    public static function TestOne($className)
    {

        echo 'TestOne';

        $filename = './class/'. $className .'.class.php';
        require_once($filename);
    }


    public static function TestTwo($className)
    {
        echo 'TestTwo';

        $filename = './class2/'. $className .'.class.php';
        include_once($filename);
    }

}
