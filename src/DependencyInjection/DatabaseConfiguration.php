<?php
namespace Learn\DependencyInjection;

class DatabaseConfiguration
{

    /**
     * 链接主机
     * @var  string
     */

    private $host;

    /**
     * 端口
     * @var int
     */
    private $port;

    /**
     * 链接用户名
     * @var string
     */
    private $username;

    /**
     * 链接密码
     * @var string
     */
    private $password;

    /**
     * 初始化接口
     * @Author:   GaoYongLi
     * @DateTime: 2019-01-15
     */
    public function __construct(string $host, int $port, string $username, string $password)
    {
        $this->host     = $host;
        $this->port     = $port;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * 获取主机地址
     * @Author:   GaoYongLi
     * @DateTime: 2019-01-15
     * @return    string   主机地址
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * 获取端口号
     * @Author:   GaoYongLi
     * @DateTime: 2019-01-15
     * @return    int   端口
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * 获取用户名
     * @Author:   GaoYongLi
     * @DateTime: 2019-01-15
     * @return    string   用户名
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * 获取用户密码
     * @Author:   GaoYongLi
     * @DateTime: 2019-01-15
     * @return    string   用户密码
     */
    public function getPassword(): string
    {
        return $this->password;
    }

}
