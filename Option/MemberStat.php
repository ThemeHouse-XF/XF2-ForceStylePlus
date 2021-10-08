<?php

namespace ThemeHouse\ForceStyle\Option;

use XF\Entity\Option;
use XF\Option\AbstractOption;

/**
 * Class MemberStat
 * @package ThemeHouse\ForceStyle\Option
 */
class MemberStat extends AbstractOption
{
    /**
     * @param Option $option
     * @param array $htmlParams
     * @return string
     */
    public static function renderCheckMultiple(Option $option, array $htmlParams)
    {
        /** @var \XF\Repository\MemberStat $memberStatRepo */
        $memberStatRepo = \XF::repository('XF:MemberStat');

        /** @var \XF\Entity\MemberStat[] $memberStats */
        $memberStats = $memberStatRepo->findMemberStatsForDisplay()->fetch();

        $choices = [];
        $choices[-1] = \XF::phrase('thforcestyleplus_members_overview');
        $choices[-2] = \XF::phrase('thforcestyleplus_members_list');
        $choices[-3] = \XF::phrase('thforcestyleplus_current_visitors');
        foreach ($memberStats as $entry) {
            $choices[$entry->member_stat_id] = $entry->title;
        }

        return self::getCheckboxRow($option, $htmlParams, $choices);
    }
}
