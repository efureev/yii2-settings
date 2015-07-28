<?php


namespace efureev\settings;

use Yii;

/**
 * Class Module
 *
 * @package pheme\settings
 *
 * @author  Aris Karageorgos <aris@phe.me>
 */
class Module extends \yii\base\Module
{
	/**
	 * @var string The controller namespace to use
	 */
	public $controllerNamespace = 'efureev\settings\controllers';

	/**
	 * Translates a message. This is just a wrapper of Yii::t
	 *
	 * @see Yii::t
	 *
	 * @param       $category
	 * @param       $message
	 * @param array $params
	 * @param null  $language
	 *
	 * @return string
	 */
	public static function t($category, $message, $params = [], $language = null)
	{
		return Yii::t('extensions/yii2-settings/' . $category, $message, $params, $language);
	}

	/**
	 * Init module
	 */
	public function init()
	{
		parent::init();
		$this->registerTranslations();
	}

	/**
	 * Registers the translation files
	 */
	protected function registerTranslations()
	{
		Yii::$app->i18n->translations['extensions/yii2-settings/*'] = [
			'class' => 'yii\i18n\PhpMessageSource',
			'sourceLanguage' => 'en-US',
			'basePath' => '@vendor/efureev/yii2-settings/messages',
			'fileMap' => [
				'extensions/yii2-settings/settings' => 'settings.php',
			],
		];
	}
}
