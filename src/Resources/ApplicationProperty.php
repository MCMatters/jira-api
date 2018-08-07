<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class ApplicationProperty
 *
 * @package McMatters\JiraApi\Resources
 */
class ApplicationProperty extends AbstractResource
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
            ->get('application-properties', ['query' => $query])
            ->json();
    }

    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function advancedSettings(): array
    {
        return $this->httpClient
            ->get('application-properties/advanced-settings')
            ->json();
    }

    /**
     * @param string $id
     * @param array $body
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function set(string $id, array $body): array
    {
        return $this->httpClient
            ->put(
                $this->encodeUrl('application-properties/{id}', $id),
                ['json' => $body]
            )
            ->json();
    }
}
