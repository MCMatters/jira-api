<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class Priority
 *
 * @package McMatters\JiraApi\Resources
 */
class Priority extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(): array
    {
        return $this->httpClient->get('priority')->json();
    }

    /**
     * @param string $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(string $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('priority/{id}', $id))
            ->json();
    }
}
