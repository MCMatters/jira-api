<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class Resolution
 *
 * @package McMatters\JiraApi\Resources
 */
class Resolution extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(): array
    {
        return $this->httpClient->get('resolution')->json();
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
            ->get($this->encodeUrl('resolution/{id}', $id))
            ->json();
    }
}
