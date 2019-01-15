<?php
namespace Learn\DependencyInjection;

class DatabaseConnection
{
    /**
     * @var DatabaseConfiguration
     */
    private $configuration;

    /**
     * 初始化本类，并依赖注入 获取数据库连接信息的类
     * @Author:   GaoYongLi
     * @DateTime: 2019-01-15
     * @param     DatabaseConfiguration $config [依赖注入使用的类]
     */
    public function __construct(DatabaseConfiguration $config)
    {
        $this->configuration = $config;
    }

    /**
     * 获取dsn地址
     * @Author:   GaoYongLi
     * @DateTime: 2019-01-15
     * @return    string dsn 地址
     */
    public function getDsn(): string
    {
        // 这仅仅是显示，并不是一个真正的 DSN
        // 注意这里值使用了注入的配置 所以这里是关键的分离关注点
        return sprintf(
            '%s:%s@%s:%d',
            $this->configuration->getUsername(),
            $this->configuration->getPassword(),
            $this->configuration->getHost(),
            $this->configuration->getPort()
        );

    }
}
