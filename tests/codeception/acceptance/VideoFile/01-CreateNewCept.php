<?php
$scenario->group('data:clean-db');

$I = new WebGuy\MemberSteps($scenario);
$I->wantTo('create a video and make sure that only I see it.');

// Max logs in.
$I->login('maxo', 'test123');

// Max creates a new video file.
$I->createVideoFile(
    array(
        'info' => array(
            VideoFileEditPage::$titleField => 'Max video',
        ),
        'files' => array(
            VideoFileEditPage::$webmField => function () use ($I) {
                $I->uploadWebmFile();
            },
        ),
    )
);

$I->amOnPage(VideoFileBrowsePage::$URL);
$I->seeVideoFile('Max video');
$I->click('View', VideoFileBrowsePage::modelContext('Max video'));

$I->seeElement(VideoFileViewPage::$videoContainer);
$I->dontSee(VideoFileViewPage::$noVideoMessage);
$I->logout();

$I->login('olar', 'test123');
$I->dontSeeVideoFile('Max video');
