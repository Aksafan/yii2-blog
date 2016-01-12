<?php
use yii\helpers\Html;
use \yii\web\urlManager;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(
    [
        'site/email-confirm',
        'token' => $user->email_confirm_token
    ]
);
?>

Здравствуйте, <?= Html::encode($user->username) ?>!

Для подтверждения адреса электронной почты пройдите, пожалуйста, по ссылке:

<?= Html::a(Html::encode($confirmLink), $confirmLink) ?>

Если Вы не регистрировались на нашем сайте, то просто не обращайте внимание и/или удалите это письмо.