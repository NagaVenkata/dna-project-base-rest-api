<?php

/**
 *
 * Class AuthorizationHierarchyCommand
 */
class LanguagesConfigurationCommand extends CConsoleCommand
{
    public function getHelp()
    {
        return <<<EOD
USAGE
  yiic languagesconfiguration build

DESCRIPTION
  Builds the configuration array of application languages

EOD;
    }

    public function actionBuild()
    {
        $enLocale = LocaleData::getInstance('en');
        $data = $enLocale->getData();
        var_export($data["languages"]);
    }

}
