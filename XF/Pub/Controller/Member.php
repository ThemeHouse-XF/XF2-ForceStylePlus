<?php

namespace ThemeHouse\ForceStyle\XF\Pub\Controller;

use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\View;

/**
 * Class Member
 * @package ThemeHouse\ForceStyle\XF\Pub\Controller
 */
class Member extends XFCP_Member
{
    /**
     * @param ParameterBag $params
     * @return View
     */
    public function actionIndex(ParameterBag $params)
    {
        $reply = parent::actionIndex($params);

        if ($reply instanceof View) {
            $active = $reply->getParam('active');
            $options = \XF::options();
            if ($options->thforcestyle_notable_members && $options->thforcestyle_notable_members_pages) {
                if (in_array($active ? $active->member_stat_id : -1, $options->thforcestyle_notable_members_pages)) {
                    $this->setViewOption('style_id', $options->thforcestyle_notable_members);
                }
            }
        }

        return $reply;
    }

    public function actionList() {
        $reply = parent::actionList();

        if ($reply instanceof View) {
            $options = \XF::options();
            if ($options->thforcestyle_notable_members && $options->thforcestyle_notable_members_pages) {
                if (in_array(-2, $options->thforcestyle_notable_members_pages)) {
                    $this->setViewOption('style_id', $options->thforcestyle_notable_members);
                }
            }
        }

        return $reply;
    }
}
