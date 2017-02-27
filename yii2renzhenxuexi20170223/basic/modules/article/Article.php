<?php

namespace app\modules\article;

/**
 * article module definition class
 */
class Article extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\article\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
            //这里的articlephp init 方法 是用来管理子模块的 因为这里article是父模块
        $this->modules=[
            'category'=>'app\modules\article\modules\category\category',
        ];
    }
}
