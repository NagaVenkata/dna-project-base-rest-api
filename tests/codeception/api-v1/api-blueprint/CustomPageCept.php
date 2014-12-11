<?php
$scenario->group('data:test-db,coverage:basic');
$I = new ApiGuy($scenario);

$I->wantTo('retrieve custom page items via the REST API as defined in api blueprint');
$I->sendGET('item/1024/test/page');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseEquals('{
    "node_id": 896,
    "item_type": "custom_page",
    "url": null,
    "attributes": {
        "composition_type": "exercise",
        "heading": "Example Page Item",
        "subheading": "This is the subheading.",
        "about": "<h2>Overview</h2>This is an <em>example item</em>.\n<h2>Sidenotes</h2><ul><li>Foo</li><li>Bar</li></ul>",
        "caption": "This is a caption"
    },
    "page_hierarchy": {
        "siblings": [
            {
                "node_id": 34,
                "menu_label": "Short name",
                "caption": "asffd asdfsdsfaasf",
                "url": "/ebola/dashboard/sdfdsf/"
            },
            {
                "node_id": 2324,
                "menu_label": "dfgdfg name",
                "caption": "asffd asdfsdsfaasf ",
                "url": "/ebola/dashboard/fdfgdg/"
            }
        ],
        "children": [
            {
                "node_id": 34,
                "menu_label": "Short name",
                "caption": "asffd asdfsdsfaasf ",
                "url": "/ebola/dashboard/sdfdsf/sdfsdf"
            }
        ],
        "parent_path": [
            {
                "node_id": 1024,
                "menu_label": "Ebola dashboard",
                "caption": "asffd asdfsdsfaasf ",
                "url": "/ebola/dashboard/"
            },
            {
                "node_id": 23434,
                "menu_label": "Short name",
                "caption": "asffd asdfsdsfaasf ",
                "url": "/ebola/"
            }
        ]
    },
    "composition": {
        "data": [
            {
                "type": "about",
                "data": {
                    "renderHere": true
                }
            },
            {
                "type": "video",
                "data": {
                    "source": "youtube",
                    "remote_id": "hcFLFpmc4Pg"
                }
            },
            {
                "type": "text",
                "data": {
                    "text": "Hello, I’m **Sir Trevor**.\nCreate some new blocks and see _what I can do_.\n"
                }
            },
            {
                "type": "html",
                "data": {
                    "src": "<h1>First Paragraph</h1><p>This is a <em>paragraph</em>.</p>"
                }
            },
            {
                "type": "linked_image",
                "data": {
                    "title": "Example Chart",
                    "link_url": "http://example.com/chart.pdf",
                    "message": "File",
                    "file": {
                        "url": "http://172.17.42.1:11111/files-api/p3media/file/image?id=23&preset=sir-trevor-image-block&title=IMG_7932.PNG&extension=.png&lang=en_us",
                        "p3_media_id": "23"
                    }
                }
            },
            {
                "type": "slideshare",
                "data": {
                    "remote_id": "12345678"
                }
            }
        ]
    },
    "contributors": [
        {
            "userId": 1,
            "username": "anna-mia-ekstrom",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "userId": 2,
            "username": "olarosling",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "userId": 3,
            "username": "fredrikwollsen",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "userId": 4,
            "username": "jimipirila",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "userId": 5,
            "username": "arthurcamara",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "userId": 6,
            "username": "amirrahnama",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "userId": 7,
            "username": "fernanda",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "userId": 8,
            "username": "max",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "userId": 9,
            "username": "mariosanchez",
            "thumbnail_url": "http://placehold.it/200x200"
        }
    ],
    "related": [
        {
            "node_id": 357,
            "item_type": "go_item",
            "url": "//www.gapminder.org/exercises/item-1207",
            "attributes": {
                "composition_type": "exercise",
                "heading": "The heading of #1207",
                "subheading": "This is an example item.",
                "about": "The item about text",
                "caption": "a caption",
                "slug": "item-1205",
                "thumb": {
                    "200x120": "http://placehold.it/200x120.png",
                    "400x240": "http://placehold.it/400x240.png",
                    "600x360": "http://placehold.it/400x360.png",
                    "original": "http://placehold.it/original.png"
                }
            }
        }
    ]
}
');
