<?php
$scenario->group('data:test-db,coverage:basic');
$I = new ApiGuy($scenario);

$I->wantTo('retrieve composition items via the REST API as defined in api blueprint');
$I->sendGET('item/6/test/composition');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array(
    "node_id" => 6,
    "item_type" => "go_item",
    "url" => null,
    "attributes" => array(
        "composition_type" => "qna",
        "heading" => "Test heading",
        "subheading" => null,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
        "caption" => "Test caption",
        "slug" => "test-go-item-slug",
        "thumb" => array(
            "original" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=video.png&extension=.jpeg&lang=en",
            "735x444" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=video.png&extension=.jpg&lang=en",
            "160x96" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=video.png&extension=.jpg&lang=en",
            "110x66" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=video.png&extension=.jpg&lang=en"
        ),
        "composition" => array(
            "data" => array(
                array(
                    "type" => "heading",
                    "data" => array(
                        "text" => "Test heading"
                    )
                ),
                array(
                    "type" => "text",
                    "data" => array(
                        "text" => "Test text"
                    )
                ),
                array(
                    "type" => "quote",
                    "data" => array(
                        "cite" => "Test credit",
                        "text" => "> Test quote"
                    )
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
                                        "url" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=7&preset=original&title=Gapminder-World-2012.pdf&extension=.pdf&lang=en"
                                    )
                                )
                            )
                        )
                    )
                ),
                array(
                    "type" => "image",
                    "data" => array(
                        "message" => "File",
                        "file" => array(
                            "url" => "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=video.png&extension=.jpeg&lang=en_us",
                            "p3_media_id" => "10"
                        )
                    )
                ),
                array(
                    "type" => "slideshare",
                    "data" => array(
                        "remote_id" => "42268387"
                    )
                ),
                array(
                    "type" => "video",
                    "data" => array(
                        "source" => "youtube",
                        "remote_id" => "BkSO9pOVpRM"
                    )
                )
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
                    "original" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=original-public&title=video.png&extension=.jpeg&lang=en",
                    "735x444" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=735x444&title=video.png&extension=.jpg&lang=en",
                    "160x96" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=160x96&title=video.png&extension=.jpg&lang=en",
                    "110x66" => "http://172.17.42.1:11111/files-api/p3media/file/image?id=10&preset=110x66&title=video.png&extension=.jpg&lang=en"
                )
            )
        )
    )
));