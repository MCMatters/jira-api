<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class MyPreferences
 *
 * @package McMatters\JiraApi\Resources
 */
class MyPreferences extends AbstractResource
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->get('mypreferences', ['query' => $query])
            ->json();
    }

    /**
     * @param string $key
     * @param string $data
     *
     * @return bool
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function set(string $key, string $data): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->put(
                'mypreferences',
                ['json' => $data, 'query' => ['key' => $key]]
            )
            ->json();
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function delete(string $key): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete('mypreferences', ['query' => ['key' => $key]])
            ->getStatusCode();
    }

    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getLocale(): array
    {
        return $this->httpClient->get('mypreferences/locale')->json();
    }

    /**
     * @param string $locale
     *
     * @return bool
     */
    public function setLocale(string $locale): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->put('mypreferences/locale', ['json' => ['locale' => $locale]])
            ->getStatusCode();
    }

    /**
     * @return bool
     */
    public function deleteLocale(): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete('mypreferences/locale')
            ->getStatusCode();
    }
}
