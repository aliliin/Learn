<?php

namespace Learn\TraitLearn;

// 小米手机、三星手机、 都有面部识别功能
// 定义一个 Trait 类 Trait 的命名规范最好是以 able 结尾

trait Faceable
{
    protected $faceID = 0;

    /**
     *  面部识别方法
     * @Author   GaoYongLi
     * @DateTime 2019-02-20
     * @version  [version]
     * @return   [type]     [description]
     */
    public function getFace()
    {
        return $this->faceID;
    }

    /**
     *  设置面部方法
     * @Author   GaoYongLi
     * @DateTime 2019-02-20
     * @version  [version]
     * @param    string     $faceID [description]
     */
    public function setFace(string $faceID)
    {
        $this->faceID = $faceID;
    }
}
