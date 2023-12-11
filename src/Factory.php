<?php

namespace Nece\Brawl\FileSystem;

use Error;
use Nece\Brawl\ConfigAbstract;
use ReflectionClass;
use Throwable;

/**
 * 实例工厂
 *
 * @Author nece001@163.com
 * @DateTime 2023-06-17
 */
class Factory
{
    /**
     * 创建配置对象
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $provider 服务商名
     *
     * @return \Nece\Brawl\ConfigAbstract
     */
    public static function createConfig($provider)
    {
        try {
            $class = __NAMESPACE__ . '\\' . ucfirst($provider) . '\\Config';
            return new $class();
        } catch (Throwable $e) {
            throw new FileSystemException('不支持的服务商：' . $e->getMessage());
        }
    }

    /**
     * 创建客户端
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param ConfigAbstract $config
     *
     * @return \Nece\Brawl\FileSystem\FileSystemAbstract
     */
    public static function createClient(ConfigAbstract $config)
    {
        $class = new ReflectionClass($config);
        $namespace = $class->getNamespaceName();
        $parts = explode('\\', $namespace);
        $parts[] = 'FileSystem';
        try {
            $class = implode('\\', $parts);
            $instance = new $class();
            $instance->setConfig($config);
            return $instance;
        } catch (Error $e) {
            throw new FileSystemException('不支持的文件系统');
        }
    }
}
