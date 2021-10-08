<?php

namespace ThemeHouse\ForceStyle\XFRM\Pub\Controller;

use XF\Mvc\ParameterBag;

/**
 * Class WhatsNewResource
 * @package ThemeHouse\ForceStyle\XFRM\Pub\Controller
 */
class WhatsNewResource extends XFCP_WhatsNewResource
{
    /**
     * @param $action
     * @param ParameterBag $params
     */
    protected function preDispatchController($action, ParameterBag $params)
    {
        parent::preDispatchController($action, $params);

        if (\XF::options()->thforcestyle_xfrm) {
            $this->setViewOption('style_id', \XF::options()->thforcestyle_xfrm);
        }
    }
}
