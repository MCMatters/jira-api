<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class CustomFieldOption
 *
 * @package McMatters\JiraApi\Resources
 */
class CustomFieldOption extends AbstractResource
{
    /**
     * @param string $id
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(string $id): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('customFieldOption/{id}', $id))
            ->json();
    }
}
