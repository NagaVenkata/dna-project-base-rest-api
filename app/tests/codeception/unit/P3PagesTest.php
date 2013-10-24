<?php
use Codeception\Util\Stub;

class P3PagesTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSaveAndDeleteNewPage()
    {
        Yii::import('p3pages.*');

        $model = new P3Page();
        $model->route = '{"route":"site/index"}';
        $model->save();

        $this->codeGuy->seeInDatabase('p3_page',array('id' => $model->id));
        $this->codeGuy->seeInDatabase('p3_page_meta',array('id' => $model->p3PageMeta->id));

        /*
    }

    public function testDeletePage()
    {
        */

        Yii::import('p3pages.*');

        $id = $model->id;
        $metaId = $model->p3PageMeta->id;

        $model = P3Page::model()->findByPk($id);
        $model->delete();

        $this->codeGuy->dontSeeInDatabase($model->tableSchema->name,array('id' => $id));
        $this->codeGuy->dontSeeInDatabase('p3_page_meta',array('id' => $metaId));
    }
}