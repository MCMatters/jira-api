<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class Avatar
 *
 * @package McMatters\JiraApi\Resources
 */
class Avatar extends AbstractResource
{
    /**
     * @param string $type
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function systemAvatars(string $type): array
    {
        return $this->httpClient
            ->get($this->encodeUrl('avatar/{type}/system', $type))
            ->json();
    }
}
