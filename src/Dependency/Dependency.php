<?php
namespace Learn\Dependency;

class Dependency
{
    private $config;

    public function __construct(DatabaseConfig $config)
    {
        $this->config = $config;

    }
    public function getDsn(): string
    {
        return sprintf(
            '%s:%s@%s:%d',
            $this->config->getUsername(),
            $this->config->getPassword(),
            $this->config->getHost(),
            $this->config->getPort()
        );
        // return sprintf(
        //     '%s:%s@%s:%d',
        //     $this->config->getUsername(),
        //     $this->config->getPassword(),
        //     $this->config->getHost(),
        //     $this->config->getPort()
        // );

    }
}
