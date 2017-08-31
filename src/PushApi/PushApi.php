<?php
/**
 * PushApi
 * PHP version 5
 *
 * @category Class
 * @package  Pushnews
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Pushnews API
 *
 * Pushnews API documentation
 *
 * OpenAPI spec version: 2.0.0
 * Contact: support@pushnews.eu
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Pushnews\PushApi;

use \Pushnews\ApiClient;
use \Pushnews\ApiException;
use \Pushnews\Configuration;
use \Pushnews\ObjectSerializer;

/**
 * PushApi Class Doc Comment
 *
 * @category Class
 * @package  Pushnews
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PushApi
{
    /**
     * API Client
     *
     * @var \Pushnews\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \Pushnews\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\Pushnews\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://api.pushnews.eu/v2');
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \Pushnews\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \Pushnews\ApiClient $apiClient set the API client
     *
     * @return PushApi
     */
    public function setApiClient(\Pushnews\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation pushSend
     *
     * Send a Push Notification
     *
     * @param string $siteId Site ID (required)
     * @param \Pushnews\Model\Notification $body Notification object (required)
     * @throws \Pushnews\ApiException on non-2xx response
     * @return \Pushnews\Model\ApiResponse
     */
    public function pushSend($siteId, $body)
    {
        list($response) = $this->pushSendWithHttpInfo($siteId, $body);
        return $response;
    }

    /**
     * Operation pushSendWithHttpInfo
     *
     * Send a Push Notification
     *
     * @param string $siteId Site ID (required)
     * @param \Pushnews\Model\Notification $body Notification object (required)
     * @throws \Pushnews\ApiException on non-2xx response
     * @return array of \Pushnews\Model\ApiResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function pushSendWithHttpInfo($siteId, $body)
    {
        // verify the required parameter 'siteId' is set
        if ($siteId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $siteId when calling pushSend');
        }
        // verify the required parameter 'body' is set
        if ($body === null) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling pushSend');
        }
        // parse inputs
        $resourcePath = "/push/{siteId}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($siteId !== null) {
            $resourcePath = str_replace(
                "{" . "siteId" . "}",
                $this->apiClient->getSerializer()->toPathValue($siteId),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('X-Auth-Token');
        if (strlen($apiKey) !== 0) {
            $headerParams['X-Auth-Token'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Pushnews\Model\ApiResponse',
                '/push/{siteId}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Pushnews\Model\ApiResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Pushnews\Model\ApiResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
