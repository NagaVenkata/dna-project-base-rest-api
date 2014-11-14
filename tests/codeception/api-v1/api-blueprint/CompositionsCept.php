<?php
$scenario->group('data:clean-db,coverage:basic');
$I = new ApiGuy($scenario);
$I->wantTo('retrieve composition items via the REST API as defined in api blueprint');

$I->sendGET('item/1024/test/composition');
$I->seeResponseCodeIs(200);
//$I->seeResponseIsJson();
$I->seeResponseEquals('{
    "node_id": 1024,
    "heading": "Example Composition Item",
    "subheading": "This is the subheading.",
    "about": "<h2>Overview</h2>This is an <em>example item</em>.\n<h2>Sidenotes</h2><ul><li>Foo</li><li>Bar</li></ul>",
    "item_type": "composition",
    "id": 1,
    "permalink": "example-item",
    "composition_type": "exercise",
    "composition": {
        "data": [
            {
                "type": "about",
                "data": {
                    "render_here": true
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
                "type": "item",
                "data": {
                    "node_id": 34,
                    "item_type": "video_file",
                    "attributes": {
                        "title": "Example Video",
                        "about": "This is an example video.",
                        "id": 1
                    }
                },
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
                "type": "download_links",
                "data": {
                    "title": "Multiple Download Links",
                    "links": [
                        {
                            "title": "PDF File",
                            "url": "http://example.com/example.pdf"
                        },
                        {
                            "title": "Animated GIF",
                            "url": "http://example.com/example.gif"
                        }
                    ]
                }
            },
            {
                "type": "linked_image",
                "data": {
                    "title": "Example Chart",
                    "image_url": "http://placehold.it/640x480",
                    "link_url": "http://example.com/chart.pdf"
                }
            },
            {
                "type": "slideshare",
                "data": {
                    "remote_id": "5896443"
                }
            },
            {
                "type": "item",
                "data": {
                    "node_id": 48,
                    "item_type": "slideshow",
                    "attributes": {
                        "title": "Example Slideshow",
                        "about": "This is an example slideshow.",
                        "id": 1
                    }
                },
            }
        ]
    },
    "contributors": [
        {
            "user_id": 1,
            "username": "anna-mia-ekstrom",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 2,
            "username": "olarosling",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 3,
            "username": "fredrikwollsen",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 4,
            "username": "jimipirila",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 5,
            "username": "arthurcamara",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 6,
            "username": "amirrahnama",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 7,
            "username": "fernanda",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 8,
            "username": "max",
            "thumbnail_url": "http://placehold.it/200x200"
        },
        {
            "user_id": 9,
            "username": "mariosanchez",
            "thumbnail_url": "http://placehold.it/200x200"
        }
    ],
    "related": [
        {
            "node_id": 34,
            "item_type": "composition",
            "id": 2,
            "heading": "Related Item #1",
            "subheading": "This is an example item.",
            "thumb": "http://placehold.it/200x120",
            "caption": "a caption wohoo",
            "slug": "related-item-1",
            "composition_type": "exercise"
        }
    ]
}
');
