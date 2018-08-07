<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class ApplicationRole
 *
 * @package McMatters\JiraApi\Resources
 */
class ApplicationRole extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(): array
    {
        return $this->httpClient->get('applicationrole')->json();
    }

    /**
     * @param string $key
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(string $key): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('applicationrole/{key}', $key))
            ->json();
    }
}
