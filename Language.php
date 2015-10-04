<?php
/**
 * @copyright Copyright &copy; Marc Huizinga, CSA, 2015
 * @package yii2-static
 * @version 0.0.1
 */

namespace csa\static;

use Yii;
use yii\web\Controller;

/**
 * CSA Language related additions
 */
class Language
{
	/**
	 * 
	 * @return string
	 */
	public static function getDisplayLanguage($lng)
	{
		$current=Yii::$app->language;

        //$language=Locale::getDisplayLanguage($lng, $current);
        $language=locale_get_display_language($lng, $current);
        //$local=Locale::getDisplayLanguage($lng, $lng);
        $local=locale_get_display_language($lng, $lng);
        
        if($lng==$current):
            return $language;
        else:
            return $language.' ('.$local.')';
        endif;
	}

	/**
	 * based on tnldata/yiitnl_ba Controller.php (Yii 1.x)
	 * @return array
	 */
	public static function listDataAllLanguages()
	{
        //$languages=['nl','en','de','fr','es','tr','ru','ar','he',];
        $languages=Yii::$app->languagepicker->languages;//set in backend/frontend /config/main
		
		$array=[]; $current=Yii::$app->language;
		foreach($languages as $lng):
			$array[$lng]= self::getDisplayLanguage($lng);
		endforeach;        
        
        //var_dump($array);
		return $array;
	}
}
