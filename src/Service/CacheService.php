<?php


namespace App\Service;


use Psr\Cache\CacheItemPoolInterface;
use Psr\Cache\InvalidArgumentException;
use Psr\Log\LoggerInterface;

class CacheService
{
    private int $expiresAfter;

    public function __construct(private CacheItemPoolInterface $cache, private LoggerInterface $logger)
    {
        $this->expiresAfter = $_ENV['BOOK_TTL'];
    }

    public function get(string $key): mixed
    {
        $value = null;
        try {
            $cacheItem = $this->cache->getItem($key);
            if ($cacheItem->isHit()) {
                $this->logger->info("mon entrée est présente");
                $value = $cacheItem->get();
            } else {
                $this->logger->warning("mon entrée est absente");
            }
        } catch (InvalidArgumentException $e) {
        }
        return $value;
    }

    public function set(string $key, string $content, ?int $expiresAfter)
    {
        $expiresAfter ??= $this->expiresAfter;
        try {
            $cacheItem = $this->cache->getItem($key);
            $cacheItem->set($content);
            $cacheItem->expiresAfter($expiresAfter);
            $success = $this->cache->save($cacheItem);
            if (!$success) $this->logger->error("une erreur est survenue lors de l'enregistrement en cache");
        } catch (InvalidArgumentException $e) {
        }
    }
}
