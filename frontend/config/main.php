<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id'                  => 'app-frontend',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules'             => [
        'go1' => [
            'class' => 'frontend\modules\go1\Module',
        ],
    ],
    'components'          => [
        'request'      => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user'         => [
            'identityClass'   => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie'  => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session'      => [
            'name' => 'chess-blog-frontend',
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager'   => [
            'enablePrettyUrl'     => true,  //Url美化
            'enableStrictParsing' => false,  //严格解析:启用严格解析，要求当前请求应至少匹配1个路由规则
            'showScriptName'      => false,
            'suffix' => '.html',
            'rules'               => [

            ],
        ],
    ],
    'params'              => $params,
];
