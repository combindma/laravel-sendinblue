<?php

namespace Combindma\Sendinblue;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use SendinBlue\Client\Api\ContactsApi;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\CreateContact;

class Sendinblue
{
    protected $apiKey;

    protected $apiEnabled;

    protected $listIds;

    protected $baseUri = 'https://api.sendinblue.com/v3';

    public function __construct()
    {
        $this->apiEnabled = config('sendinblue.api_enabled');
        $this->apiKey = config('sendinblue.apiKey');
        $this->listIds = config('sendinblue.defaultListIds');
    }

    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function getListIds(): array
    {
        return $this->listIds;
    }

    public function apiIsNotEnabled(): bool
    {
        return ! $this->apiEnabled;
    }

    public function subscribe(string $email, array $attributes = [], array $listIds = [])
    {
        if ($this->apiIsNotEnabled()) {
            return null;
        }
        $apiInstance = new ContactsApi(
            new Client(),
            Configuration::getDefaultConfiguration()->setApiKey('api-key', $this->getApiKey())
        );
        $createContact = new CreateContact();
        $createContact['email'] = $email;
        $createContact['listIds'] = empty($listIds) ? $this->getListIds() : $listIds;
        $createContact['updateEnabled'] = true;
        if (! empty($attributes)) {
            $createContact['attributes'] = $attributes;
        }

        try {
            return $apiInstance->createContact($createContact);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function unsubscribe(string $email)
    {
        if ($this->apiIsNotEnabled()) {
            return null;
        }

        $apiInstance = new ContactsApi(
            new Client(),
            Configuration::getDefaultConfiguration()->setApiKey('api-key', $this->getApiKey())
        );

        try {
            $apiInstance->deleteContact($email);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
