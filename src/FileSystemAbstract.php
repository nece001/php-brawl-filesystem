<?php

namespace Nece\Brawl\FileSystem;

use Nece\Brawl\ClientAbstract;
use Nece\Brawl\ConfigAbstract;

abstract class FileSystemAbstract extends ClientAbstract implements FileSystemInterface
{
    protected $sub_path;
    protected $base_url;
    protected $real_path;
    protected $uri;
    protected $url;

    /**
     * 设置配置
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param ConfigAbstract $config
     *
     * @return void
     */
    public function setConfig(ConfigAbstract $config)
    {
        parent::setConfig($config);

        $this->base_url = rtrim(str_replace('\\', '/', $this->getConfigValue('base_url', '')), '/');
        $this->sub_path = trim(str_replace('\\', '/', $this->getConfigValue('sub_path', '')), '/');
    }

    /**
     * 构建绝对路径
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path
     *
     * @return string
     */
    protected function buildPath($path)
    {
        return $path;
    }

    /**
     * 构建带子路径的绝对路径
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path
     *
     * @return string
     */
    protected function buildPathWithSubPath($path)
    {
        $path = ltrim(str_replace('\\', '/', $path), '/');
        $this->real_path = $this->sub_path . '/' . $path;
        return $this->real_path;
    }

    /**
     * 设置uri
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $uri
     *
     * @return void
     */
    protected function setUri($uri)
    {
        $this->uri = str_replace('\\', '/', $uri);
    }

    /**
     * 构建URL
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-18
     *
     * @param string $uri
     * @param int $expires 超时时间（秒）
     *
     * @return string
     */
    public function buildUrl(string $uri, $expires = null)
    {
        return $this->base_url . '/' . $uri;
    }

    /**
     * 获取uri
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * 获取url
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     * 
     * @param int $expires 超时时间（秒）
     *
     * @return string
     */
    public function getUrl($expires = null)
    {
        return $this->buildUrl($this->uri, $expires);
    }

    /**
     * 文件重命名
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $source
     * @param string $destination
     *
     * @return void
     */
    public function rename(string $source, string $destination)
    {
        $this->move($source, $destination);
    }

    /**
     * 列出目录中的目录
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path
     *
     * @return array
     */
    public function listDir(string $path)
    {
        return $this->readDir($path);
    }

    /**
     * 列出目录中的文件
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path
     *
     * @return array
     */
    public function listFile(string $path)
    {
        return $this->readDir($path);
    }
}
