<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class SecurityLevel
 *
 * @package McMatters\JiraApi\Resources
 */
class SecurityLevel extends AbstractResource
{
    /**
     * @param string $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(string $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('securitylevel/{id}', $id))
            ->json();
    }
}
