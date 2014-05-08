<?php

namespace gapminder\envbootstrap;

function setenv($ref, $default = null, $required = false)
{
    $value = getenv($ref);
    if ($value === false) {
        if ($required) {
            throw new \Exception("Environment variable $ref needs to be set. Adjust app configuration and re-build.");
        }
        $value = $default;
    }
    // Treat the strings "true" and "false" as booleans
    if ($value === "true") {
        $value = true;
    }
    if ($value === "false") {
        $value = false;
    }
    define($ref, $value);
}

// ==== Initial environment bootstrap ====

setenv("ENV", $default = null, $required = true);
setenv("DEV", $default = false);
setenv("DEBUG_REDIRECTS", $default = false);
setenv("DEBUG_LOGS", $default = false);
setenv("CONFIG_ENVIRONMENT", $default = 'development', $required = false); // Used in main-local.php and then in index.php to decide which env-*.php configuration file to include
setenv("DATA", $default = 'user-generated', $required = true);

// ==== Identity-related constants ====

setenv("BRAND_SITENAME", $default = null, $required = true);
setenv("BRAND_DOMAIN", $default = null, $required = true);

// ==== Defines infrastructure = all backing services, usernames, api:s, servers, ports etc depending on environment ====

setenv("SMTP_HOST", $default = null);
setenv("SMTP_PORT", $default = null);
setenv("SMTP_TIMEOUT", $default = null);
setenv("SMTP_ENCRYPTION", $default = null);
setenv("SMTP_AUTH_USERNAME", $default = null);
setenv("SMTP_AUTH_PASSWORD", $default = null);

// Support setting main db constants based on DATABASE_URL environment variable
setenv("DATABASE_URL", $default = null, $required = false);
if (DATABASE_URL === null) {
    setenv("YII_DB_SCHEME", $default = 'mysql', $required = false);
    setenv("YII_DB_HOST", $default = null, $required = true);
    setenv("YII_DB_USER", $default = null, $required = true);
    setenv("YII_DB_PASSWORD", $default = null, $required = true);
    setenv("YII_DB_NAME", $default = null, $required = true);
} else {
    // get the environment variable and parse it:
    $url = parse_url(DATABASE_URL);
    define("YII_DB_SCHEME", $url['scheme']);
    define("YII_DB_HOST", $url['host']);
    define("YII_DB_PORT", $url['port']);
    define("YII_DB_USER", $url['user']);
    define("YII_DB_PASSWORD", $url['pass']);
    define("YII_DB_NAME", trim($url['path'], '/'));
}

setenv("YII_GII_PASSWORD", $default = uniqid(), $required = false);

// ==== Define test-related constants ====

setenv("TEST_DB_NAME", $default = YII_DB_NAME . '_test', $required = false);
setenv("TEST_DB_USER", $default = YII_DB_USER . '_test', $required = false);
setenv("TEST_DB_PASSWORD", $default = YII_DB_USER . '_test', $required = false);
setenv("TEST_DB_HOST", $default = YII_DB_HOST, $required = false);

// ==== Define some dependent constants and/or settings ====

// General error reporting level
error_reporting(E_ALL);

if (DEV) {
    if (!defined('YII_DEBUG')) define('YII_DEBUG', true);
    ini_set("display_errors", true);
} else {
    if (!defined('YII_DEBUG')) define('YII_DEBUG', false);
    ini_set("display_errors", false);
}

class Identity
{
    static public function brand()
    {
        $return = new \stdClass();
        $return->siteName = BRAND_SITENAME;
        $return->domain = BRAND_DOMAIN;
        $return->supportEmail = "info@" . $return->domain;
        $return->mailSentByMail = "noreply@" . $return->domain;
        $return->mailSentByName = $return->siteName;
    }
}


