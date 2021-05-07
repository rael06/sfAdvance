<?php


namespace App\Service;


use Psr\Cache\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BookFetcher
{
    const BOOKS_CACHE_KEY = 'books';

    public function __construct(private HttpClientInterface $httpClient, private CacheService $cacheService)
    {
    }

    public function fetch(): ?array
    {
        try {
            $cachedBooks = $this->cacheService->get(self::BOOKS_CACHE_KEY);
            if (!!$cachedBooks) return json_decode($cachedBooks, true);

            $response = $this->httpClient->request(method: Request::METHOD_GET, url: $_ENV['BOOK_URL']);
            if ($response->getStatusCode() === Response::HTTP_OK) {
                $content = $response->getContent();
                $this->cacheService->set(self::BOOKS_CACHE_KEY, $content, null);
                return json_decode($content, true);
            }
        } catch (TransportExceptionInterface | ClientExceptionInterface | RedirectionExceptionInterface | ServerExceptionInterface | InvalidArgumentException $e) {
        }
    }
}
