<?php

namespace ThemeHouse\ForceStyle\XF\Pub\Controller;

use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\View;

/**
 * Class Help
 * @package ThemeHouse\ForceStyle\XF\Pub\Controller
 */
class Help extends XFCP_Help
{
    /**
     * @param ParameterBag $params
     * @return \XF\Mvc\Reply\Error|View
     */
    public function actionIndex(ParameterBag $params)
    {
        $reply = parent::actionIndex($params);

        if ($reply instanceof View) {
            $page = $reply->getParam('page');
            $options = \XF::options();
            if ($options->thforcestyle_help && $options->thforcestyle_help_pages) {
                if (in_array($page ? $page->page_id : -1, $options->thforcestyle_help_pages)) {
                    $this->setViewOption('style_id', $options->thforcestyle_help);
                }
            }
        }

        return $reply;
    }
}
