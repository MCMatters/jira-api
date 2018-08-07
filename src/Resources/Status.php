<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class Status
 *
 * @package McMatters\JiraApi\Resources
 */
class Status extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(): array
    {
        return $this->httpClient->get('status')->json();
    }

    /**
     * @param string $idOrName
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(string $idOrName): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('status/{idOrName}', $idOrName))
            ->json();
    }
}
