FORMAT: 1A
HOST: http://develop-cms.gapminder.org/api/v2

# Gapminder

# Group User
User related resources

## Login [/user/login]
### Authenticates a user [POST]
+ Request (application/json)

        {
            "grant_type": "password",
            "client_id": "TestClient",
            "username": "admin",
            "password": "admin"
        }

+ Response 200 (application/json)

        {
            "access_token": "03807cb390319329bdf6c777d4dfae9c0d3b3c35",
            "token_type": "bearer",
            "expires_in": 3600,
            "scope":null
        }

## Authentication [/user/authenticate]
### Uses the authentication header to check whether the user is authenticated [POST]
+ Request

    + Headers

                Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35

+ Response 200

## Public profile [/user/{accountId}/profile]

### Returns the users public profile [GET]

The profile is only returned if it is marked as "published", e.g. public.

+ Request

    + Headers

            Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35

+ Response 200 (application/json)

        {
            "first_name": "Test",
            "last_name": "User",
            "email": "testuser@example.com",
            "social_links": [ ],
            "may_contact": true,
            "professional_title": {
                "data": [
                    {
                        "type": "text",
                        "data": {
                            "text": "I'm a professional"
                        }
                    }
                ]
            },
            "lives_in": "Uganda",
            "language1": "en",
            "language2": "sv",
            "language3": "fi",
            "about_me": {
                "data": [
                    {
                        "type": "text",
                        "data": {
                        "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                        }
                    }
                ]
            },
            "my_links": {
                "data": [
                    {
                        "type": "text",
                        "data": {
                            "text": "http://gapminder.com"
                        }
                    }
                ]
            },
            "contributions": [ ],
            "profile_picture": "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
            "groups": [
                {
                    "id": 16,
                    "name": "Translators",
                    "member_label": "Member",
                    "roles": [
                        "GroupTranslator"
                    ]
                },
                {
                    "id": 17,
                    "name": "Reviewers",
                    "member_label": "Member",
                    "roles": [
                        "GroupReviewer"
                    ]
                },
                {
                    "id": 1,
                    "name": "GapminderOrg",
                    "member_label": "Member",
                    "roles": [
                        "GroupTranslator",
                        "GroupReviewer"
                    ]
                },
                {
                    "id": 15,
                    "name": "SneakPeeks",
                    "member_label": "Member",
                    "roles": [
                        "GroupMember"
                    ]
                }
            ]
        }

## Profile [/user/profile]
### Returns the authenticated users profile [GET]
+ Request (application/json)

    + Headers

            Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35

+ Response 200 (application/json)

        {
            "first_name": "Test",
            "last_name": "User",
            "email": "testuser@example.com",
            "social_links": [ ],
            "may_contact": true,
            "professional_title": {
                "data": [
                    {
                        "type": "text",
                        "data": {
                            "text": "I'm a professional"
                        }
                    }
                ]
            },
            "lives_in": "Uganda",
            "language1": "en",
            "language2": "sv",
            "language3": "fi",
            "about_me": {
                "data": [
                    {
                        "type": "text",
                        "data": {
                        "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                        }
                    }
                ]
            },
            "my_links": {
                "data": [
                    {
                        "type": "text",
                        "data": {
                            "text": "http://gapminder.com"
                        }
                    }
                ]
            },
            "contributions": [ ],
            "profile_picture": "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
            "groups": [
                {
                    "id": 16,
                    "name": "Translators",
                    "member_label": "Member",
                    "roles": [
                        "GroupTranslator"
                    ]
                },
                {
                    "id": 17,
                    "name": "Reviewers",
                    "member_label": "Member",
                    "roles": [
                        "GroupReviewer"
                    ]
                },
                {
                    "id": 1,
                    "name": "GapminderOrg",
                    "member_label": "Member",
                    "roles": [
                        "GroupTranslator",
                        "GroupReviewer"
                    ]
                },
                {
                    "id": 15,
                    "name": "SneakPeeks",
                    "member_label": "Member",
                    "roles": [
                        "GroupMember"
                    ]
                }
            ]
        }

### Saves the authenticated users profile [PUT]
+ Request (application/json)

    + Headers

            Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35

    + Body

            {
                "first_name": "Anna-Mia",
                "last_name": "Ekström",
                "email": "user@example.com",
                "social_links": [
                    {
                        "id": "1",
                        "name": "LinkedIn",
                        "url": "http://linkedin.com"
                    },
                    {
                        "id": "2",
                        "name": "Twitter",
                        "url": "http://twitter.com"
                    },
                    {
                        "name": "Facebook",
                        "url": "http://facebook.com"
                    }
                ],
                "may_contact": true,
                "professional_title": {"data": [
                    {"type": "list", "data": {"text": " - Filmmaker\n - Filmtator\n - Whattookyousolong.org\n"}}
                ]},
                "lives_in": "Stockholm, Sweden",
                "language1": "sv",
                "language2": null,
                "language3": null,
                "about_me": {"data": [
                    {"type": "text", "data": {"text": "I contribute to the Dollar Street project lorem ipsum. I contribute to the Dollar Street project lorem ipsum. I contribute to the Dollar Street project lorem ipsum. I contribute to the Dollar Street project lorem ipsum. I contribute to the Dollar Street project lorem ipsum. I contribute to the Dollar Street project lorem ipsum.\n"}},
                    {"type": "text", "data": {"text": "Cambiae bid scriptum libro. Dolores veci!\n"}}
                ]},
                "my_links": {"data": [
                    {"type": "heading", "data": {"text": "Here is my video"}},
                    {"type": "video", "data": {"source": "youtube", "remote_id": "w33hPL4tdNg"}},
                    {"type": "text", "data": {"text": "[www.gapminder.org](http://www.gapminder.org)"}},
                    {"type": "heading", "data": {"text": "My other project"}},
                    {"type": "text", "data": {"text": "[www.example.com](http://www.example.com)"}}
                ]}
            }

+ Response 200

## Info [/user/info]
### Returns the authenticated users user-info [GET]
+ Request (application/json)

    + Headers

            Authorization: Bearer 03807cb390319329bdf6c777d4dfae9c0d3b3c35

+ Response 200 (application/json)

        {
            "id": 25,
            "username": "bob",
            "email": "bob@example.com"
        }


# Group VideoFile
Video file related resources

## VideoFile collection [/videoFile]
### List all video files [GET]
+ Response 200 (application/json)

        [
            {
                "node_id": 1,
                "item_type": "video_file",
                "url": null,
                "attributes": {
                    "title": "Will saving poor children lead to overpopulation?",
                    "about": "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.",
                    "caption": "No. Its the opposite.",
                    "slug": "will-saving-poor-children-lead-to-overpopulation",
                    "url_mp4": "http://web/files-api/p3media/file/image?id=2&preset=original-public-mp4&title=media&extension=.mp4",
                    "url_webm": "http://web/files-api/p3media/file/image?id=1&preset=original-public-webm&title=media&extension=.webm",
                    "url_youtube": null,
                    "url_subtitles": "http://web/api/v1/videoFile/subtitles/1?lang=en",
                    "thumb": {
                        "original": "http://web/files-api/p3media/file/image?id=5&preset=original-public&title=media&extension=.jpeg",
                        "735x444": "http://web/files-api/p3media/file/image?id=5&preset=735x444&title=media&extension=.jpg",
                        "160x96": "http://web/files-api/p3media/file/image?id=5&preset=160x96&title=media&extension=.jpg",
                        "110x66": "http://web/files-api/p3media/file/image?id=5&preset=110x66&title=media&extension=.jpg",
                        "130x77": "http://web/files-api/p3media/file/image?id=5&preset=130x77&title=media&extension=.jpg",
                        "180x108": "http://web/files-api/p3media/file/image?id=5&preset=180x108&title=media&extension=.jpg",
                        "735x444-retina": "http://web/files-api/p3media/file/image?id=5&preset=735x444-retina&title=media&extension=.jpg",
                        "160x96-retina": "http://web/files-api/p3media/file/image?id=5&preset=160x96-retina&title=media&extension=.jpg",
                        "110x66-retina": "http://web/files-api/p3media/file/image?id=5&preset=110x66-retina&title=media&extension=.jpg",
                        "130x77-retina": "http://web/files-api/p3media/file/image?id=5&preset=130x77-retina&title=media&extension=.jpg",
                        "180x108-retina": "http://web/files-api/p3media/file/image?id=5&preset=180x108-retina&title=media&extension=.jpg"
                    }
                },
                "related": [ ]
            },
            {
                "node_id": 2,
                "item_type": "video_file",
                "url": null,
                "attributes": {
                    "title": "Are income and lifespan related?",
                    "about": "In this video Hans talks about how income and lifespan are related to each other.",
                    "caption": null,
                    "slug": "are-income-and-lifespan-related",
                    "url_mp4": "http://web/files-api/p3media/file/image?id=4&preset=original-public-mp4&title=media&extension=.mp4",
                    "url_webm": "http://web/files-api/p3media/file/image?id=3&preset=original-public-webm&title=media&extension=.webm",
                    "url_youtube": null,
                    "url_subtitles": "http://web/api/v1/videoFile/subtitles/2?lang=en",
                    "thumb": {
                        "original": "http://web/files-api/p3media/file/image?id=6&preset=original-public&title=media&extension=.jpeg",
                        "735x444": "http://web/files-api/p3media/file/image?id=6&preset=735x444&title=media&extension=.jpg",
                        "160x96": "http://web/files-api/p3media/file/image?id=6&preset=160x96&title=media&extension=.jpg",
                        "110x66": "http://web/files-api/p3media/file/image?id=6&preset=110x66&title=media&extension=.jpg",
                        "130x77": "http://web/files-api/p3media/file/image?id=6&preset=130x77&title=media&extension=.jpg",
                        "180x108": "http://web/files-api/p3media/file/image?id=6&preset=180x108&title=media&extension=.jpg",
                        "735x444-retina": "http://web/files-api/p3media/file/image?id=6&preset=735x444-retina&title=media&extension=.jpg",
                        "160x96-retina": "http://web/files-api/p3media/file/image?id=6&preset=160x96-retina&title=media&extension=.jpg",
                        "110x66-retina": "http://web/files-api/p3media/file/image?id=6&preset=110x66-retina&title=media&extension=.jpg",
                        "130x77-retina": "http://web/files-api/p3media/file/image?id=6&preset=130x77-retina&title=media&extension=.jpg",
                        "180x108-retina": "http://web/files-api/p3media/file/image?id=6&preset=180x108-retina&title=media&extension=.jpg"
                    }
                },
                "related": [ ]
            }
        ]

## VideoFile [/videoFile/{id}]

+ Parameters

    + id (string|int) ... the id or slug of the video file resource

### Get a video file [GET]
+ Response 200 (application/json)

        {
            "node_id": 1,
            "item_type": "video_file",
            "url": null,
            "attributes": {
                "title": "Will saving poor children lead to overpopulation?",
                "about": "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.",
                "caption": "No. Its the opposite.",
                "slug": "will-saving-poor-children-lead-to-overpopulation",
                "url_mp4": "http://web/files-api/p3media/file/image?id=2&preset=original-public-mp4&title=media&extension=.mp4",
                "url_webm": "http://web/files-api/p3media/file/image?id=1&preset=original-public-webm&title=media&extension=.webm",
                "url_youtube": null,
                "url_subtitles": "http://web/api/v1/videoFile/subtitles/1?lang=en",
                "thumb": {
                    "original": "http://web/files-api/p3media/file/image?id=5&preset=original-public&title=media&extension=.jpeg",
                    "735x444": "http://web/files-api/p3media/file/image?id=5&preset=735x444&title=media&extension=.jpg",
                    "160x96": "http://web/files-api/p3media/file/image?id=5&preset=160x96&title=media&extension=.jpg",
                    "110x66": "http://web/files-api/p3media/file/image?id=5&preset=110x66&title=media&extension=.jpg",
                    "130x77": "http://web/files-api/p3media/file/image?id=5&preset=130x77&title=media&extension=.jpg",
                    "180x108": "http://web/files-api/p3media/file/image?id=5&preset=180x108&title=media&extension=.jpg",
                    "735x444-retina": "http://web/files-api/p3media/file/image?id=5&preset=735x444-retina&title=media&extension=.jpg",
                    "160x96-retina": "http://web/files-api/p3media/file/image?id=5&preset=160x96-retina&title=media&extension=.jpg",
                    "110x66-retina": "http://web/files-api/p3media/file/image?id=5&preset=110x66-retina&title=media&extension=.jpg",
                    "130x77-retina": "http://web/files-api/p3media/file/image?id=5&preset=130x77-retina&title=media&extension=.jpg",
                    "180x108-retina": "http://web/files-api/p3media/file/image?id=5&preset=180x108-retina&title=media&extension=.jpg"
                }
            },
            "related": [ ]
        }

## VideoFile subtitles [/videoFile/subtitles/{id}]

+ Parameters

    + id (int) ... the id of the video file resource

### Get video file subtitles [GET]

+ Response 200 (text/html)

        1
        00:00:03,399 --> 00:00:10,800
        A common misunderstanding is that if we save all the poor children: the world will become overpopulated.

        2
        00:00:10,800 --> 00:00:13,599
        This may sound logical, but it's wrong.

        3
        00:00:13,599 --> 00:00:16,199
        Its the other way around!

        4
        00:00:16,199 --> 00:00:22,000
        Saving the poor childrens lives is required to end population growth.

        5
        00:00:22,000 --> 00:00:24,699
        Now! Look at the UN numbers.

        6
        00:00:24,699 --> 00:00:30,199
        Poor parents on avarage have five children. And one dies.

        7
        00:00:30,199 --> 00:00:36,100
        Look! Two parents are replaced by four surviving children in the next generation.

        8
        00:00:36,100 --> 00:00:39,600
        This means the population is growing very fast among the poorest.

        9
        00:00:39,600 --> 00:00:46,200
        This is the avarage family in the worst of places like Congo and Afghanistan.

        10
        00:00:46,200 --> 00:00:55,399
        Today, where child mortality is highest, that's where the population is growing faster than anywhere else.

        11
        00:00:55,399 --> 00:00:57,700
        How many people live like this?

        12
        00:00:57,700 --> 00:01:03,899
        There are seven billion people in the world. One block: one billion.

        13
        00:01:03,899 --> 00:01:07,400
        The poorest two billion...

        14
        00:01:07,400 --> 00:01:08,799
        ...they live like this.

        15
        00:01:08,799 --> 00:01:11,500
        The other five billion...

        16
        00:01:13,799 --> 00:01:20,900
        ...they have this avarage family. Two parents having two children and there are few child deaths.

        17
        00:01:20,900 --> 00:01:25,000
        This is the majority of the world population, not only Europe and the US.

        18
        00:01:25,000 --> 00:01:32,293
        It's throughout religions and cultures: China, Iran, Mexico, large cities in Africa.

        19
        00:01:32,293 --> 00:01:38,199
        Today in most populations children just replace parents.

        20
        00:01:38,199 --> 00:01:42,099
        And the size of generations are no longer increasing.

        21
        00:01:42,099 --> 00:01:46,700
        This means: the population will stop growing.

        22
        00:01:46,700 --> 00:01:51,500
        How did so many people end up with small families?

        23
        00:01:51,500 --> 00:01:54,700
        Well,  their children stopped dying.

        24
        00:01:54,700 --> 00:02:00,500
        As they left extreme poverty and girls got education: parents no longer had to

        25
        00:02:00,500 --> 00:02:06,500
        compensate for child death by having many babies. And a large family stopped being

        26
        00:02:06,500 --> 00:02:09,199
        an economic necessity or a social status symbol.

        27
        00:02:09,199 --> 00:02:15,000
        And with modern contraceptives: parents across the world, the majority

        28
        00:02:15,000 --> 00:02:18,000
        decided to have a small family.

        29
        00:02:18,000 --> 00:02:26,000
        So by saving the lives of poor children and helping the last two billion out of poverty:

        30
        00:02:26,000 --> 00:02:33,199
        These parents will also decide to have fewer children.

        31
        00:02:33,199 --> 00:02:37,199
        And fewer.

        32
        00:02:37,199 --> 00:02:39,099
        Eventually...

        33
        00:02:39,099 --> 00:02:43,000
        ...reaching the two child family

        34
        00:02:43,000 --> 00:02:48,400
        That showed the UN family size forcast up to the end of the century.

        35
        00:02:48,400 --> 00:02:52,900
        Then the world population is expected to stop growing.

        36
        00:02:52,900 --> 00:03:01,599
        Before it stops: another four billion people will be added to the world population.

        37
        00:03:01,599 --> 00:03:06,400
        Four billion more. That's a lot of people!

        38
        00:03:06,400 --> 00:03:15,300
        But the longer poor children keeps dying and this change is delayed:

        39
        00:03:15,300 --> 00:03:20,699
        the more billions will be added.

        40
        00:03:20,699 --> 00:03:28,099
        So ending population growth starts by saving the poorest children.

# Group Language
Language related resources

## List of supported languages [/language]

### Get languages [GET]
+ Response 200 (application/json)

        {
            "en": {
                "name": "English",
                "direction": "ltr"
            },
            "ar": {
                "name": "العربية",
                "direction": "rtl"
            },
            "bg": {
                "name": "Български",
                "direction": "ltr"
            },
            "ca": {
                "name": "Català",
                "direction": "ltr"
            },
            "cs": {
                "name": "Čeština",
                "direction": "ltr"
            },
            "da": {
                "name": "Dansk",
                "direction": "ltr"
            },
            "de": {
                "name": "Deutsch",
                "direction": "ltr"
            },
            "en_gb": {
                "name": "UK English",
                "direction": "ltr"
            },
            "en_us": {
                "name": "US English",
                "direction": "ltr"
            },
            "el": {
                "name": "Ελληνικά",
                "direction": "ltr"
            },
            "es": {
                "name": "Español",
                "direction": "ltr"
            },
            "fa": {
                "name": "فارسی",
                "direction": "rtl"
            },
            "fi": {
                "name": "Suomi",
                "direction": "ltr"
            },
            "fil": {
                "name": "Filipino",
                "direction": "ltr"
            },
            "fr": {
                "name": "Français",
                "direction": "ltr"
            },
            "he": {
                "name": "עברית",
                "direction": "rtl"
            },
            "hi": {
                "name": "हिंदी",
                "direction": "ltr"
            },
            "hr": {
                "name": "Hrvatski",
                "direction": "ltr"
            },
            "hu": {
                "name": "Magyar",
                "direction": "ltr"
            },
            "id": {
                "name": "Bahasa Indonesia",
                "direction": "ltr"
            },
            "it": {
                "name": "Italiano",
                "direction": "ltr"
            },
            "ja": {
                "name": "日本語",
                "direction": "ltr"
            },
            "ko": {
                "name": "한국어",
                "direction": "ltr"
            },
            "lt": {
                "name": "Lietuvių",
                "direction": "ltr"
            },
            "lv": {
                "name": "Latviešu valoda",
                "direction": "ltr"
            },
            "nl": {
                "name": "Nederlands",
                "direction": "ltr"
            },
            "no": {
                "name": "Norsk",
                "direction": "ltr"
            },
            "pl": {
                "name": "Polski",
                "direction": "ltr"
            },
            "pt": {
                "name": "Português",
                "direction": "ltr"
            },
            "pt_br": {
                "name": "Português (Brasil)",
                "direction": "ltr"
            },
            "pt_pt": {
                "name": "Português (Portugal)",
                "direction": "ltr"
            },
            "ro": {
                "name": "Română",
                "direction": "ltr"
            },
            "ru": {
                "name": "Русский",
                "direction": "ltr"
            },
            "sk": {
                "name": "Slovenský",
                "direction": "ltr"
            },
            "sl": {
                "name": "Slovenščina",
                "direction": "ltr"
            },
            "sr": {
                "name": "Српски",
                "direction": "ltr"
            },
            "sv": {
                "name": "Svenska",
                "direction": "ltr"
            },
            "th": {
                "name": "ไทย",
                "direction": "ltr"
            },
            "tr": {
                "name": "Türkçe",
                "direction": "ltr"
            },
            "uk": {
                "name": "Українська",
                "direction": "ltr"
            },
            "vi": {
                "name": "Tiếng Việt",
                "direction": "ltr"
            },
            "zh": {
                "name": "中文",
                "direction": "ltr"
            },
            "zh_cn": {
                "name": "中文 (简体)",
                "direction": "ltr"
            },
            "zh_tw": {
                "name": "中文 (繁體)",
                "direction": "ltr"
            }
        }

# Group Items

+ Trait Composable ... For items composed using *Sir Trevor*

    Implies that the the item has a JSON structured created by *Sir Trevor*

    + Properties
        + composition_type = "exercise" (string) ... the composition type is a string that hints about how it should be rendered
        + data = `[]` (json) ... consists of one or more *Sir Trevor* blocks. In order to render the primary visual element on the *Go* page, the individual blocks will be evaluated differently. For example, a YouTube video will be rendered as the main element if it is the first block in the item data array and if the item type in question is a *QnA* item. The *about* block type is a placeholder indicating that the about property should be rendered in its place, and thus content creators get more granular control over block order.


## Item [/item/{node_id}]

+ Parameters

    + node_id (string) ... the node ID of the item (note: currently it will only work if the item is an item in the composition table)

### Get an item [GET]

+ Traits

    + [Composable][]

+ Response 200 (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "url_translations": {
                "en": "/en/6",
                "ar": "/ar/6",
                "bg": "/bg/6",
                "ca": "/ca/6",
                "cs": "/cs/6",
                "da": "/da/6",
                "de": "/de/6",
                "en_gb": "/en-gb/6",
                "en_us": "/en-us/6",
                "el": "/el/6",
                "es": "/es/6",
                "fa": "/fa/6",
                "fi": "/fi/6",
                "fil": "/fil/6",
                "fr": "/fr/6",
                "he": "/he/6",
                "hi": "/hi/6",
                "hr": "/hr/6",
                "hu": "/hu/6",
                "id": "/id/6",
                "it": "/it/6",
                "ja": "/ja/6",
                "ko": "/ko/6",
                "lt": "/lt/6",
                "lv": "/lv/6",
                "nl": "/nl/6",
                "no": "/no/6",
                "pl": "/pl/6",
                "pt": "/pt/6",
                "pt_br": "/pt-br/6",
                "pt_pt": "/pt-pt/6",
                "ro": "/ro/6",
                "ru": "/ru/6",
                "sk": "/sk/6",
                "sl": "/sl/6",
                "sr": "/sr/6",
                "sv": "/sv/6",
                "th": "/th/6",
                "tr": "/tr/6",
                "uk": "/uk/6",
                "vi": "/vi/6",
                "zh": "/zh/6",
                "zh_cn": "/zh-cn/6",
                "zh_tw": "/zh-tw/6"
            },
            "source_language": "en",
            "requested_translation_language": null,
            "attributes": {
                "composition_type": "qna",
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "slug": "test-go-item-slug",
                "thumb": {
                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                },
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            }
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text\n"
                            }
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            }
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        }
                                    }
                                ]
                            }
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            }
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            }
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            }
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "composition",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "node_id": 6,
                                            "item_type": "go_item",
                                            "url": "/answers/test-go-item-slug/",
                                            "attributes": {
                                                "composition_type": "qna",
                                                "heading": "Test heading",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption",
                                                "slug": "test-go-item-slug",
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                                                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                                                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                                                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                                                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                                                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                                                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                                                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                                                }
                                            }
                                        },
                                        {
                                            "node_id": 7,
                                            "item_type": "go_item",
                                            "url": null,
                                            "attributes": {
                                                "composition_type": "presentation",
                                                "heading": "Test heading 2",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption 2",
                                                "slug": "test-go-item-slug-2",
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                                                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                                                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                                                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                                                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                                                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                                                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                                                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                                                }
                                            }
                                        }
                                    ]
                                }
                            }
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "profile",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "first_name": "Test",
                                            "last_name": "User",
                                            "email": "testuser@example.com",
                                            "social_links": [],
                                            "may_contact": true,
                                            "professional_title": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "I'm a professional"
                                                        }
                                                    }
                                                ]
                                            },
                                            "lives_in": "Uganda",
                                            "language1": "en",
                                            "language2": "sv",
                                            "language3": "fi",
                                            "about_me": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                                                        }
                                                    }
                                                ]
                                            },
                                            "my_links": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "http://gapminder.com"
                                                        }
                                                    }
                                                ]
                                            },
                                            "contributions": [],
                                            "profile_picture": "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
                                            "groups": [
                                                {
                                                    "id": 16,
                                                    "name": "Translators",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator"
                                                    ]
                                                },
                                                {
                                                    "id": 17,
                                                    "name": "Reviewers",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 1,
                                                    "name": "GapminderOrg",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator",
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 15,
                                                    "name": "SneakPeeks",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupMember"
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                }
                            }
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": {
                                    "state": {
                                        "time": {
                                            "start": 1990,
                                            "end": 2012,
                                            "value": 1995,
                                            "step": 1,
                                            "speed": 300,
                                            "formatInput": "%Y"
                                        },
                                        "entities": {
                                            "show": {
                                                "dim": "geo",
                                                "filter": {
                                                    "geo": [
                                                        "swe",
                                                        "nor",
                                                        "fin",
                                                        "bra",
                                                        "usa",
                                                        "chn",
                                                        "jpn",
                                                        "zaf",
                                                        "ind",
                                                        "ago"
                                                    ],
                                                    "geo.category": [
                                                        "country"
                                                    ]
                                                }
                                            }
                                        },
                                        "marker": {
                                            "hook_to": [
                                                "entities",
                                                "time",
                                                "data",
                                                "language"
                                            ],
                                            "type": "geometry",
                                            "shape": "circle",
                                            "label": {
                                                "hook": "property",
                                                "value": "geo.name"
                                            },
                                            "axis_y": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "scale": "linear"
                                            },
                                            "axis_x": {
                                                "hook": "indicator",
                                                "value": "gdp_per_cap",
                                                "scale": "linear",
                                                "unit": 100
                                            },
                                            "size": {
                                                "hook": "indicator",
                                                "value": "pop",
                                                "scale": "log"
                                            },
                                            "color": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "domain": [
                                                    "#F77481",
                                                    "#E1CE00",
                                                    "#B4DE79"
                                                ]
                                            }
                                        }
                                    },
                                    "title": "Test visualization",
                                    "tool": {
                                        "ref": "test-tool",
                                        "title": "Test Tool",
                                        "slug": "test-tool",
                                        "about": null,
                                        "language": {
                                            "id": "en",
                                            "strings": {
                                                "en": {
                                                    "title": "Test visualization",
                                                    "buttons/find": "Find",
                                                    "buttons/colors": "Colors",
                                                    "buttons/size": "Size",
                                                    "buttons/more_options": "Options",
                                                    "indicator/lex": "Life expectancy",
                                                    "indicator/gdp_per_cap": "GDP per capita",
                                                    "indicator/pop": "Population",
                                                    "indicator/geo.region": "Region",
                                                    "indicator/geo": "Geo code",
                                                    "indicator/time": "Time",
                                                    "indicator/geo.category": "Geo category"
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc",
                                    "slideshare_id": null
                                }
                            }
                        }
                    ]
                }
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": "test-go-item-slug-2",
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                            "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                            "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                            "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                            "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                            "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                            "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                            "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

+ Response 200 (application/json)

        {
            "node_id": 4,
            "item_type": "custom_page",
            "url": "/test-page-slug/",
            "url_translations": {
                "en": "/en/4",
                "ar": "/ar/4",
                "bg": "/bg/4",
                "ca": "/ca/4",
                "cs": "/cs/4",
                "da": "/da/4",
                "de": "/de/4",
                "en_gb": "/en-gb/4",
                "en_us": "/en-us/4",
                "el": "/el/4",
                "es": "/es/4",
                "fa": "/fa/4",
                "fi": "/fi/4",
                "fil": "/fil/4",
                "fr": "/fr/4",
                "he": "/he/4",
                "hi": "/hi/4",
                "hr": "/hr/4",
                "hu": "/hu/4",
                "id": "/id/4",
                "it": "/it/4",
                "ja": "/ja/4",
                "ko": "/ko/4",
                "lt": "/lt/4",
                "lv": "/lv/4",
                "nl": "/nl/4",
                "no": "/no/4",
                "pl": "/pl/4",
                "pt": "/pt/4",
                "pt_br": "/pt-br/4",
                "pt_pt": "/pt-pt/4",
                "ro": "/ro/4",
                "ru": "/ru/4",
                "sk": "/sk/4",
                "sl": "/sl/4",
                "sr": "/sr/4",
                "sv": "/sv/4",
                "th": "/th/4",
                "tr": "/tr/4",
                "uk": "/uk/4",
                "vi": "/vi/4",
                "zh": "/zh/4",
                "zh_cn": "/zh-cn/4",
                "zh_tw": "/zh-tw/4"
            },
            "source_language": "en",
            "requested_translation_language": null,
            "nav_tree_to_use": "home",
            "attributes": {
                "composition_type": "presentation",
                "icon_url": null,
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
                "caption": "Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text"
                            },
                            "id": "ebd8341ac4f233251d1e7bd91f918e8b"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=8&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "8"
                                }
                            },
                            "id": "74582504d5ec5e4ad1cf1836ca10e41e"
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03"
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42241898"
                            },
                            "id": "6e9923bf3a72248641143fc02eb1a23b"
                        }
                    ]
                }
            },
           "root_page": {
                "data": [
                    {
                        "type": "custom_page",
                        "data": {
                            "node_id": 4,
                            "item_type": "custom_page",
                            "attributes": {
                                "ref": null,
                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
                                "menu_label": "Test page",
                                "heading": "Test heading",
                                "subheading": null,
                                "url": "/test-page-slug/",
                                "icon_url": null
                            },
                            "children": [
                                {
                                    "type": "custom_page",
                                    "data": {
                                        "node_id": 5,
                                        "item_type": "custom_page",
                                        "attributes": {
                                            "ref": null,
                                            "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
                                            "menu_label": "Test page 2",
                                            "heading": "Test heading 2",
                                            "subheading": null,
                                            "url": null,
                                            "icon_url": null
                                        },
                                        "children": [ ]
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": "test-go-item-slug-2",
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                            "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                            "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                            "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                            "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                            "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                            "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                            "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

## Composition [/item/{node_id}/test/composition]

+ Parameters

    + node_id (string) ... the node ID of the item (note: currently it will only work if the item is an item in the composition table)

### Get a composition item for testing [GET]

This endpoint is for testing purposes only and will not be available in the real API.
It is a workaround for not being able to choose the response when multiple are defined per request when testing the API format.

+ Response 200 (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "url_translations": {
                "en": "/en/6",
                "ar": "/ar/6",
                "bg": "/bg/6",
                "ca": "/ca/6",
                "cs": "/cs/6",
                "da": "/da/6",
                "de": "/de/6",
                "en_gb": "/en-gb/6",
                "en_us": "/en-us/6",
                "el": "/el/6",
                "es": "/es/6",
                "fa": "/fa/6",
                "fi": "/fi/6",
                "fil": "/fil/6",
                "fr": "/fr/6",
                "he": "/he/6",
                "hi": "/hi/6",
                "hr": "/hr/6",
                "hu": "/hu/6",
                "id": "/id/6",
                "it": "/it/6",
                "ja": "/ja/6",
                "ko": "/ko/6",
                "lt": "/lt/6",
                "lv": "/lv/6",
                "nl": "/nl/6",
                "no": "/no/6",
                "pl": "/pl/6",
                "pt": "/pt/6",
                "pt_br": "/pt-br/6",
                "pt_pt": "/pt-pt/6",
                "ro": "/ro/6",
                "ru": "/ru/6",
                "sk": "/sk/6",
                "sl": "/sl/6",
                "sr": "/sr/6",
                "sv": "/sv/6",
                "th": "/th/6",
                "tr": "/tr/6",
                "uk": "/uk/6",
                "vi": "/vi/6",
                "zh": "/zh/6",
                "zh_cn": "/zh-cn/6",
                "zh_tw": "/zh-tw/6"
            },
            "source_language": "en",
            "requested_translation_language": null,
            "attributes": {
                "composition_type": "qna",
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "slug": "test-go-item-slug",
                "thumb": {
                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                },
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text\n"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            },
                            "id": "7ac27a63a5ef487c8e54334989c98b41"
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            },
                            "id": "a57ca60762865d426d73904a18ab8e4b"
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "composition",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "node_id": 6,
                                            "item_type": "go_item",
                                            "url": "/answers/test-go-item-slug/",
                                            "attributes": {
                                                "composition_type": "qna",
                                                "heading": "Test heading",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption",
                                                "slug": "test-go-item-slug",
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                                                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                                                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                                                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                                                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                                                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                                                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                                                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                                                }
                                            }
                                        },
                                        {
                                            "node_id": 7,
                                            "item_type": "go_item",
                                            "url": null,
                                            "attributes": {
                                                "composition_type": "presentation",
                                                "heading": "Test heading 2",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption 2",
                                                "slug": "test-go-item-slug-2",
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                                                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                                                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                                                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                                                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                                                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                                                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                                                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                                                }
                                            }
                                        }
                                    ]
                                }
                            },
                            "id": "f9b53e29ed861e483ce6642a07baa8ce"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "profile",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "first_name": "Test",
                                            "last_name": "User",
                                            "email": "testuser@example.com",
                                            "social_links": [],
                                            "may_contact": true,
                                            "professional_title": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "I'm a professional"
                                                        }
                                                    }
                                                ]
                                            },
                                            "lives_in": "Uganda",
                                            "language1": "en",
                                            "language2": "sv",
                                            "language3": "fi",
                                            "about_me": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                                                        }
                                                    }
                                                ]
                                            },
                                            "my_links": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "http://gapminder.com"
                                                        }
                                                    }
                                                ]
                                            },
                                            "contributions": [],
                                            "profile_picture": "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
                                            "groups": [
                                                {
                                                    "id": 16,
                                                    "name": "Translators",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator"
                                                    ]
                                                },
                                                {
                                                    "id": 17,
                                                    "name": "Reviewers",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 1,
                                                    "name": "GapminderOrg",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator",
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 15,
                                                    "name": "SneakPeeks",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupMember"
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                }
                            },
                            "id": "65821809c8b31557b57344abe34a7224"
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": {
                                    "state": {
                                        "time": {
                                            "start": 1990,
                                            "end": 2012,
                                            "value": 1995,
                                            "step": 1,
                                            "speed": 300,
                                            "formatInput": "%Y"
                                        },
                                        "entities": {
                                            "show": {
                                                "dim": "geo",
                                                "filter": {
                                                    "geo": [
                                                        "swe",
                                                        "nor",
                                                        "fin",
                                                        "bra",
                                                        "usa",
                                                        "chn",
                                                        "jpn",
                                                        "zaf",
                                                        "ind",
                                                        "ago"
                                                    ],
                                                    "geo.category": [
                                                        "country"
                                                    ]
                                                }
                                            }
                                        },
                                        "marker": {
                                            "hook_to": [
                                                "entities",
                                                "time",
                                                "data",
                                                "language"
                                            ],
                                            "type": "geometry",
                                            "shape": "circle",
                                            "label": {
                                                "hook": "property",
                                                "value": "geo.name"
                                            },
                                            "axis_y": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "scale": "linear"
                                            },
                                            "axis_x": {
                                                "hook": "indicator",
                                                "value": "gdp_per_cap",
                                                "scale": "linear",
                                                "unit": 100
                                            },
                                            "size": {
                                                "hook": "indicator",
                                                "value": "pop",
                                                "scale": "log"
                                            },
                                            "color": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "domain": [
                                                    "#F77481",
                                                    "#E1CE00",
                                                    "#B4DE79"
                                                ]
                                            }
                                        }
                                    },
                                    "title": "Test visualization",
                                    "tool": {
                                        "ref": "test-tool",
                                        "title": "Test Tool",
                                        "slug": "test-tool",
                                        "about": null,
                                        "language": {
                                            "id": "en",
                                            "strings": {
                                                "en": {
                                                    "title": "Test visualization",
                                                    "buttons/find": "Find",
                                                    "buttons/colors": "Colors",
                                                    "buttons/size": "Size",
                                                    "buttons/more_options": "Options",
                                                    "indicator/lex": "Life expectancy",
                                                    "indicator/gdp_per_cap": "GDP per capita",
                                                    "indicator/pop": "Population",
                                                    "indicator/geo.region": "Region",
                                                    "indicator/geo": "Geo code",
                                                    "indicator/time": "Time",
                                                    "indicator/geo.category": "Geo category"
                                                }
                                            }
                                        }
                                    }
                                }
                            },
                            "id": "d27605ace311f6d81d26ac184c74ef95"
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc",
                                    "slideshare_id": null
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e"
                        }
                    ]
                }
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": "test-go-item-slug-2",
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                            "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                            "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                            "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                            "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                            "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                            "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                            "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

## Composition Portuguese [/item/{node_id}/test/composition/pt-pt]

+ Parameters

    + node_id (string) ... the node ID of the item (note: currently it will only work if the item is an item in the composition table)

### Get a portuguese composition item for testing [GET]

This endpoint is for testing purposes only and will not be available in the real API.
It is a workaround for not being able to choose the response when multiple are defined per request when testing the API format.

+ Response 200 (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "url_translations": {
                "en": "/en/6",
                "ar": "/ar/6",
                "bg": "/bg/6",
                "ca": "/ca/6",
                "cs": "/cs/6",
                "da": "/da/6",
                "de": "/de/6",
                "en_gb": "/en-gb/6",
                "en_us": "/en-us/6",
                "el": "/el/6",
                "es": "/es/6",
                "fa": "/fa/6",
                "fi": "/fi/6",
                "fil": "/fil/6",
                "fr": "/fr/6",
                "he": "/he/6",
                "hi": "/hi/6",
                "hr": "/hr/6",
                "hu": "/hu/6",
                "id": "/id/6",
                "it": "/it/6",
                "ja": "/ja/6",
                "ko": "/ko/6",
                "lt": "/lt/6",
                "lv": "/lv/6",
                "nl": "/nl/6",
                "no": "/no/6",
                "pl": "/pl/6",
                "pt": "/pt/6",
                "pt_br": "/pt-br/6",
                "pt_pt": "/pt-pt/6",
                "ro": "/ro/6",
                "ru": "/ru/6",
                "sk": "/sk/6",
                "sl": "/sl/6",
                "sr": "/sr/6",
                "sv": "/sv/6",
                "th": "/th/6",
                "tr": "/tr/6",
                "uk": "/uk/6",
                "vi": "/vi/6",
                "zh": "/zh/6",
                "zh_cn": "/zh-cn/6",
                "zh_tw": "/zh-tw/6"
            },
            "source_language": "en",
            "requested_translation_language": "pt_pt",
            "attributes": {
                "composition_type": "qna",
                "heading": "título de teste",
                "subheading": null,
                "about": "om teste",
                "caption": "caption teste",
                "slug": null,
                "thumb": {
                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                },
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "título de teste"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "teste texto"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "teste de crédito",
                                "text": "> Citação de teste"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012 (Portuguese)",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            },
                            "id": "7ac27a63a5ef487c8e54334989c98b41"
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            },
                            "id": "a57ca60762865d426d73904a18ab8e4b"
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "composition",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "node_id": 6,
                                            "item_type": "go_item",
                                            "url": "/answers/test-go-item-slug/",
                                            "attributes": {
                                                "composition_type": "qna",
                                                "heading": "Test heading",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption",
                                                "slug": null,
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                                                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                                                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                                                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                                                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                                                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                                                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                                                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                                                }
                                            }
                                        },
                                        {
                                            "node_id": 7,
                                            "item_type": "go_item",
                                            "url": null,
                                            "attributes": {
                                                "composition_type": "presentation",
                                                "heading": "Test heading 2",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption 2",
                                                "slug": null,
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                                                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                                                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                                                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                                                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                                                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                                                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                                                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                                                }
                                            }
                                        }
                                    ]
                                }
                            },
                            "id": "f9b53e29ed861e483ce6642a07baa8ce"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "profile",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "first_name": "Test",
                                            "last_name": "User",
                                            "email": "testuser@example.com",
                                            "social_links": [],
                                            "may_contact": true,
                                            "professional_title": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "I'm a professional"
                                                        }
                                                    }
                                                ]
                                            },
                                            "lives_in": "Uganda",
                                            "language1": "en",
                                            "language2": "sv",
                                            "language3": "fi",
                                            "about_me": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                                                        }
                                                    }
                                                ]
                                            },
                                            "my_links": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "http://gapminder.com"
                                                        }
                                                    }
                                                ]
                                            },
                                            "contributions": [],
                                            "profile_picture": "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
                                            "groups": [
                                                {
                                                    "id": 16,
                                                    "name": "Translators",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator"
                                                    ]
                                                },
                                                {
                                                    "id": 17,
                                                    "name": "Reviewers",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 1,
                                                    "name": "GapminderOrg",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator",
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 15,
                                                    "name": "SneakPeeks",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupMember"
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                }
                            },
                            "id": "65821809c8b31557b57344abe34a7224"
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": {
                                    "state": {
                                        "time": {
                                            "start": 1990,
                                            "end": 2012,
                                            "value": 1995,
                                            "step": 1,
                                            "speed": 300,
                                            "formatInput": "%Y"
                                        },
                                        "entities": {
                                            "show": {
                                                "dim": "geo",
                                                "filter": {
                                                    "geo": [
                                                        "swe",
                                                        "nor",
                                                        "fin",
                                                        "bra",
                                                        "usa",
                                                        "chn",
                                                        "jpn",
                                                        "zaf",
                                                        "ind",
                                                        "ago"
                                                    ],
                                                    "geo.category": [
                                                        "country"
                                                    ]
                                                }
                                            }
                                        },
                                        "marker": {
                                            "hook_to": [
                                                "entities",
                                                "time",
                                                "data",
                                                "language"
                                            ],
                                            "type": "geometry",
                                            "shape": "circle",
                                            "label": {
                                                "hook": "property",
                                                "value": "geo.name"
                                            },
                                            "axis_y": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "scale": "linear"
                                            },
                                            "axis_x": {
                                                "hook": "indicator",
                                                "value": "gdp_per_cap",
                                                "scale": "linear",
                                                "unit": 100
                                            },
                                            "size": {
                                                "hook": "indicator",
                                                "value": "pop",
                                                "scale": "log"
                                            },
                                            "color": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "domain": [
                                                    "#F77481",
                                                    "#E1CE00",
                                                    "#B4DE79"
                                                ]
                                            }
                                        }
                                    },
                                    "title": "Test visualization",
                                    "tool": {
                                        "ref": "test-tool",
                                        "title": "Test Tool",
                                        "slug": null,
                                        "about": null,
                                        "language": {
                                            "id": "pt_pt",
                                            "strings": {
                                                "pt_pt": {
                                                    "title": "Test visualization",
                                                    "buttons/find": "Find",
                                                    "buttons/colors": "Colors",
                                                    "buttons/size": "Size",
                                                    "buttons/more_options": "Options",
                                                    "indicator/lex": "Life expectancy",
                                                    "indicator/gdp_per_cap": "GDP per capita",
                                                    "indicator/pop": "Population",
                                                    "indicator/geo.region": "Region",
                                                    "indicator/geo": "Geo code",
                                                    "indicator/time": "Time",
                                                    "indicator/geo.category": "Geo category"
                                                }
                                            }
                                        }
                                    }
                                }
                            },
                            "id": "d27605ace311f6d81d26ac184c74ef95"
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc",
                                    "slideshare_id": null
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e"
                        }
                    ]
                }
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": null,
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                            "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                            "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                            "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                            "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                            "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                            "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                            "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

## Page [/item/{node_id}/test/page]

+ Parameters

    + node_id (string) ... the node ID of the item (note: currently it will only work if the item is an item in the composition table)

### Get a page item for testing [GET]

This endpoint is for testing purposes only and will not be available in the real API.
It is a workaround for not being able to choose the response when multiple are defined per request when testing the API format.

+ Response 200 (application/json)

        {
            "node_id": 4,
            "item_type": "custom_page",
            "url": "/test-page-slug/",
            "url_translations": {
                "en": "/en/4",
                "ar": "/ar/4",
                "bg": "/bg/4",
                "ca": "/ca/4",
                "cs": "/cs/4",
                "da": "/da/4",
                "de": "/de/4",
                "en_gb": "/en-gb/4",
                "en_us": "/en-us/4",
                "el": "/el/4",
                "es": "/es/4",
                "fa": "/fa/4",
                "fi": "/fi/4",
                "fil": "/fil/4",
                "fr": "/fr/4",
                "he": "/he/4",
                "hi": "/hi/4",
                "hr": "/hr/4",
                "hu": "/hu/4",
                "id": "/id/4",
                "it": "/it/4",
                "ja": "/ja/4",
                "ko": "/ko/4",
                "lt": "/lt/4",
                "lv": "/lv/4",
                "nl": "/nl/4",
                "no": "/no/4",
                "pl": "/pl/4",
                "pt": "/pt/4",
                "pt_br": "/pt-br/4",
                "pt_pt": "/pt-pt/4",
                "ro": "/ro/4",
                "ru": "/ru/4",
                "sk": "/sk/4",
                "sl": "/sl/4",
                "sr": "/sr/4",
                "sv": "/sv/4",
                "th": "/th/4",
                "tr": "/tr/4",
                "uk": "/uk/4",
                "vi": "/vi/4",
                "zh": "/zh/4",
                "zh_cn": "/zh-cn/4",
                "zh_tw": "/zh-tw/4"
            },
            "source_language": "en",
            "requested_translation_language": null,
            "nav_tree_to_use": "home",
            "attributes": {
                "composition_type": "presentation",
                "icon_url": null,
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
                "caption": "Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text"
                            },
                            "id": "ebd8341ac4f233251d1e7bd91f918e8b"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=8&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "8"
                                }
                            },
                            "id": "74582504d5ec5e4ad1cf1836ca10e41e"
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03"
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42241898"
                            },
                            "id": "6e9923bf3a72248641143fc02eb1a23b"
                        }
                    ]
                }
            },
            "root_page": {
                "data": [
                    {
                        "type": "custom_page",
                        "data": {
                            "node_id": 4,
                            "item_type": "custom_page",
                            "attributes": {
                                "ref": null,
                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
                                "menu_label": "Test page",
                                "heading": "Test heading",
                                "subheading": null,
                                "url": "/test-page-slug/",
                                "icon_url": null
                            },
                            "children": [
                                {
                                    "type": "custom_page",
                                    "data": {
                                        "node_id": 5,
                                        "item_type": "custom_page",
                                        "attributes": {
                                            "ref": null,
                                            "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
                                            "menu_label": "Test page 2",
                                            "heading": "Test heading 2",
                                            "subheading": null,
                                            "url": null,
                                            "icon_url": null
                                        },
                                        "children": [ ]
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": "test-go-item-slug-2",
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                            "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                            "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                            "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                            "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                            "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                            "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                            "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

## Composition [/item/{route}/test-by-route/composition]

### Get a composition item for testing the barebones api override [GET]

This endpoint is included in this api blueprint for testing purposes. It's output should be identical to the corresponding /{node_id}/test/composition endpoint above.

+ Response 200 (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "url_translations": {
                "en": "/en/6",
                "ar": "/ar/6",
                "bg": "/bg/6",
                "ca": "/ca/6",
                "cs": "/cs/6",
                "da": "/da/6",
                "de": "/de/6",
                "en_gb": "/en-gb/6",
                "en_us": "/en-us/6",
                "el": "/el/6",
                "es": "/es/6",
                "fa": "/fa/6",
                "fi": "/fi/6",
                "fil": "/fil/6",
                "fr": "/fr/6",
                "he": "/he/6",
                "hi": "/hi/6",
                "hr": "/hr/6",
                "hu": "/hu/6",
                "id": "/id/6",
                "it": "/it/6",
                "ja": "/ja/6",
                "ko": "/ko/6",
                "lt": "/lt/6",
                "lv": "/lv/6",
                "nl": "/nl/6",
                "no": "/no/6",
                "pl": "/pl/6",
                "pt": "/pt/6",
                "pt_br": "/pt-br/6",
                "pt_pt": "/pt-pt/6",
                "ro": "/ro/6",
                "ru": "/ru/6",
                "sk": "/sk/6",
                "sl": "/sl/6",
                "sr": "/sr/6",
                "sv": "/sv/6",
                "th": "/th/6",
                "tr": "/tr/6",
                "uk": "/uk/6",
                "vi": "/vi/6",
                "zh": "/zh/6",
                "zh_cn": "/zh-cn/6",
                "zh_tw": "/zh-tw/6"
            },
            "source_language": "en",
            "requested_translation_language": null,
            "attributes": {
                "composition_type": "qna",
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "slug": "test-go-item-slug",
                "thumb": {
                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                },
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text\n"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            },
                            "id": "7ac27a63a5ef487c8e54334989c98b41"
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            },
                            "id": "a57ca60762865d426d73904a18ab8e4b"
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "composition",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "node_id": 6,
                                            "item_type": "go_item",
                                            "url": "/answers/test-go-item-slug/",
                                            "attributes": {
                                                "composition_type": "qna",
                                                "heading": "Test heading",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption",
                                                "slug": "test-go-item-slug",
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                                                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                                                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                                                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                                                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                                                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                                                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                                                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                                                }
                                            }
                                        },
                                        {
                                            "node_id": 7,
                                            "item_type": "go_item",
                                            "url": null,
                                            "attributes": {
                                                "composition_type": "presentation",
                                                "heading": "Test heading 2",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption 2",
                                                "slug": "test-go-item-slug-2",
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                                                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                                                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                                                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                                                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                                                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                                                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                                                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                                                }
                                            }
                                        }
                                    ]
                                }
                            },
                            "id": "f9b53e29ed861e483ce6642a07baa8ce"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "profile",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "first_name": "Test",
                                            "last_name": "User",
                                            "email": "testuser@example.com",
                                            "social_links": [],
                                            "may_contact": true,
                                            "professional_title": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "I'm a professional"
                                                        }
                                                    }
                                                ]
                                            },
                                            "lives_in": "Uganda",
                                            "language1": "en",
                                            "language2": "sv",
                                            "language3": "fi",
                                            "about_me": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                                                        }
                                                    }
                                                ]
                                            },
                                            "my_links": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "http://gapminder.com"
                                                        }
                                                    }
                                                ]
                                            },
                                            "contributions": [],
                                            "profile_picture": "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
                                            "groups": [
                                                {
                                                    "id": 16,
                                                    "name": "Translators",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator"
                                                    ]
                                                },
                                                {
                                                    "id": 17,
                                                    "name": "Reviewers",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 1,
                                                    "name": "GapminderOrg",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator",
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 15,
                                                    "name": "SneakPeeks",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupMember"
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                }
                            },
                            "id": "65821809c8b31557b57344abe34a7224"
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": {
                                    "state": {
                                        "time": {
                                            "start": 1990,
                                            "end": 2012,
                                            "value": 1995,
                                            "step": 1,
                                            "speed": 300,
                                            "formatInput": "%Y"
                                        },
                                        "entities": {
                                            "show": {
                                                "dim": "geo",
                                                "filter": {
                                                    "geo": [
                                                        "swe",
                                                        "nor",
                                                        "fin",
                                                        "bra",
                                                        "usa",
                                                        "chn",
                                                        "jpn",
                                                        "zaf",
                                                        "ind",
                                                        "ago"
                                                    ],
                                                    "geo.category": [
                                                        "country"
                                                    ]
                                                }
                                            }
                                        },
                                        "marker": {
                                            "hook_to": [
                                                "entities",
                                                "time",
                                                "data",
                                                "language"
                                            ],
                                            "type": "geometry",
                                            "shape": "circle",
                                            "label": {
                                                "hook": "property",
                                                "value": "geo.name"
                                            },
                                            "axis_y": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "scale": "linear"
                                            },
                                            "axis_x": {
                                                "hook": "indicator",
                                                "value": "gdp_per_cap",
                                                "scale": "linear",
                                                "unit": 100
                                            },
                                            "size": {
                                                "hook": "indicator",
                                                "value": "pop",
                                                "scale": "log"
                                            },
                                            "color": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "domain": [
                                                    "#F77481",
                                                    "#E1CE00",
                                                    "#B4DE79"
                                                ]
                                            }
                                        }
                                    },
                                    "title": "Test visualization",
                                    "tool": {
                                        "ref": "test-tool",
                                        "title": "Test Tool",
                                        "slug": "test-tool",
                                        "about": null,
                                        "language": {
                                            "id": "en",
                                            "strings": {
                                                "en": {
                                                    "title": "Test visualization",
                                                    "buttons/find": "Find",
                                                    "buttons/colors": "Colors",
                                                    "buttons/size": "Size",
                                                    "buttons/more_options": "Options",
                                                    "indicator/lex": "Life expectancy",
                                                    "indicator/gdp_per_cap": "GDP per capita",
                                                    "indicator/pop": "Population",
                                                    "indicator/geo.region": "Region",
                                                    "indicator/geo": "Geo code",
                                                    "indicator/time": "Time",
                                                    "indicator/geo.category": "Geo category"
                                                }
                                            }
                                        }
                                    }
                                }
                            },
                            "id": "d27605ace311f6d81d26ac184c74ef95"
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc",
                                    "slideshare_id": null
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e"
                        }
                    ]
                }
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": "test-go-item-slug-2",
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                            "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                            "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                            "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                            "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                            "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                            "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                            "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

## Composition Portuguese [/item/{route}/test-by-route/composition/pt-pt]

+ Parameters

    + node_id (string) ... the node ID of the item (note: currently it will only work if the item is an item in the composition table)

### Get a portuguese composition item for testing [GET]

This endpoint is for testing purposes only and will not be available in the real API.
It is a workaround for not being able to choose the response when multiple are defined per request when testing the API format.

+ Response 200 (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "url_translations": {
                "en": "/en/6",
                "ar": "/ar/6",
                "bg": "/bg/6",
                "ca": "/ca/6",
                "cs": "/cs/6",
                "da": "/da/6",
                "de": "/de/6",
                "en_gb": "/en-gb/6",
                "en_us": "/en-us/6",
                "el": "/el/6",
                "es": "/es/6",
                "fa": "/fa/6",
                "fi": "/fi/6",
                "fil": "/fil/6",
                "fr": "/fr/6",
                "he": "/he/6",
                "hi": "/hi/6",
                "hr": "/hr/6",
                "hu": "/hu/6",
                "id": "/id/6",
                "it": "/it/6",
                "ja": "/ja/6",
                "ko": "/ko/6",
                "lt": "/lt/6",
                "lv": "/lv/6",
                "nl": "/nl/6",
                "no": "/no/6",
                "pl": "/pl/6",
                "pt": "/pt/6",
                "pt_br": "/pt-br/6",
                "pt_pt": "/pt-pt/6",
                "ro": "/ro/6",
                "ru": "/ru/6",
                "sk": "/sk/6",
                "sl": "/sl/6",
                "sr": "/sr/6",
                "sv": "/sv/6",
                "th": "/th/6",
                "tr": "/tr/6",
                "uk": "/uk/6",
                "vi": "/vi/6",
                "zh": "/zh/6",
                "zh_cn": "/zh-cn/6",
                "zh_tw": "/zh-tw/6"
            },
            "source_language": "en",
            "requested_translation_language": "pt_pt",
            "attributes": {
                "composition_type": "qna",
                "heading": "título de teste",
                "subheading": null,
                "about": "om teste",
                "caption": "caption teste",
                "slug": null,
                "thumb": {
                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                },
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "título de teste"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "teste texto"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "teste de crédito",
                                "text": "> Citação de teste"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012 (Portuguese)",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            },
                            "id": "7ac27a63a5ef487c8e54334989c98b41"
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            },
                            "id": "a57ca60762865d426d73904a18ab8e4b"
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "composition",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "node_id": 6,
                                            "item_type": "go_item",
                                            "url": "/answers/test-go-item-slug/",
                                            "attributes": {
                                                "composition_type": "qna",
                                                "heading": "Test heading",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption",
                                                "slug": null,
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                                                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                                                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                                                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                                                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                                                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                                                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                                                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                                                }
                                            }
                                        },
                                        {
                                            "node_id": 7,
                                            "item_type": "go_item",
                                            "url": null,
                                            "attributes": {
                                                "composition_type": "presentation",
                                                "heading": "Test heading 2",
                                                "subheading": null,
                                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                                                "caption": "Test caption 2",
                                                "slug": null,
                                                "thumb": {
                                                    "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                                                    "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                                                    "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                                                    "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                                                    "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                                                    "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                                                    "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                                                    "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                                                    "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                                                    "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                                                    "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                                                }
                                            }
                                        }
                                    ]
                                }
                            },
                            "id": "f9b53e29ed861e483ce6642a07baa8ce"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": {
                                    "display_extent": "titles-only",
                                    "query": {
                                        "item_type": "profile",
                                        "composition_type": null,
                                        "sort": null,
                                        "pageSize": 0
                                    },
                                    "items": [
                                        {
                                            "first_name": "Test",
                                            "last_name": "User",
                                            "email": "testuser@example.com",
                                            "social_links": [],
                                            "may_contact": true,
                                            "professional_title": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "I'm a professional"
                                                        }
                                                    }
                                                ]
                                            },
                                            "lives_in": "Uganda",
                                            "language1": "en",
                                            "language2": "sv",
                                            "language3": "fi",
                                            "about_me": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper quam sem, sit amet viverra ante mattis imperdiet."
                                                        }
                                                    }
                                                ]
                                            },
                                            "my_links": {
                                                "data": [
                                                    {
                                                        "type": "text",
                                                        "data": {
                                                            "text": "http://gapminder.com"
                                                        }
                                                    }
                                                ]
                                            },
                                            "contributions": [],
                                            "profile_picture": "http://web/files-api/p3media/file/image?id=12&preset=user-profile-picture&title=media&extension=.jpg",
                                            "groups": [
                                                {
                                                    "id": 16,
                                                    "name": "Translators",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator"
                                                    ]
                                                },
                                                {
                                                    "id": 17,
                                                    "name": "Reviewers",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 1,
                                                    "name": "GapminderOrg",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupTranslator",
                                                        "GroupReviewer"
                                                    ]
                                                },
                                                {
                                                    "id": 15,
                                                    "name": "SneakPeeks",
                                                    "member_label": "Member",
                                                    "roles": [
                                                        "GroupMember"
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                }
                            },
                            "id": "65821809c8b31557b57344abe34a7224"
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": {
                                    "state": {
                                        "time": {
                                            "start": 1990,
                                            "end": 2012,
                                            "value": 1995,
                                            "step": 1,
                                            "speed": 300,
                                            "formatInput": "%Y"
                                        },
                                        "entities": {
                                            "show": {
                                                "dim": "geo",
                                                "filter": {
                                                    "geo": [
                                                        "swe",
                                                        "nor",
                                                        "fin",
                                                        "bra",
                                                        "usa",
                                                        "chn",
                                                        "jpn",
                                                        "zaf",
                                                        "ind",
                                                        "ago"
                                                    ],
                                                    "geo.category": [
                                                        "country"
                                                    ]
                                                }
                                            }
                                        },
                                        "marker": {
                                            "hook_to": [
                                                "entities",
                                                "time",
                                                "data",
                                                "language"
                                            ],
                                            "type": "geometry",
                                            "shape": "circle",
                                            "label": {
                                                "hook": "property",
                                                "value": "geo.name"
                                            },
                                            "axis_y": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "scale": "linear"
                                            },
                                            "axis_x": {
                                                "hook": "indicator",
                                                "value": "gdp_per_cap",
                                                "scale": "linear",
                                                "unit": 100
                                            },
                                            "size": {
                                                "hook": "indicator",
                                                "value": "pop",
                                                "scale": "log"
                                            },
                                            "color": {
                                                "hook": "indicator",
                                                "value": "lex",
                                                "domain": [
                                                    "#F77481",
                                                    "#E1CE00",
                                                    "#B4DE79"
                                                ]
                                            }
                                        }
                                    },
                                    "title": "Test visualization",
                                    "tool": {
                                        "ref": "test-tool",
                                        "title": "Test Tool",
                                        "slug": null,
                                        "about": null,
                                        "language": {
                                            "id": "pt_pt",
                                            "strings": {
                                                "pt_pt": {
                                                    "title": "Test visualization",
                                                    "buttons/find": "Find",
                                                    "buttons/colors": "Colors",
                                                    "buttons/size": "Size",
                                                    "buttons/more_options": "Options",
                                                    "indicator/lex": "Life expectancy",
                                                    "indicator/gdp_per_cap": "GDP per capita",
                                                    "indicator/pop": "Population",
                                                    "indicator/geo.region": "Region",
                                                    "indicator/geo": "Geo code",
                                                    "indicator/time": "Time",
                                                    "indicator/geo.category": "Geo category"
                                                }
                                            }
                                        }
                                    }
                                }
                            },
                            "id": "d27605ace311f6d81d26ac184c74ef95"
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc",
                                    "slideshare_id": null
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e"
                        }
                    ]
                }
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": null,
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                            "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                            "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                            "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                            "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                            "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                            "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                            "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

## Page [/item/{route}/test-by-route/page]

### Get a page item by route for testing the barebones api override [GET]

This endpoint is included in this api blueprint for testing purposes. It's output should be identical to the corresponding /{node_id}/test/page endpoint above.

+ Response 200 (application/json)

        {
            "node_id": 4,
            "item_type": "custom_page",
            "url": "/test-page-slug/",
            "url_translations": {
                "en": "/en/4",
                "ar": "/ar/4",
                "bg": "/bg/4",
                "ca": "/ca/4",
                "cs": "/cs/4",
                "da": "/da/4",
                "de": "/de/4",
                "en_gb": "/en-gb/4",
                "en_us": "/en-us/4",
                "el": "/el/4",
                "es": "/es/4",
                "fa": "/fa/4",
                "fi": "/fi/4",
                "fil": "/fil/4",
                "fr": "/fr/4",
                "he": "/he/4",
                "hi": "/hi/4",
                "hr": "/hr/4",
                "hu": "/hu/4",
                "id": "/id/4",
                "it": "/it/4",
                "ja": "/ja/4",
                "ko": "/ko/4",
                "lt": "/lt/4",
                "lv": "/lv/4",
                "nl": "/nl/4",
                "no": "/no/4",
                "pl": "/pl/4",
                "pt": "/pt/4",
                "pt_br": "/pt-br/4",
                "pt_pt": "/pt-pt/4",
                "ro": "/ro/4",
                "ru": "/ru/4",
                "sk": "/sk/4",
                "sl": "/sl/4",
                "sr": "/sr/4",
                "sv": "/sv/4",
                "th": "/th/4",
                "tr": "/tr/4",
                "uk": "/uk/4",
                "vi": "/vi/4",
                "zh": "/zh/4",
                "zh_cn": "/zh-cn/4",
                "zh_tw": "/zh-tw/4"
            },
            "source_language": "en",
            "requested_translation_language": null,
            "nav_tree_to_use": "home",
            "attributes": {
                "composition_type": "presentation",
                "icon_url": null,
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
                "caption": "Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text"
                            },
                            "id": "ebd8341ac4f233251d1e7bd91f918e8b"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=8&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "8"
                                }
                            },
                            "id": "74582504d5ec5e4ad1cf1836ca10e41e"
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03"
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42241898"
                            },
                            "id": "6e9923bf3a72248641143fc02eb1a23b"
                        }
                    ]
                }
            },
           "root_page": {
                "data": [
                    {
                        "type": "custom_page",
                        "data": {
                            "node_id": 4,
                            "item_type": "custom_page",
                            "attributes": {
                                "ref": null,
                                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
                                "menu_label": "Test page",
                                "heading": "Test heading",
                                "subheading": null,
                                "url": "/test-page-slug/",
                                "icon_url": null
                            },
                            "children": [
                                {
                                    "type": "custom_page",
                                    "data": {
                                        "node_id": 5,
                                        "item_type": "custom_page",
                                        "attributes": {
                                            "ref": null,
                                            "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in. Mauris laoreet nisl sagittis orci tincidunt egestas. ",
                                            "menu_label": "Test page 2",
                                            "heading": "Test heading 2",
                                            "subheading": null,
                                            "url": null,
                                            "icon_url": null
                                        },
                                        "children": [ ]
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "contributors": [],
            "related": [
                {
                    "node_id": 7,
                    "item_type": "go_item",
                    "url": null,
                    "attributes": {
                        "composition_type": "presentation",
                        "heading": "Test heading 2",
                        "subheading": null,
                        "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                        "caption": "Test caption 2",
                        "slug": "test-go-item-slug-2",
                        "thumb": {
                            "original": "http://web/files-api/p3media/file/image?id=10&preset=original-public&title=media&extension=.jpeg",
                            "735x444": "http://web/files-api/p3media/file/image?id=10&preset=735x444&title=media&extension=.jpg",
                            "160x96": "http://web/files-api/p3media/file/image?id=10&preset=160x96&title=media&extension=.jpg",
                            "110x66": "http://web/files-api/p3media/file/image?id=10&preset=110x66&title=media&extension=.jpg",
                            "130x77": "http://web/files-api/p3media/file/image?id=10&preset=130x77&title=media&extension=.jpg",
                            "180x108": "http://web/files-api/p3media/file/image?id=10&preset=180x108&title=media&extension=.jpg",
                            "735x444-retina": "http://web/files-api/p3media/file/image?id=10&preset=735x444-retina&title=media&extension=.jpg",
                            "160x96-retina": "http://web/files-api/p3media/file/image?id=10&preset=160x96-retina&title=media&extension=.jpg",
                            "110x66-retina": "http://web/files-api/p3media/file/image?id=10&preset=110x66-retina&title=media&extension=.jpg",
                            "130x77-retina": "http://web/files-api/p3media/file/image?id=10&preset=130x77-retina&title=media&extension=.jpg",
                            "180x108-retina": "http://web/files-api/p3media/file/image?id=10&preset=180x108-retina&title=media&extension=.jpg"
                        }
                    }
                }
            ],
            "groups": [
                "GapminderOrg"
            ],
            "home_navigation_tree": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 16,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "home",
                                "about": "This is the root item of general home tree.",
                                "menu_label": "Home",
                                "heading": "Home",
                                "subheading": "Gapminder.org - Start Here",
                                "url": "/friends",
                                "icon_url": "http://web/files-api/p3media/file/image?id=13&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": [
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 17,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "health",
                                            "about": "This tree item links to the main gapminder health page",
                                            "menu_label": "Health",
                                            "heading": "Health",
                                            "subheading": "About health",
                                            "url": null,
                                            "icon_url": "http://web/files-api/p3media/file/image?id=14&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": [
                                            {
                                                "type": "navigation_tree_item",
                                                "data": {
                                                    "node_id": 18,
                                                    "item_type": "navigation_tree_item",
                                                    "attributes": {
                                                        "ref": "ebola",
                                                        "about": "Most people need more money to lead a good life.",
                                                        "menu_label": "Ebola",
                                                        "heading": "Ebola",
                                                        "subheading": "Read more about ebola",
                                                        "url": "/ebola",
                                                        "icon_url": "http://web/files-api/p3media/file/image?id=15&preset=navtree-icon&title=media&extension=.gif"
                                                    },
                                                    "children": []
                                                }
                                            }
                                        ]
                                    }
                                },
                                {
                                    "type": "navigation_tree_item",
                                    "data": {
                                        "node_id": 19,
                                        "item_type": "navigation_tree_item",
                                        "attributes": {
                                            "ref": "exercises",
                                            "about": "This tree item links to the main starting page for exercises",
                                            "menu_label": "Exercises",
                                            "heading": "Exercises",
                                            "subheading": "For teachers and tutors",
                                            "url": "/exercises",
                                            "icon_url": "http://web/files-api/p3media/file/image?id=16&preset=navtree-icon&title=media&extension=.gif"
                                        },
                                        "children": []
                                    }
                                }
                            ]
                        }
                    }
                ]
            },
            "footer_navigation_tree_1": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 21,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "world",
                                "about": null,
                                "menu_label": "Gapminder World",
                                "heading": "Gapminder World",
                                "subheading": null,
                                "url": "/world",
                                "icon_url": "http://web/files-api/p3media/file/image?id=17&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 22,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "for-teachers",
                                "about": null,
                                "menu_label": "For teachers",
                                "heading": "For teachers",
                                "subheading": null,
                                "url": "/for-teachers",
                                "icon_url": "http://web/files-api/p3media/file/image?id=18&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            },
            "footer_navigation_tree_2": {
                "data": [
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 24,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "about",
                                "about": "about",
                                "menu_label": "About",
                                "heading": "About",
                                "subheading": null,
                                "url": "/about",
                                "icon_url": null
                            },
                            "children": []
                        }
                    },
                    {
                        "type": "navigation_tree_item",
                        "data": {
                            "node_id": 25,
                            "item_type": "navigation_tree_item",
                            "attributes": {
                                "ref": "help",
                                "about": null,
                                "menu_label": "Help",
                                "heading": "Help",
                                "subheading": null,
                                "url": "/help",
                                "icon_url": "http://web/files-api/p3media/file/image?id=20&preset=navtree-icon&title=media&extension=.gif"
                            },
                            "children": []
                        }
                    }
                ]
            }
        }

# Group Translations

## Item Translation [/translation/{nodeId}{?_lang}]

+ Parameters

    + nodeId (int) ... ID of the resource node
    + _lang (optional, string) ... the language code for the translation

### Get translation data for an item [GET]

+ Response 200 (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "url_translations": {
                "en": "/en/6",
                "ar": "/ar/6",
                "bg": "/bg/6",
                "ca": "/ca/6",
                "cs": "/cs/6",
                "da": "/da/6",
                "de": "/de/6",
                "en_gb": "/en-gb/6",
                "en_us": "/en-us/6",
                "el": "/el/6",
                "es": "/es/6",
                "fa": "/fa/6",
                "fi": "/fi/6",
                "fil": "/fil/6",
                "fr": "/fr/6",
                "he": "/he/6",
                "hi": "/hi/6",
                "hr": "/hr/6",
                "hu": "/hu/6",
                "id": "/id/6",
                "it": "/it/6",
                "ja": "/ja/6",
                "ko": "/ko/6",
                "lt": "/lt/6",
                "lv": "/lv/6",
                "nl": "/nl/6",
                "no": "/no/6",
                "pl": "/pl/6",
                "pt": "/pt/6",
                "pt_br": "/pt-br/6",
                "pt_pt": "/pt-pt/6",
                "ro": "/ro/6",
                "ru": "/ru/6",
                "sk": "/sk/6",
                "sl": "/sl/6",
                "sr": "/sr/6",
                "sv": "/sv/6",
                "th": "/th/6",
                "tr": "/tr/6",
                "uk": "/uk/6",
                "vi": "/vi/6",
                "zh": "/zh/6",
                "zh_cn": "/zh-cn/6",
                "zh_tw": "/zh-tw/6"
            },
            "source_language": "en",
            "requested_translation_language": null,
            "attributes": {
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text\n"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://192.168.59.103:11111/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            },
                                            "labels": {
                                                "title": "Title"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            },
                            "id": "7ac27a63a5ef487c8e54334989c98b41"
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            },
                            "id": "a57ca60762865d426d73904a18ab8e4b"
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": [],
                                "labels": []
                            },
                            "id": "f9b53e29ed861e483ce6642a07baa8ce"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": [],
                                "labels": []
                            },
                            "id": "65821809c8b31557b57344abe34a7224"
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": [],
                                "labels": []
                            },
                            "id": "d27605ace311f6d81d26ac184c74ef95"
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc"
                                },
                                "labels": {
                                    "google_docs_id": "Google Docs Id"
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e"
                        }
                    ]
                }
            },
            "translations": {
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123",
                            "progress": 0
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text\n"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945",
                            "progress": 0
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2",
                            "progress": 0
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://192.168.59.103:11111/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48",
                                        "progress": 0
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d",
                            "progress": 0
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            },
                            "id": "7ac27a63a5ef487c8e54334989c98b41",
                            "progress": 0
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            },
                            "id": "a57ca60762865d426d73904a18ab8e4b",
                            "progress": 0
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03",
                            "progress": 0
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": []
                            },
                            "id": "f9b53e29ed861e483ce6642a07baa8ce",
                            "progress": 0
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": []
                            },
                            "id": "65821809c8b31557b57344abe34a7224",
                            "progress": 0
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": []
                            },
                            "id": "d27605ace311f6d81d26ac184c74ef95",
                            "progress": 0
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc"
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e",
                            "progress": 0
                        }
                    ]
                }
            },
            "labels": {
                "heading": "Heading",
                "subheading": "Subheading",
                "about": "About",
                "caption": "Caption"
            }
        }

### Save translation data for an item [PUT]

+ Request (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "translations": {
                "heading": "ES Test heading",
                "subheading": null,
                "about": "ES Test about",
                "caption": "ES Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "ES Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "ES Test text\n"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "ES Test credit",
                                "text": "> ES Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "ES Gapminder World 2012",
                                                "url": "http://192.168.59.103:11111/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "1ZhsSrEwD1Rg9shDinj5RWzbK4GmBBNAgmJhyMGUBRl4"
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e"
                        }
                    ]
                }
            },
            "labels": {
                "heading": "Heading",
                "subheading": "Subheading",
                "about": "About",
                "caption": "Caption"
            }
        }

+ Response 200 (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "url_translations": {
                "en": "/en/6",
                "ar": "/ar/6",
                "bg": "/bg/6",
                "ca": "/ca/6",
                "cs": "/cs/6",
                "da": "/da/6",
                "de": "/de/6",
                "en_gb": "/en-gb/6",
                "en_us": "/en-us/6",
                "el": "/el/6",
                "es": "/es/6",
                "fa": "/fa/6",
                "fi": "/fi/6",
                "fil": "/fil/6",
                "fr": "/fr/6",
                "he": "/he/6",
                "hi": "/hi/6",
                "hr": "/hr/6",
                "hu": "/hu/6",
                "id": "/id/6",
                "it": "/it/6",
                "ja": "/ja/6",
                "ko": "/ko/6",
                "lt": "/lt/6",
                "lv": "/lv/6",
                "nl": "/nl/6",
                "no": "/no/6",
                "pl": "/pl/6",
                "pt": "/pt/6",
                "pt_br": "/pt-br/6",
                "pt_pt": "/pt-pt/6",
                "ro": "/ro/6",
                "ru": "/ru/6",
                "sk": "/sk/6",
                "sl": "/sl/6",
                "sr": "/sr/6",
                "sv": "/sv/6",
                "th": "/th/6",
                "tr": "/tr/6",
                "uk": "/uk/6",
                "vi": "/vi/6",
                "zh": "/zh/6",
                "zh_cn": "/zh-cn/6",
                "zh_tw": "/zh-tw/6"
            },
            "source_language": "en",
            "requested_translation_language": null,
            "attributes": {
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text\n"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://192.168.59.103:11111/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            },
                                            "labels": {
                                                "title": "Title"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            },
                            "id": "7ac27a63a5ef487c8e54334989c98b41"
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            },
                            "id": "a57ca60762865d426d73904a18ab8e4b"
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": [],
                                "labels": []
                            },
                            "id": "f9b53e29ed861e483ce6642a07baa8ce"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": [],
                                "labels": []
                            },
                            "id": "65821809c8b31557b57344abe34a7224"
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": [],
                                "labels": []
                            },
                            "id": "d27605ace311f6d81d26ac184c74ef95"
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc"
                                },
                                "labels": {
                                    "google_docs_id": "Google Docs Id"
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e"
                        }
                    ]
                }
            },
            "translations": {
                "heading": "ES Test heading",
                "subheading": null,
                "about": "ES Test about",
                "caption": "ES Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "ES Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123",
                            "progress": 100
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "ES Test text\n"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945",
                            "progress": 100
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "ES Test credit",
                                "text": "> ES Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2",
                            "progress": 100
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "ES Gapminder World 2012",
                                                "url": "http://192.168.59.103:11111/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48",
                                        "progress": 100
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d",
                            "progress": 0
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            },
                            "id": "7ac27a63a5ef487c8e54334989c98b41",
                            "progress": 0
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            },
                            "id": "a57ca60762865d426d73904a18ab8e4b",
                            "progress": 0
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03",
                            "progress": 0
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": []
                            },
                            "id": "f9b53e29ed861e483ce6642a07baa8ce",
                            "progress": 0
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": []
                            },
                            "id": "65821809c8b31557b57344abe34a7224",
                            "progress": 0
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": []
                            },
                            "id": "d27605ace311f6d81d26ac184c74ef95",
                            "progress": 0
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "1ZhsSrEwD1Rg9shDinj5RWzbK4GmBBNAgmJhyMGUBRl4"
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e",
                            "progress": 100
                        }
                    ]
                }
            },
            "labels": {
                "heading": "Heading",
                "subheading": "Subheading",
                "about": "About",
                "caption": "Caption"
            }
        }

## TESTING Composition Translation [/translation/{nodeId}/test/composition{?_lang}]

+ Parameters

    + nodeId (int) ... ID of the resource node
    + _lang (optional, string) ... the language code for the translation

### TESTING Get translation data for a composition [GET]

This endpoint is for testing purposes only and will not be available in the real API.
It is a workaround for not being able to choose the response when multiple are defined per request when testing the API format.

+ Response 200 (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "url_translations": {
                "en": "/en/6",
                "ar": "/ar/6",
                "bg": "/bg/6",
                "ca": "/ca/6",
                "cs": "/cs/6",
                "da": "/da/6",
                "de": "/de/6",
                "en_gb": "/en-gb/6",
                "en_us": "/en-us/6",
                "el": "/el/6",
                "es": "/es/6",
                "fa": "/fa/6",
                "fi": "/fi/6",
                "fil": "/fil/6",
                "fr": "/fr/6",
                "he": "/he/6",
                "hi": "/hi/6",
                "hr": "/hr/6",
                "hu": "/hu/6",
                "id": "/id/6",
                "it": "/it/6",
                "ja": "/ja/6",
                "ko": "/ko/6",
                "lt": "/lt/6",
                "lv": "/lv/6",
                "nl": "/nl/6",
                "no": "/no/6",
                "pl": "/pl/6",
                "pt": "/pt/6",
                "pt_br": "/pt-br/6",
                "pt_pt": "/pt-pt/6",
                "ro": "/ro/6",
                "ru": "/ru/6",
                "sk": "/sk/6",
                "sl": "/sl/6",
                "sr": "/sr/6",
                "sv": "/sv/6",
                "th": "/th/6",
                "tr": "/tr/6",
                "uk": "/uk/6",
                "vi": "/vi/6",
                "zh": "/zh/6",
                "zh_cn": "/zh-cn/6",
                "zh_tw": "/zh-tw/6"
            },
            "source_language": "en",
            "requested_translation_language": "es",
            "attributes": {
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text\n"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            },
                                            "labels": {
                                                "title": "Title"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            },
                            "id": "7ac27a63a5ef487c8e54334989c98b41"
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            },
                            "id": "a57ca60762865d426d73904a18ab8e4b"
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": [],
                                "labels": []
                            },
                            "id": "f9b53e29ed861e483ce6642a07baa8ce"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": [],
                                "labels": []
                            },
                            "id": "65821809c8b31557b57344abe34a7224"
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": [],
                                "labels": []
                            },
                            "id": "d27605ace311f6d81d26ac184c74ef95"
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc"
                                },
                                "labels": {
                                    "google_docs_id": "Google Docs Id"
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e"
                        }
                    ]
                }
            },
            "translations": {
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123",
                            "progress": 0
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text\n"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945",
                            "progress": 0
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2",
                            "progress": 0
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48",
                                        "progress": 0
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d",
                            "progress": 0
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            },
                            "id": "7ac27a63a5ef487c8e54334989c98b41",
                            "progress": 0
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            },
                            "id": "a57ca60762865d426d73904a18ab8e4b",
                            "progress": 0
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03",
                            "progress": 0
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": []
                            },
                            "id": "f9b53e29ed861e483ce6642a07baa8ce",
                            "progress": 0
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": []
                            },
                            "id": "65821809c8b31557b57344abe34a7224",
                            "progress": 0
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": []
                            },
                            "id": "d27605ace311f6d81d26ac184c74ef95",
                            "progress": 0
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc"
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e",
                            "progress": 0
                        }
                    ]
                }
            },
            "labels": {
                "heading": "Heading",
                "subheading": "Subheading",
                "about": "About",
                "caption": "Caption"
            }
        }

### TESTING Save translation data for a composition [PUT]

This endpoint is for testing purposes only and will not be available in the real API.
It is a workaround for not being able to choose the response when multiple are defined per request when testing the API format.

+ Request (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "translations": {
                "heading": "ES Test heading",
                "subheading": null,
                "about": "ES Test about",
                "caption": "ES Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "ES Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "ES Test text\n"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "ES Test credit",
                                "text": "> ES Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "ES Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "1ZhsSrEwD1Rg9shDinj5RWzbK4GmBBNAgmJhyMGUBRl4"
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e"
                        }
                    ]
                }
            },
            "labels": {
                "heading": "Heading",
                "subheading": "Subheading",
                "about": "About",
                "caption": "Caption"
            }
        }

+ Response 200 (application/json)

        {
            "node_id": 6,
            "item_type": "go_item",
            "url": "/answers/test-go-item-slug/",
            "url_translations": {
                "en": "/en/6",
                "ar": "/ar/6",
                "bg": "/bg/6",
                "ca": "/ca/6",
                "cs": "/cs/6",
                "da": "/da/6",
                "de": "/de/6",
                "en_gb": "/en-gb/6",
                "en_us": "/en-us/6",
                "el": "/el/6",
                "es": "/es/6",
                "fa": "/fa/6",
                "fi": "/fi/6",
                "fil": "/fil/6",
                "fr": "/fr/6",
                "he": "/he/6",
                "hi": "/hi/6",
                "hr": "/hr/6",
                "hu": "/hu/6",
                "id": "/id/6",
                "it": "/it/6",
                "ja": "/ja/6",
                "ko": "/ko/6",
                "lt": "/lt/6",
                "lv": "/lv/6",
                "nl": "/nl/6",
                "no": "/no/6",
                "pl": "/pl/6",
                "pt": "/pt/6",
                "pt_br": "/pt-br/6",
                "pt_pt": "/pt-pt/6",
                "ro": "/ro/6",
                "ru": "/ru/6",
                "sk": "/sk/6",
                "sl": "/sl/6",
                "sr": "/sr/6",
                "sv": "/sv/6",
                "th": "/th/6",
                "tr": "/tr/6",
                "uk": "/uk/6",
                "vi": "/vi/6",
                "zh": "/zh/6",
                "zh_cn": "/zh-cn/6",
                "zh_tw": "/zh-tw/6"
            },
            "source_language": "en",
            "requested_translation_language": "es",
            "attributes": {
                "heading": "Test heading",
                "subheading": null,
                "about": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus convallis commodo ante nec venenatis. Vivamus maximus massa lectus, ut fermentum arcu tempus in.",
                "caption": "Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123"
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "Test text\n"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945"
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "Test credit",
                                "text": "> Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2"
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            },
                                            "labels": {
                                                "title": "Title"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48"
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d"
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            },
                            "id": "7ac27a63a5ef487c8e54334989c98b41"
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            },
                            "id": "a57ca60762865d426d73904a18ab8e4b"
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": [],
                                "labels": []
                            },
                            "id": "f9b53e29ed861e483ce6642a07baa8ce"
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": [],
                                "labels": []
                            },
                            "id": "65821809c8b31557b57344abe34a7224"
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": [],
                                "labels": []
                            },
                            "id": "d27605ace311f6d81d26ac184c74ef95"
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "abc"
                                },
                                "labels": {
                                    "google_docs_id": "Google Docs Id"
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e"
                        }
                    ]
                }
            },
            "translations": {
                "heading": "ES Test heading",
                "subheading": null,
                "about": "ES Test about",
                "caption": "ES Test caption",
                "composition": {
                    "data": [
                        {
                            "type": "heading",
                            "data": {
                                "text": "ES Test heading"
                            },
                            "id": "25cefe3f2d19b4784368c2f0ec4ee123",
                            "progress": 100
                        },
                        {
                            "type": "text",
                            "data": {
                                "text": "ES Test text\n"
                            },
                            "id": "3f6652553ac1cfd59c2d544202213945",
                            "progress": 100
                        },
                        {
                            "type": "quote",
                            "data": {
                                "cite": "ES Test credit",
                                "text": "> ES Test quote"
                            },
                            "id": "1db0bcb68d798b40ebaaca2e42737be2",
                            "progress": 100
                        },
                        {
                            "type": "download_links",
                            "data": {
                                "download_links": [
                                    {
                                        "type": "download_link",
                                        "data": {
                                            "node_id": 3,
                                            "item_type": "download_link",
                                            "attributes": {
                                                "title": "ES Gapminder World 2012",
                                                "url": "http://web/files-api/p3media/file/image?id=7&preset=original&title=media&extension=.pdf"
                                            }
                                        },
                                        "id": "c6165892b571041826b6562311eebf48",
                                        "progress": 100
                                    }
                                ]
                            },
                            "id": "a6c6ff85dc6716fe5d3e6498d542829d",
                            "progress": 0
                        },
                        {
                            "type": "image",
                            "data": {
                                "message": "File",
                                "file": {
                                    "url": "http://192.168.99.100:11111/files-api/p3media/file/image?id=10&preset=sir-trevor-image-block&title=media&extension=.jpeg",
                                    "p3_media_id": "10"
                                }
                            },
                            "id": "7ac27a63a5ef487c8e54334989c98b41",
                            "progress": 0
                        },
                        {
                            "type": "slideshare",
                            "data": {
                                "remote_id": "42268387"
                            },
                            "id": "a57ca60762865d426d73904a18ab8e4b",
                            "progress": 0
                        },
                        {
                            "type": "video",
                            "data": {
                                "source": "youtube",
                                "remote_id": "BkSO9pOVpRM"
                            },
                            "id": "f78b6d53bdf075b1f95a397010915c03",
                            "progress": 0
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 9,
                                "item_type": "item_list",
                                "attributes": []
                            },
                            "id": "f9b53e29ed861e483ce6642a07baa8ce",
                            "progress": 0
                        },
                        {
                            "type": "item_list",
                            "data": {
                                "node_id": 10,
                                "item_type": "item_list",
                                "attributes": []
                            },
                            "id": "65821809c8b31557b57344abe34a7224",
                            "progress": 0
                        },
                        {
                            "type": "visualization",
                            "data": {
                                "node_id": 12,
                                "item_type": "visualization",
                                "attributes": []
                            },
                            "id": "d27605ace311f6d81d26ac184c74ef95",
                            "progress": 0
                        },
                        {
                            "type": "slideshow_file",
                            "data": {
                                "node_id": 14,
                                "item_type": "slideshow_file",
                                "attributes": {
                                    "google_docs_id": "1ZhsSrEwD1Rg9shDinj5RWzbK4GmBBNAgmJhyMGUBRl4"
                                }
                            },
                            "id": "b3a06fa50ff950daed8b2448c94efc2e",
                            "progress": 100
                        }
                    ]
                }
            },
            "labels": {
                "heading": "Heading",
                "subheading": "Subheading",
                "about": "About",
                "caption": "Caption"
            }
        }
