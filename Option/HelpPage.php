<?php

namespace ThemeHouse\ForceStyle\Option;

use XF\Entity\Option;
use XF\Option\AbstractOption;

/**
 * Class HelpPage
 * @package ThemeHouse\ForceStyle\Option
 */
class HelpPage extends AbstractOption
{
    /**
     * @param Option $option
     * @param array $htmlParams
     * @return string
     */
    public static function renderCheckMultiple(Option $option, array $htmlParams)
    {
        /** @var \XF\Repository\HelpPage $helpPageRepo */
        $helpPageRepo = \XF::repository('XF:HelpPage');

        /** @var \XF\Entity\HelpPage[] $helpPages */
        $helpPages = $helpPageRepo->findHelpPagesForList()->fetch();

        $choices = [];
        $choices[-1] = \XF::phrase('thforcestyleplus_help_overview');
        foreach ($helpPages as $entry) {
            $choices[$entry->page_id] = $entry->title;
        }

        return self::getCheckboxRow($option, $htmlParams, $choices);
    }
}
