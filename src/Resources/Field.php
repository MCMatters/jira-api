<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Field
 *
 * @package McMatters\JiraApi\Resources
 */
class Field extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(): array
    {
        return $this->httpClient->get('field')->json();
    }

    /**
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function create(array $body): array
    {
        return $this->httpClient->post('field', ['json' => $body])->json();
    }

    /**
     * @param string $key
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function options(string $key, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('field/{key}/option', $key),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $key
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function createOption(string $key, array $body): array
    {
        return $this->httpClient
            ->post(
                $this->encodeUrl('field/{key}/option', $key),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param string $key
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function selectableOptions(string $key, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('field/{key}/option/suggestions/edit', $key),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $key
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function visibleOptions(string $key, array $query = []): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl('field/{key}/option/suggestions/search', $key),
                ['query' => $query]
            )
            ->json();
    }

    /**
     * @param string $key
     * @param string $optionId
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getOption(string $key, string $optionId): array
    {
        return $this->httpClient
            ->get(
                $this->encodeUrl(
                    'field/{key}/option/{optionId}',
                    [$key, $optionId]
                )
            )
            ->json();
    }

    /**
     * @param string $key
     * @param string $optionId
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function updateOption(
        string $key,
        string $optionId,
        array $body
    ): array {
        return $this->httpClient
            ->put(
                $this->encodeUrl(
                    'field/{key}/option/{optionId}',
                    [$key, $optionId]
                ),
                ['json' => $body]
            )
            ->json();
    }

    /**
     * @param string $key
     * @param string $optionId
     *
     * @return bool
     */
    public function deleteOption(string $key, string $optionId): bool
    {
        return HttpStatusCode::NO_CONTENT === $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'field/{key}/option/{optionId}',
                    [$key, $optionId]
                )
            )
            ->getStatusCode();
    }

    /**
     * @param string $key
     * @param string $optionId
     * @param array $query
     *
     * @return mixed
     */
    public function replaceOption(
        string $key,
        string $optionId,
        array $query = []
    ) {
        return $this->httpClient
            ->delete(
                $this->encodeUrl(
                    'field/{key}/option/{optionId}/issue',
                    [$key, $optionId]
                ),
                ['query' => $query]
            )
            ->getHeader('location');
    }
}
