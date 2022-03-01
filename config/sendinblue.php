<?php

return [
    /*
   * Enable or disable Sendinblue. Useful for local development when running tests.
   */
    'api_enabled' => env('SENDINBLUE_ENABLED', false),

    /*
     * The API key of a Sendinblue account.
     */
    'apiKey' => env('SENDINBLUE_APIKEY'),

    /*
     * The default Ids of the lists to add the contact to when no listIds has been specified in a method.
     */
    'defaultListIds' => [
        2,
    ]
];
