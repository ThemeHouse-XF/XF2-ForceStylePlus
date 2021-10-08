<?php

namespace ThemeHouse\ForceStyle\XF\Pub\Controller;

use XF\Mvc\Reply\View;

class Online extends XFCP_Online
{
    public function actionIndex()
    {
        $reply = parent::actionIndex();

        if ($reply instanceof View) {
            $options = \XF::options();
            if ($options->thforcestyle_notable_members && $options->thforcestyle_notable_members_pages) {
                if (in_array(-3, $options->thforcestyle_notable_members_pages)) {
                    $this->setViewOption('style_id', $options->thforcestyle_notable_members);
                }
            }
        }

        return $reply;
    }
}
