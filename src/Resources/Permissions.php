<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class Permissions
 *
 * @package McMatters\JiraApi\Resources
 */
class Permissions extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(): array
    {
        return $this->httpClient->get('permissions')->json();
    }
}
