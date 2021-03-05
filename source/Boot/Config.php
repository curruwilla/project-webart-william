<?php
/**
 * DATABASE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "webart");

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "http://localhost/webart/projeto");
define("CONF_URL_TEST", "http://localhost/webart/projeto");
define("CONF_PATH", __DIR__ . "/../../");
define("INCLUDE_PATH", "themes/web");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * SITE
 */
define("CONF_SITE_NAME", "Projeto");
define("CONF_SITE_TITLE", "web.art");
define("CONF_SITE_DESC", "Descricao do site");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "webart.com.br");
define("CONF_SITE_ADDR_STREET", "Rua Geny Lisboa");
define("CONF_SITE_ADDR_NUMBER", "390");
define("CONF_SITE_ADDR_COMPLEMENT", "Casa");
define("CONF_SITE_ADDR_CITY", "Sao jose do rio preto");
define("CONF_SITE_ADDR_STATE", "SP");
define("CONF_SITE_ADDR_ZIPCODE", "15086-160");

/**
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", "@creator");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "@creator");
define("CONF_SOCIAL_FACEBOOK_APP", "5555555555");
define("CONF_SOCIAL_FACEBOOK_PAGE", "pagename");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "author");
define("CONF_SOCIAL_GOOGLE_PAGE", "5555555555");
define("CONF_SOCIAL_GOOGLE_AUTHOR", "5555555555");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "insta");
define("CONF_SOCIAL_YOUTUBE_PAGE", "youtube");