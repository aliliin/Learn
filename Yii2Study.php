<?php

// 查询
$users = User::findAll(10);
$user  = User::findOne(10);
$users = User::find()->where(['id' => 10])->all();
$users = User::findAll([10, 11, 12]);
$users = User::find()->where(['IN', 'id', [10, 11, 12]])->all();
$users = User::find()->where(['id' => [10, 11, 12]])->all();
$users = User::findAll(['age' => 30, 'status' => 1]);
$users = User::find()->where(['age' => 30, 'status' => 1])->all();
$users = User::find()->where('age=:age AND status=:status')->addParams([':age' => 30, ':status' => 1])->all();
$users = User::find()->indexBy('id')->where(['age' => 30, 'status' => 1])->all();
$count = User::find()->where(['age' => 30, 'status' => 1])->count();
$users = User::find()->where(['age' => 30, 'status' => 1])->andWhere('score > 100')->orderBy('id DESC')->offset(5)->limit(10)->all();
$users = User::findBySql('SELECT * FROM customer WHERE age=30 AND status=1 AND score>100 ORDER BY id DESC LIMIT 5,10')->all();

// 联合查询
$userInfo = User::find()->leftJoin('user_info', 'id=user_id')->where(['id' => 2])->one();

// 更新 修改
$user         = User::findOne(10);
$user->status = 1;
$user->update();
User::updateAll(['status' => 1], 'id = :id', [':id' => 10]);

// 删除
User::findOne(10)->delete();
User::deleteAll(['status' => 1], 'id = :id', [':id' => 10]);
