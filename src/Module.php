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
     * @var string source language for translation
     */
    public $sourceLanguage = 'en-US';

	/**
	 * @var string The controller namespace to use
	 */
	public $controllerNamespace = 'efureev\settings\controllers';

    /**
     * @var null|array The roles which have access to module controllers, eg. ['admin']. If set to `null`, there is no accessFilter applied
     */
    public $accessRoles = null;

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
            'sourceLanguage' => $this->sourceLanguage,
			'basePath' => '@vendor/efureev/yii2-settings/src/messages',
			'fileMap' => [
				'extensions/yii2-settings/settings' => 'settings.php',
			],
		];
	}
}
