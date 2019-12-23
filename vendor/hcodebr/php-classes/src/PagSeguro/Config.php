<?php

namespace Hcode\PagSeguro;

class Config {

    const SANDBOX = true;

    const SANDBOX_EMAIL = "olavobachiega@gmail.com";
    const PRODUCTION_EMAIL = "olavobachiega@gmail.com";

    const SANDBOX_TOKEN = "8AD82EBF03E949ABBF8A2793D6CC5761";
    const PRODUCTION_TOKEN = "c0c4c8d3-d5c9-46e6-a74a-3c555a0ecedf1fb74cff4104b202dae7794d2d73f48be56e-58d5-4d8e-baff-215c98e701aa";

    const SANDBOX_SESSIONS = "https://ws.sandbox.pagseguro.uol.com.br/sessions";
    const PRODUCTION_SESSIONS = "https://ws.pagseguro.uol.com.br/sessions";

    const SANDBOX_URL_JS = "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";
    const PRODUCTION_URL_JS = "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";

    const SANDBOX_URL_TRANSACTION = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions";
    const PRODUCTION_URL_TRANSACTION = "https://ws.pagseguro.uol.com.br/v2/transactions";

    const SANDBOX_URL_NOTIFICATION = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/";
    const PRODUCTION_URL_NOTIFICATION = "https://ws.pagseguro.uol.com.br/v2/transactions/notifications/";

    const MAX_INSTALLMENT_NO_INTEREST = 10;
    const MAX_INSTALLMENT = 10;

    const NOTIFICATION_URL = "http://www.html5dev.com.br/payment/notification";

    public static function getAuthentication():array
    {

        if (Config::SANDBOX === true)
        {

            return [
                "email"=>Config::SANDBOX_EMAIL,
                "token"=>Config::SANDBOX_TOKEN
            ];

        } else {

            return [
                "email"=>Config::PRODUCTION_EMAIL,
                "token"=>Config::PRODUCTION_TOKEN
            ];

        }

    }

    public static function getUrlSessions():string
    {

        return (Config::SANDBOX === true) ? Config::SANDBOX_SESSIONS : Config::PRODUCTION_SESSIONS;
        
    }

    public static function getUrlJS()
    {

        return (Config::SANDBOX === true) ? Config::SANDBOX_URL_JS : Config::PRODUCTION_URL_JS;

    }

    public static function getUrlTransaction()
    {

        return (Config::SANDBOX === true) ? Config::SANDBOX_URL_TRANSACTION : Config::PRODUCTION_URL_TRANSACTION;

    }

    public static function getNotificationTransactionURL()
    {

        return (Config::SANDBOX === true) ? Config::SANDBOX_URL_NOTIFICATION : Config::PRODUCTION_URL_NOTIFICATION;

    }

}

?>