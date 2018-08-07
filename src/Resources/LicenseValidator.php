<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class LicenseValidator
 *
 * @package McMatters\JiraApi\Resources
 */
class LicenseValidator extends AbstractResource
{
    /**
     * @param string $data
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function validate(string $data): array
    {
        return $this->httpClient
            ->post('licenseValidator', ['json' => $data])
            ->json();
    }
}
