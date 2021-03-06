<?php
$scenario->group('data:test-db,coverage:basic');
$I = new \ApiGuy\ApiClientSteps($scenario);

$expectedResponse = array(
    "node_id" => 4,
    "item_type" => "custom_page",
    "url" => "/test-page-slug/",
    "nav_tree_to_use" => "home",
    "attributes" => array(
        "composition_type" => "presentation",
        "icon_url" => null,
        "heading" => "Test heading",
        "subheading" => null,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
        "caption" => "Test caption",
        "composition" => array(
            "data" => array(
                array(
                    "type" => "heading",
                    "data" => array(
                        "text" => "Test heading"
                    ),
                ),
                array(
                    "type" => "text",
                    "data" => array(
                        "text" => "Test text"
                    ),
                ),
                array(
                    "type" => "quote",
                    "data" => array(
                        "cite" => "Test credit",
                        "text" => "> Test quote"
                    ),
                ),
                array(
                    "type" => "download_links",
                    "data" => array(
                       "download_links" => array(
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
                            )
                       )
                    ),
                ),
                array(
                    "type" => "image",
                    "data" => array(
                        "message" => "File",
                        "file" => array(
                            "url" => "http://192.168.99.100:11111/files-api/p3media/file/image?id=8&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                            "p3_media_id" => "8"
                        )
                    ),
                ),
                array(
                    "type" => "video",
                    "data" => array(
                        "source" => "youtube",
                        "remote_id" => "BkSO9pOVpRM"
                    ),
                ),
                array(
                    "type" => "slideshare",
                    "data" => array(
                        "remote_id" => "42241898"
                    ),
                )
            )
        )
    ),
    "root_page" => array(
        "node_id" => 4,
        "item_type" => "custom_page",
        "menu_label" => "Test page",
        "url" => "/test-page-slug/",
        "children" => array(
            array(
                "node_id" => 5,
                "item_type" => "custom_page",
                "menu_label" => "Test page 2",
                "url" => null,
                "children" => array()
            )
        )
    ),
    "contributors" => array(),
    "related" => array(
        array(
            "node_id" => 7,
            "item_type" => "go_item",
            "url" => null,
            "attributes" => array(
            "composition_type" => "presentation",
                "heading" => "Test heading 2",
                "subheading" => null,
                "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption" => "Test caption 2",
                "slug" => "test-go-item-slug-2",
                "thumb" => array(
                "original" => "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444" => "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96" => "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66" => "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg"
                )
            )
        )
    ),
    "groups" => array(
        "GapminderOrg"
    ),
    "home_navigation_tree" => array(
        "data" => array(
            array(
                "type" => "navigation_tree_item",
                "data" => array(
                    "node_id" => 16,
                    "item_type" => "navigation_tree_item",
                    "attributes" => array(
                        "ref" => "home",
                        "about" => "This is the root item of general home tree.",
                        "menu_label" => "Home",
                        "heading" => "Home",
                        "subheading" => "Gapminder.org - Start Here",
                        "url" => "/friends",
                        "icon_url" => "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                    ),
                    "children" => array(
                        array(
                            "type" => "navigation_tree_item",
                            "data" => array(
                                "node_id" => 17,
                                "item_type" => "navigation_tree_item",
                                "attributes" => array(
                                    "ref" => "health",
                                    "about" => "This tree item links to the main gapminder health page",
                                    "menu_label" => "Health",
                                    "heading" => "Health",
                                    "subheading" => "About health",
                                    "url" => null,
                                    "icon_url" => "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                ),
                                "children" => array(
                                    array(
                                        "type" => "navigation_tree_item",
                                        "data" => array(
                                            "node_id" => 18,
                                            "item_type" => "navigation_tree_item",
                                            "attributes" => array(
                                                "ref" => "ebola",
                                                "about" => "Most people need more money to lead a good life.",
                                                "menu_label" => "Ebola",
                                                "heading" => "Ebola",
                                                "subheading" => "Read more about ebola",
                                                "url" => "/ebola",
                                                "icon_url" => "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                            ),
                                            "children" => array()
                                        )
                                    )
                                )
                            )
                        ),
                        array(
                            "type" => "navigation_tree_item",
                            "data" => array(
                                "node_id" => 19,
                                "item_type" => "navigation_tree_item",
                                "attributes" => array(
                                    "ref" => "exercises",
                                    "about" => "This tree item links to the main starting page for exercises",
                                    "menu_label" => "Exercises",
                                    "heading" => "Exercises",
                                    "subheading" => "For teachers and tutors",
                                    "url" => "/exercises",
                                    "icon_url" => "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                ),
                                "children" => array()
                            )
                        )
                    )
                )
            )
        )
    ),
    "footer_navigation_tree_1" => array(
        "data" => array(
            array(
                "type" => "navigation_tree_item",
                "data" => array(
                    "node_id" => 21,
                    "item_type" => "navigation_tree_item",
                    "attributes" => array(
                        "ref" => "world",
                        "about" => null,
                        "menu_label" => "Gapminder World",
                        "heading" => "Gapminder World",
                        "subheading" => null,
                        "url" => "/world",
                        "icon_url" => "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                    ),
                    "children" => array()
                )
            ),
            array(
                "type" => "navigation_tree_item",
                "data" => array(
                    "node_id" => 22,
                    "item_type" => "navigation_tree_item",
                    "attributes" => array(
                        "ref" => "for-teachers",
                        "about" => null,
                        "menu_label" => "For teachers",
                        "heading" => "For teachers",
                        "subheading" => null,
                        "url" => "/for-teachers",
                        "icon_url" => "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                    ),
                    "children" => array()
                )
            )
        )
    ),
    "footer_navigation_tree_2" => array(
        "data" => array(
            array(
                "type" => "navigation_tree_item",
                "data" => array(
                    "node_id" => 24,
                    "item_type" => "navigation_tree_item",
                    "attributes" => array(
                        "ref" => "about",
                        "about" => "about",
                        "menu_label" => "About",
                        "heading" => "About",
                        "subheading" => null,
                        "url" => "/about",
                        "icon_url" => null
                    ),
                    "children" => array()
                )
            ),
            array(
                "type" => "navigation_tree_item",
                "data" => array(
                    "node_id" => 25,
                    "item_type" => "navigation_tree_item",
                    "attributes" => array(
                        "ref" => "help",
                        "about" => null,
                        "menu_label" => "Help",
                        "heading" => "Help",
                        "subheading" => null,
                        "url" => "/help",
                        "icon_url" => "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                    ),
                    "children" => array()
                )
            )
        )
    )
);

$I->wantTo('retrieve custom page items via the REST API as defined in api blueprint');
$I->sendGET('item/4/test/page?_lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

$I->wantTo('retrieve custom page items by route via the barebones php REST API as defined in api blueprint');
$I->sendGET('item/%2Ftest-page-slug%2F/test-by-route/page?_lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

// Same as above but as an authenticated user
$accessToken = $I->authenticateAsTestUser();

$I->wantTo('(authenticated request) retrieve custom page items via the REST API as defined in api blueprint');
$I->amBearerAuthenticated($accessToken);
$I->sendGET('item/4/test/page?_lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);

$I->wantTo('(authenticated request) retrieve custom page items by route via the barebones php REST API as defined in api blueprint');
$I->amBearerAuthenticated($accessToken);
$I->sendGET('item/%2Ftest-page-slug%2F/test-by-route/page?_lang=en');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson($expectedResponse);
