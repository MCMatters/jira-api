<?php

declare(strict_types = 1);

namespace McMatters\JiraApi\Resources;

/**
 * Class Jql
 *
 * @package McMatters\JiraApi\Resources
 */
class Jql extends AbstractResource
{
    /**
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getAutoComplete(): array
    {
        return $this->httpClient->get('jql/autocompletedata')->json();
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     */
    public function getAutoCompleteSuggestions(array $query = []): array
    {
        return $this->httpClient
            ->get('jql/autocompletedata/suggestions', ['query' => $query])
            ->json();
    }
}
