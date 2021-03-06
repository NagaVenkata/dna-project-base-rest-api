<?php
$scenario->group('data:test-db,coverage:basic');
$I = new \ApiGuy\ApiClientSteps($scenario);

// todo: missing tests for video file translations in composition.

$expectedUntranslatedResponse = array(
    "node_id" => 6,
    "item_type" => "go_item",
    "url" => "/answers/test-go-item-slug/",
    "url_translations" => array(
        "en" => "/en/6",
        "ar" => "/ar/6",
        "bg" => "/bg/6",
        "ca" => "/ca/6",
        "cs" => "/cs/6",
        "da" => "/da/6",
        "de" => "/de/6",
        "en_gb" => "/en-gb/6",
        "en_us" => "/en-us/6",
        "el" => "/el/6",
        "es" => "/es/6",
        "fa" => "/fa/6",
        "fi" => "/fi/6",
        "fil" => "/fil/6",
        "fr" => "/fr/6",
        "he" => "/he/6",
        "hi" => "/hi/6",
        "hr" => "/hr/6",
        "hu" => "/hu/6",
        "id" => "/id/6",
        "it" => "/it/6",
        "ja" => "/ja/6",
        "ko" => "/ko/6",
        "lt" => "/lt/6",
        "lv" => "/lv/6",
        "nl" => "/nl/6",
        "no" => "/no/6",
        "pl" => "/pl/6",
        "pt" => "/pt/6",
        "pt_br" => "/pt-br/6",
        "pt_pt" => "/pt-pt/6",
        "ro" => "/ro/6",
        "ru" => "/ru/6",
        "sk" => "/sk/6",
        "sl" => "/sl/6",
        "sr" => "/sr/6",
        "sv" => "/sv/6",
        "th" => "/th/6",
        "tr" => "/tr/6",
        "uk" => "/uk/6",
        "vi" => "/vi/6",
        "zh" => "/zh/6",
        "zh_cn" => "/zh-cn/6",
        "zh_tw" => "/zh-tw/6"
    ),
    "source_language" => "en",
    "requested_translation_language" => "es",
    "attributes" => array(
        "heading" => "Test heading",
        "subheading" => null,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
        "caption" => "Test caption",
        "composition" => array(
            "data" => [
                array(
                    "type" => "heading",
                    "data" => array(
                    "text" => "Test heading"
                    ),
                    "id" => "25cefe3f2d19b4784368c2f0ec4ee123"
                ),
                array(
                    "type" => "text",
                    "data" => array(
                    "text" => "Test text\n"
                    ),
                    "id" => "3f6652553ac1cfd59c2d544202213945"
                ),
                array(
                    "type" => "quote",
                    "data" => array(
                    "cite" => "Test credit",
                        "text" => "> Test quote"
                    ),
                    "id" => "1db0bcb68d798b40ebaaca2e42737be2"
                ),
                array(
                    "type" => "download_links",
                    "data" => array(
                    "download_links" => [
                            array(
                                "type" => "download_link",
                                "data" => array(
                                "node_id" => 3,
                                    "item_type" => "download_link",
                                    "attributes" => array(
                                    "title" => "Gapminder World 2012",
                                        "url" => "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                    ),
                                    "labels" => array(
                                    "title" => "Title"
                                    )
                                ),
                                "id" => "c6165892b571041826b6562311eebf48"
                            )
                        ]
                    ),
                    "id" => "a6c6ff85dc6716fe5d3e6498d542829d"
                ),
                array(
                    "type" => "image",
                    "data" => array(
                    "message" => "File",
                        "file" => array(
                        "url" => "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                            "p3_media_id" => "10"
                        )
                    ),
                    "id" => "7ac27a63a5ef487c8e54334989c98b41"
                ),
                array(
                    "type" => "slideshare",
                    "data" => array(
                    "remote_id" => "42268387"
                    ),
                    "id" => "a57ca60762865d426d73904a18ab8e4b"
                ),
                array(
                    "type" => "video",
                    "data" => array(
                    "source" => "youtube",
                        "remote_id" => "BkSO9pOVpRM"
                    ),
                    "id" => "f78b6d53bdf075b1f95a397010915c03"
                ),
                array(
                    "type" => "item_list",
                    "data" => array(
                    "node_id" => 9,
                        "item_type" => "item_list",
                        "attributes" => [],
                        "labels" => []
                    ),
                    "id" => "f9b53e29ed861e483ce6642a07baa8ce"
                ),
                array(
                    "type" => "item_list",
                    "data" => array(
                    "node_id" => 10,
                        "item_type" => "item_list",
                        "attributes" => [],
                        "labels" => []
                    ),
                    "id" => "65821809c8b31557b57344abe34a7224"
                ),
                array(
                    "type" => "visualization",
                    "data" => array(
                    "node_id" => 12,
                        "item_type" => "visualization",
                        "attributes" => [],
                        "labels" => []
                    ),
                    "id" => "d27605ace311f6d81d26ac184c74ef95"
                ),
                array(
                    "type" => "slideshow_file",
                    "data" => array(
                    "node_id" => 14,
                        "item_type" => "slideshow_file",
                        "attributes" => array(
                            "google_docs_id" => "abc",
                        ),
                        "labels" => array(
                            "google_docs_id" => "Google Docs Id"
                        )
                    ),
                    "id" => "b3a06fa50ff950daed8b2448c94efc2e"
                )
            ]
        )
    ),
    "translations" => array(
        "heading" => "Test heading",
        "subheading" => null,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
        "caption" => "Test caption",
        "composition" => array(
            "data" => [
                array(
                    "type" => "heading",
                    "data" => array(
                    "text" => "Test heading"
                    ),
                    "id" => "25cefe3f2d19b4784368c2f0ec4ee123",
                    "progress" => 0
                ),
                array(
                    "type" => "text",
                    "data" => array(
                    "text" => "Test text\n"
                    ),
                    "id" => "3f6652553ac1cfd59c2d544202213945",
                    "progress" => 0
                ),
                array(
                    "type" => "quote",
                    "data" => array(
                    "cite" => "Test credit",
                        "text" => "> Test quote"
                    ),
                    "id" => "1db0bcb68d798b40ebaaca2e42737be2",
                    "progress" => 0
                ),
                array(
                    "type" => "download_links",
                    "data" => array(
                    "download_links" => [
                            array(
                                "type" => "download_link",
                                "data" => array(
                                "node_id" => 3,
                                    "item_type" => "download_link",
                                    "attributes" => array(
                                    "title" => "Gapminder World 2012",
                                        "url" => "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                    )
                                ),
                                "id" => "c6165892b571041826b6562311eebf48",
                                "progress" => 0
                            )
                        ]
                    ),
                    "id" => "a6c6ff85dc6716fe5d3e6498d542829d",
                    "progress" => 0
                ),
                array(
                    "type" => "image",
                    "data" => array(
                    "message" => "File",
                        "file" => array(
                        "url" => "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                            "p3_media_id" => "10"
                        )
                    ),
                    "id" => "7ac27a63a5ef487c8e54334989c98b41",
                    "progress" => 0
                ),
                array(
                    "type" => "slideshare",
                    "data" => array(
                    "remote_id" => "42268387"
                    ),
                    "id" => "a57ca60762865d426d73904a18ab8e4b",
                    "progress" => 0
                ),
                array(
                    "type" => "video",
                    "data" => array(
                    "source" => "youtube",
                        "remote_id" => "BkSO9pOVpRM"
                    ),
                    "id" => "f78b6d53bdf075b1f95a397010915c03",
                    "progress" => 0
                ),
                array(
                    "type" => "item_list",
                    "data" => array(
                    "node_id" => 9,
                        "item_type" => "item_list",
                        "attributes" => []
                    ),
                    "id" => "f9b53e29ed861e483ce6642a07baa8ce",
                    "progress" => 0
                ),
                array(
                    "type" => "item_list",
                    "data" => array(
                    "node_id" => 10,
                        "item_type" => "item_list",
                        "attributes" => []
                    ),
                    "id" => "65821809c8b31557b57344abe34a7224",
                    "progress" => 0
                ),
                array(
                    "type" => "visualization",
                    "data" => array(
                    "node_id" => 12,
                        "item_type" => "visualization",
                        "attributes" => []
                    ),
                    "id" => "d27605ace311f6d81d26ac184c74ef95",
                    "progress" => 0
                ),
                array(
                    "type" => "slideshow_file",
                    "data" => array(
                    "node_id" => 14,
                        "item_type" => "slideshow_file",
                        "attributes" => array(
                            "google_docs_id" => "abc",
                        )
                    ),
                    "id" => "b3a06fa50ff950daed8b2448c94efc2e",
                    "progress" => 0
                )
            ]
        )
    ),
    "labels" => array(
        "heading" => "Heading",
        "subheading" => "Subheading",
        "about" => "About",
        "caption" => "Caption"
    )
);

$expectedTranslatedResponse = array(
    "node_id" => 6,
    "item_type" => "go_item",
    "url" => "/answers/test-go-item-slug/",
    "url_translations" => array(
        "en" => "/en/6",
        "ar" => "/ar/6",
        "bg" => "/bg/6",
        "ca" => "/ca/6",
        "cs" => "/cs/6",
        "da" => "/da/6",
        "de" => "/de/6",
        "en_gb" => "/en-gb/6",
        "en_us" => "/en-us/6",
        "el" => "/el/6",
        "es" => "/es/6",
        "fa" => "/fa/6",
        "fi" => "/fi/6",
        "fil" => "/fil/6",
        "fr" => "/fr/6",
        "he" => "/he/6",
        "hi" => "/hi/6",
        "hr" => "/hr/6",
        "hu" => "/hu/6",
        "id" => "/id/6",
        "it" => "/it/6",
        "ja" => "/ja/6",
        "ko" => "/ko/6",
        "lt" => "/lt/6",
        "lv" => "/lv/6",
        "nl" => "/nl/6",
        "no" => "/no/6",
        "pl" => "/pl/6",
        "pt" => "/pt/6",
        "pt_br" => "/pt-br/6",
        "pt_pt" => "/pt-pt/6",
        "ro" => "/ro/6",
        "ru" => "/ru/6",
        "sk" => "/sk/6",
        "sl" => "/sl/6",
        "sr" => "/sr/6",
        "sv" => "/sv/6",
        "th" => "/th/6",
        "tr" => "/tr/6",
        "uk" => "/uk/6",
        "vi" => "/vi/6",
        "zh" => "/zh/6",
        "zh_cn" => "/zh-cn/6",
        "zh_tw" => "/zh-tw/6"
    ),
    "source_language" => "en",
    "requested_translation_language" => "es",
    "attributes" => array(
        "heading" => "Test heading",
        "subheading" => null,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
        "caption" => "Test caption",
        "composition" => array(
            "data" => [
                array(
                    "type" => "heading",
                    "data" => array(
                    "text" => "Test heading"
                    ),
                    "id" => "25cefe3f2d19b4784368c2f0ec4ee123"
                ),
                array(
                    "type" => "text",
                    "data" => array(
                    "text" => "Test text\n"
                    ),
                    "id" => "3f6652553ac1cfd59c2d544202213945"
                ),
                array(
                    "type" => "quote",
                    "data" => array(
                    "cite" => "Test credit",
                        "text" => "> Test quote"
                    ),
                    "id" => "1db0bcb68d798b40ebaaca2e42737be2"
                ),
                array(
                    "type" => "download_links",
                    "data" => array(
                    "download_links" => [
                            array(
                                "type" => "download_link",
                                "data" => array(
                                "node_id" => 3,
                                    "item_type" => "download_link",
                                    "attributes" => array(
                                    "title" => "Gapminder World 2012",
                                        "url" => "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                    ),
                                    "labels" => array(
                                    "title" => "Title"
                                    )
                                ),
                                "id" => "c6165892b571041826b6562311eebf48"
                            )
                        ]
                    ),
                    "id" => "a6c6ff85dc6716fe5d3e6498d542829d"
                ),
                array(
                    "type" => "image",
                    "data" => array(
                    "message" => "File",
                        "file" => array(
                        "url" => "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                            "p3_media_id" => "10"
                        )
                    ),
                    "id" => "7ac27a63a5ef487c8e54334989c98b41"
                ),
                array(
                    "type" => "slideshare",
                    "data" => array(
                    "remote_id" => "42268387"
                    ),
                    "id" => "a57ca60762865d426d73904a18ab8e4b"
                ),
                array(
                    "type" => "video",
                    "data" => array(
                    "source" => "youtube",
                        "remote_id" => "BkSO9pOVpRM"
                    ),
                    "id" => "f78b6d53bdf075b1f95a397010915c03"
                ),
                array(
                    "type" => "item_list",
                    "data" => array(
                    "node_id" => 9,
                        "item_type" => "item_list",
                        "attributes" => [],
                        "labels" => []
                    ),
                    "id" => "f9b53e29ed861e483ce6642a07baa8ce"
                ),
                array(
                    "type" => "item_list",
                    "data" => array(
                    "node_id" => 10,
                        "item_type" => "item_list",
                        "attributes" => [],
                        "labels" => []
                    ),
                    "id" => "65821809c8b31557b57344abe34a7224"
                ),
                array(
                    "type" => "visualization",
                    "data" => array(
                    "node_id" => 12,
                        "item_type" => "visualization",
                        "attributes" => [],
                        "labels" => []
                    ),
                    "id" => "d27605ace311f6d81d26ac184c74ef95"
                ),
                array(
                    "type" => "slideshow_file",
                    "data" => array(
                    "node_id" => 14,
                        "item_type" => "slideshow_file",
                        "attributes" => array(
                            "google_docs_id" => "abc",
                        ),
                        "labels" => array(
                            "google_docs_id" => "Google Docs Id"
                        )
                    ),
                    "id" => "b3a06fa50ff950daed8b2448c94efc2e"
                )
            ]
        )
    ),
    "translations" => array(
        "heading" => "ES Test heading",
        "subheading" => null,
        "about" => "ES Test about",
        "caption" => "ES Test caption",
        "composition" => array(
            "data" => [
                array(
                    "type" => "heading",
                    "data" => array(
                    "text" => "ES Test heading"
                    ),
                    "id" => "25cefe3f2d19b4784368c2f0ec4ee123",
                    "progress" => 100
                ),
                array(
                    "type" => "text",
                    "data" => array(
                    "text" => "ES Test text\n"
                    ),
                    "id" => "3f6652553ac1cfd59c2d544202213945",
                    "progress" => 100
                ),
                array(
                    "type" => "quote",
                    "data" => array(
                    "cite" => "ES Test credit",
                        "text" => "> ES Test quote"
                    ),
                    "id" => "1db0bcb68d798b40ebaaca2e42737be2",
                    "progress" => 100
                ),
                array(
                    "type" => "download_links",
                    "data" => array(
                    "download_links" => [
                            array(
                                "type" => "download_link",
                                "data" => array(
                                "node_id" => 3,
                                    "item_type" => "download_link",
                                    "attributes" => array(
                                    "title" => "ES Gapminder World 2012",
                                        "url" => "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                    )
                                ),
                                "id" => "c6165892b571041826b6562311eebf48",
                                "progress" => 100
                            )
                        ]
                    ),
                    "id" => "a6c6ff85dc6716fe5d3e6498d542829d",
                    "progress" => 0
                ),
                array(
                    "type" => "image",
                    "data" => array(
                    "message" => "File",
                        "file" => array(
                        "url" => "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                            "p3_media_id" => "10"
                        )
                    ),
                    "id" => "7ac27a63a5ef487c8e54334989c98b41",
                    "progress" => 0
                ),
                array(
                    "type" => "slideshare",
                    "data" => array(
                    "remote_id" => "42268387"
                    ),
                    "id" => "a57ca60762865d426d73904a18ab8e4b",
                    "progress" => 0
                ),
                array(
                    "type" => "video",
                    "data" => array(
                    "source" => "youtube",
                        "remote_id" => "BkSO9pOVpRM"
                    ),
                    "id" => "f78b6d53bdf075b1f95a397010915c03",
                    "progress" => 0
                ),
                array(
                    "type" => "item_list",
                    "data" => array(
                    "node_id" => 9,
                        "item_type" => "item_list",
                        "attributes" => []
                    ),
                    "id" => "f9b53e29ed861e483ce6642a07baa8ce",
                    "progress" => 0
                ),
                array(
                    "type" => "item_list",
                    "data" => array(
                    "node_id" => 10,
                        "item_type" => "item_list",
                        "attributes" => []
                    ),
                    "id" => "65821809c8b31557b57344abe34a7224",
                    "progress" => 0
                ),
                array(
                    "type" => "visualization",
                    "data" => array(
                    "node_id" => 12,
                        "item_type" => "visualization",
                        "attributes" => []
                    ),
                    "id" => "d27605ace311f6d81d26ac184c74ef95",
                    "progress" => 0
                ),
                array(
                    "type" => "slideshow_file",
                    "data" => array(
                    "node_id" => 14,
                        "item_type" => "slideshow_file",
                        "attributes" => array(
                            "google_docs_id" => "1ZhsSrEwD1Rg9shDinj5RWzbK4GmBBNAgmJhyMGUBRl4",
                        )
                    ),
                    "id" => "b3a06fa50ff950daed8b2448c94efc2e",
                    "progress" => 100
                )
            ]
        )
    ),
    "labels" => array(
        "heading" => "Heading",
        "subheading" => "Subheading",
        "about" => "About",
        "caption" => "Caption"
    )
);

$I->wantTo('retrieve go item translations via the REST API as defined in api blueprint');
$I->sendGET('translation/6/test/composition?_lang=es');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedUntranslatedResponse);

$accessToken = $I->authenticateAsTestUser();

$I->wantTo('(authenticated request) save go item translations via the REST API as defined in api blueprint');
$I->amBearerAuthenticated($accessToken);
$I->sendPUT('translation/6/test/composition?_lang=es', array(
    "node_id" => 6,
    "item_type" => "go_item",
    "url" => "/answers/test-go-item-slug/",
    "translations" => array(
        "heading" => "ES Test heading",
        "subheading" => null,
        "about" => "ES Test about",
        "caption" => "ES Test caption",
        "composition" => array(
        "data" => [
                array(
                    "type" => "heading",
                    "data" => array(
                    "text" => "ES Test heading"
                    ),
                    "id" => "25cefe3f2d19b4784368c2f0ec4ee123",
                ),
                array(
                    "type" => "text",
                    "data" => array(
                    "text" => "ES Test text\n"
                    ),
                    "id" => "3f6652553ac1cfd59c2d544202213945",
                ),
                array(
                    "type" => "quote",
                    "data" => array(
                    "cite" => "ES Test credit",
                        "text" => "> ES Test quote"
                    ),
                    "id" => "1db0bcb68d798b40ebaaca2e42737be2",
                ),
                array(
                    "type" => "download_links",
                    "data" => array(
                    "download_links" => [
                            array(
                                "type" => "download_link",
                                "data" => array(
                                "node_id" => 3,
                                    "item_type" => "download_link",
                                    "attributes" => array(
                                    "title" => "ES Gapminder World 2012",
                                        "url" => "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                    )
                                ),
                                "id" => "c6165892b571041826b6562311eebf48",
                            )
                        ]
                    ),
                    "id" => "a6c6ff85dc6716fe5d3e6498d542829d",
                ),
                array(
                    "type" => "slideshow_file",
                    "data" => array(
                        "node_id" => 14,
                        "item_type" => "slideshow_file",
                        "attributes" => array(
                            "google_docs_id" => "1ZhsSrEwD1Rg9shDinj5RWzbK4GmBBNAgmJhyMGUBRl4",
                        )
                    ),
                    "id" => "b3a06fa50ff950daed8b2448c94efc2e",
                )
            ]
        )
    ),
    "labels" => array(
    "heading" => "Heading",
        "subheading" => "Subheading",
        "about" => "About",
        "caption" => "Caption"
    )
));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedTranslatedResponse);
