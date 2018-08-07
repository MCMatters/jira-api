<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

use McMatters\Ticl\Enums\HttpStatusCode;

/**
 * Class Settings
 *
 * @package McMatters\JiraApi\Resources
 */
class Settings extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getDefaultColumns(): array
    {
        return $this->httpClient->get('settings/columns')->json();
    }

    /**
     * @param array $body
     *
     * @return bool
     */
    public function setDefaultColumns(array $body): bool
    {
        return HttpStatusCode::OK === $this->httpClient
            ->put('settings/columns', ['json' => $body])
            ->getStatusCode();
    }
}
