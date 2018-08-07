<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class StatusCategory
 *
 * @package McMatters\JiraApi\Resources
 */
class StatusCategory extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function list(): array
    {
        return $this->httpClient->get('statuscategory')->json();
    }

    /**
     * @param string $idOrKey
     *
     * @return mixed
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function get(string $idOrKey)
    {
        return $this->httpClient
            ->get($this->encodeUrl('statuscategory/{idOrKey}', $idOrKey))
            ->json();
    }
}
