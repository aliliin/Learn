<?php
/***************************************
Laravel框架 性能优化总结
可以用自带命令进行优化,SQL慢查询开启,
可以使用预加载的机制提升访问速度,
可以提前类加载,配置缓存
生成路由缓存: 使用 php artisan route:cache
生成的缓存文件在bootstrap目录下cacha目录下的ruote文件
提前配置缓存文件.php artisan config:cache,可以把所有的配置文件先读取到一个地方
优化类加载: php artisan optimize 命令
提前生成类的映射,这样子获取类中的方法会更快,不需要一层一层的去找了
生成的文件目录在 Vendor--composer--autoload_classmap.php文件

laravel 预加载机制的使用 先确认前端是否需要关联关系中的表的数据,如有需要,可以使用load(),with()命令

laravel 关联关系
hasOno         一对一 ,        用户-手机号
hasMany     一对多,         文章-评论
belongsTo    一对多反向     评论-文章
belongsToMany  多对多    用户-角色
hasManyThrough 远程多对多 国家-作者-文章
morphMany     多态关联        文章--视频-评论
morphToMany 多态关联多对多     文章/视频-标签

日期显示月份为英文的函数: toFormattedDateString()
显示一部分内容的函数: str_limit(内容,长度,其他后缀显示什么) 内容,100个字符,显示...

 ***************************************/
