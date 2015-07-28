<?php
/**
 * @link      http://phe.me
 * @copyright Copyright (c) 2014 Pheme
 * @license   MIT http://opensource.org/licenses/MIT
 */

use efureev\settings\Module;
use yii\helpers\Html;

/**
 * @var yii\web\View                    $this
 * @var efureev\settings\models\Setting $model
 */

$this->title = Module::t(
		'settings',
		'Update: ',
		[
			'modelClass' => Module::t('settings', 'Setting'),
		]
	) . ' ' . $model->section . '.' . $model->key;

$this->params['breadcrumbs'][] = ['label' => Module::t('settings', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('settings', 'Update');

?>
<div class="setting-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?=
	$this->render(
		'_form',
		[
			'model' => $model,
		]
	) ?>

</div>
