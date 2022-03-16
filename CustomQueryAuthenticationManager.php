<?php

declare(strict_types=1);

/*
 * ZoomAPILib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace ZoomAPILib;

use ZoomAPILib\Http\HttpRequest;

/**
 * Utility class for authorization and token management.
 */
class CustomQueryAuthenticationManager implements AuthManagerInterface, CustomQueryAuthenticationCredentials
{
    private $accessToken;

    /**
     * Returns an instance of this class.
     *
     * @param string $accessToken
     */
    public function __construct(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * String value for accessToken.
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Checks if provided credentials match with existing ones.
     *
     * @param string $accessToken
     */
    public function equals(string $accessToken): bool
    {
        return $accessToken == $this->accessToken;
    }

    /**
     * Adds authentication to the given HttpRequest.
     */
    public function apply(HttpRequest $httpRequest)
    {
        $queryUrl = $httpRequest->getQueryUrl();
        ApiHelper::appendUrlWithQueryParameters($queryUrl, [
            'access_token' => $this->accessToken,
        ]);
        $httpRequest->setQueryUrl(ApiHelper::cleanUrl($queryUrl));
    }
}