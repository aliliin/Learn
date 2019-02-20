<?php

namespace Learn\TraitLearn;

class MiPhone
{
    // 引入面部识别功能
    use Faceable;
    // 独特的系统
    protected $miui;

    public function __construct($miui)
    {
        $this->miui = $miui;
        $this->bootUI();
    }

    /**
     *  本类的私有方法
     * @Author   GaoYongLi
     * @DateTime 2019-02-20
     * @version  [version]
     * @return   [type]     [description]
     */
    private function bootUI()
    {
        return $this->miui;
    }
}
