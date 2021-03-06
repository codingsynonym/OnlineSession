<?php

declare(strict_types=1);

/*
 * ZoomAPILib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace ZoomAPILib\Controllers;

use ZoomAPILib\Exceptions\ApiException;
use ZoomAPILib\ApiHelper;
use ZoomAPILib\ConfigurationInterface;
use ZoomAPILib\Models;
use ZoomAPILib\Http\HttpRequest;
use ZoomAPILib\Http\HttpResponse;
use ZoomAPILib\Http\HttpMethod;
use ZoomAPILib\Http\HttpContext;
use ZoomAPILib\Http\HttpCallBack;
use Unirest\Request;

class GroupsController extends BaseController
{
    public function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        parent::__construct($config, $authManagers, $httpCallBack);
    }

    /**
     * List groups under your account
     *
     * @return Models\GroupList Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function groups(): Models\GroupList
    {
        //prepare query string for API call
        $_queryBuilder = '/groups';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => self::$userAgent,
            'Accept'        => 'application/json'
        ];

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }


        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpRequest);
        return ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'GroupList');
    }

    /**
     * Create a group under your account
     *
     * @param Models\Body1 $body
     *
     * @return Models\GroupCreateResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function groupCreate(Models\Body1 $body): Models\GroupCreateResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/groups';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => self::$userAgent,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json'
        ];

        //json encode body
        $_bodyJson = ApiHelper::serialize($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders(), $_bodyJson);
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }


        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpRequest);
        return ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'GroupCreateResponse');
    }

    /**
     * Retrieve a group under your account
     *
     * @param string $groupId The group ID
     *
     * @return Models\GroupResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function group(string $groupId): Models\GroupResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/groups/{groupId}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'groupId' => $groupId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => self::$userAgent,
            'Accept'        => 'application/json'
        ];

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }


        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new ApiException('Group not found', $_httpRequest, $_httpResponse);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpRequest);
        return ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'GroupResponse');
    }

    /**
     * Update a group under your account
     *
     * @param string $groupId The group ID
     * @param Models\Body2 $body
     *
     * @return void Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function groupUpdate(string $groupId, Models\Body2 $body): void
    {
        //prepare query string for API call
        $_queryBuilder = '/groups/{groupId}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'groupId' => $groupId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => self::$userAgent,
            'content-type'  => 'application/json'
        ];

        //json encode body
        $_bodyJson = ApiHelper::serialize($body);

        $_httpRequest = new HttpRequest(HttpMethod::PATCH, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::patch($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders(), $_bodyJson);
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }


        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new ApiException('Group not found', $_httpRequest, $_httpResponse);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpRequest);
    }

    /**
     * Delete a group under your account
     *
     * @param string $groupId The group ID
     *
     * @return void Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function groupDelete(string $groupId): void
    {
        //prepare query string for API call
        $_queryBuilder = '/groups/{groupId}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'groupId' => $groupId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => self::$userAgent
        ];

        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::delete($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }


        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new ApiException('Group not found', $_httpRequest, $_httpResponse);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpRequest);
    }

    /**
     * List a group's members under your account
     *
     * @param string $groupId The group ID
     * @param int|null $pageSize The number of records returned within a single API call
     * @param int|null $pageNumber Current page number of returned records
     *
     * @return Models\GroupMemberList Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function groupMembers(string $groupId, ?int $pageSize = 30, ?int $pageNumber = 1): Models\GroupMemberList
    {
        //prepare query string for API call
        $_queryBuilder = '/groups/{groupId}/members';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'groupId'     => $groupId,
        ]);

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'page_size'   => (null != $pageSize) ?
                $pageSize : 30,
            'page_number' => (null != $pageNumber) ?
                $pageNumber : 1,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => self::$userAgent,
            'Accept'        => 'application/json'
        ];

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }


        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new ApiException('Group not found', $_httpRequest, $_httpResponse);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpRequest);
        return ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'GroupMemberList');
    }

    /**
     * Add members to a group under your account
     *
     * @param string $groupId The group ID
     * @param Models\Body3 $body
     *
     * @return Models\GroupMembersCreateResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function groupMembersCreate(string $groupId, Models\Body3 $body): Models\GroupMembersCreateResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/groups/{groupId}/members';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'groupId' => $groupId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => self::$userAgent,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json'
        ];

        //json encode body
        $_bodyJson = ApiHelper::serialize($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders(), $_bodyJson);
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }


        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new ApiException('Group not found', $_httpRequest, $_httpResponse);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpRequest);
        return ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'GroupMembersCreateResponse');
    }

    /**
     * Delete a member from a group under your account
     *
     * @param string $groupId The group ID
     * @param string $memberId The member ID
     *
     * @return void Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function groupMembersDelete(string $groupId, string $memberId): void
    {
        //prepare query string for API call
        $_queryBuilder = '/groups/{groupId}/members/{memberId}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'groupId'  => $groupId,
            'memberId' => $memberId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => self::$userAgent
        ];

        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::delete($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }


        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 404) {
            throw new ApiException('Group or Group member not found', $_httpRequest, $_httpResponse);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpRequest);
    }
}
