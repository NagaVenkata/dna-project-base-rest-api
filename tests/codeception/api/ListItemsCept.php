<?php
$I = new ApiGuy($scenario);
$I->wantTo('list items via the REST API');
$I->sendGET('videoFile');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->sendGET('i18nCatalog');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->sendGET('snapshot');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->sendGET('item');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->sendGET('waffle');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
