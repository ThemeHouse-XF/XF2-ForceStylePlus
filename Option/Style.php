<?php

namespace ThemeHouse\ForceStyle\Option;

use XF\Entity\Option;
use XF\Option\AbstractOption;

/**
 * Class Style
 * @package ThemeHouse\ForceStyle\Option
 */
class Style extends AbstractOption
{
    /**
     * @param Option $option
     * @param array $htmlParams
     * @return string
     */
    public static function renderRadio(Option $option, array $htmlParams)
    {
        /** @var \XF\Repository\Style $styleRepo */
        $styleRepo = \XF::repository('XF:Style');

        $choices = [];
        $choices[0] = \XF::phrase('use_default_style');
        foreach ($styleRepo->getStyleTree(false)->getFlattened() as $entry) {
            if ($entry['record']->user_selectable) {
                $choices[$entry['record']->style_id] = $entry['record']->title;
            }
        }

        return self::getRadioRow($option, $htmlParams, $choices);
    }
}
