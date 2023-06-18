<?php

namespace Nece\Brawl\FileSystem;

/**
 * 文件系统接口
 *
 * @Author nece001@163.com
 * @DateTime 2023-06-17
 */
interface FileSystemInterface
{
    /**
     * 写文件内容
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path 相对路径
     * @param string $content
     *
     * @return void
     */
    public function write(string $path, string $content): void;

    /**
     * 追加文件内容
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path 相对路径（已存在的文件）
     * @param string $content
     *
     * @return void
     */
    public function append(string $path, string $content): void;

    /**
     * 复制文件
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $source 相对路径
     * @param string $destination 相对路径
     *
     * @return void
     */
    public function copy(string $source, string $destination): void;

    /**
     * 移动文件
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $source 相对路径
     * @param string $destination 相对路径
     *
     * @return void
     */
    public function move(string $source, string $destination): void;

    /**
     * 上传文件
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $local 绝对路径
     * @param string $to 相对路径
     *
     * @return void
     */
    public function upload(string $local, string $to): void;

    /**
     * 文件是否存在
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path 相对路径
     *
     * @return boolean
     */
    public function exists(string $path): bool;

    /**
     * 读取文件内容
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path 相对路径
     *
     * @return string
     */
    public function read(string $path): string;

    /**
     * 删除文件
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path 相对路径
     *
     * @return void
     */
    public function delete(string $path): void;

    /**
     * 创建目录
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path 相对路径
     *
     * @return void
     */
    public function mkDir(string $path): void;

    /**
     * 获取最后更新时间
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path 相对路径
     *
     * @return integer
     */
    public function lastModified(string $path): int;

    /**
     * 获取文件大小(字节数)
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path 相对路径
     *
     * @return integer
     */
    public function fileSize(string $path): int;

    /**
     * 列表
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     *
     * @param string $path 相对路径
     *
     * @return array
     */
    public function readDir(string $path): array;

    /**
     * 生成预签名 URL
     *
     * @Author nece001@163.com
     * @DateTime 2023-06-17
     * 
     * @param string $path 相对路径
     * @param int $expires 过期时间
     *
     * @return string
     */
    public function buildPreSignedUrl(string $path, $expires = null): string;
}
