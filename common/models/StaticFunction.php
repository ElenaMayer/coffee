<?php

namespace common\models;

use Yii;
use yii\helpers\Url;


class StaticFunction
{
    public static function addGetParamToCurrentUrl($paramKey, $paramValue, $multiple = false){
        $currentUrl = Yii::$app->request->url;
        if (strripos($currentUrl, '?') === false) {
            return $currentUrl . '?' . $paramKey . '=' . $paramValue;
        } else {
            $urlArr = explode('?', $currentUrl);
            $getArr = explode('&', $urlArr[1]);
            foreach ($getArr as $key => $get){
                if (strripos($get, 'page') !== false) {
                    unset($getArr[$key]);
                }
                if (strripos($get, $paramKey) !== false) {
                    if(!$multiple || strripos($get, 'all') !== false) {
                        $getArr[$key] = preg_replace('/=.+$/i', '=' . $paramValue, $get);
                    } else {
                        if(strripos(rawurldecode($get), $paramValue) === false) {
                            $getArr[$key] = $get . ';' . $paramValue;
                        } else {
                            $parArr = explode('=', $get);
                            $params = explode(';', $parArr[1]);
                            foreach ($params as $k => $param){
                                if(rawurldecode($param) == $paramValue)
                                    unset($params[$k]);
                            }
                            $getArr[$key] = $parArr[0] . '=' . implode(';', $params);
                        }
                    }
                }
            }
            if (strripos($currentUrl, $paramKey) === false) {
                $getArr[] = $paramKey . '=' . $paramValue;
            }
            return $urlArr[0] . '?' . implode('&', $getArr);
        }
    }
}