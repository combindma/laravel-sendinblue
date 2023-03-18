<?php

it('can test if config file are set', function () {
    expect($this->sendinblue->getApiKey())->toBe('sendinblue-api-key')
    ->and($this->sendinblue->getListIds())->toBe([1])
    ->and($this->sendinblue->getBaseUri())->toBe('https://api.sendinblue.com/v3')
    ->and($this->sendinblue->apiIsNotEnabled())->toBeFalse();
});
