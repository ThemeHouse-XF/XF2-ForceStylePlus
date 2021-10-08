<?php

namespace ThemeHouse\ForceStyle\XFRM\Pub\Controller;

use XF\Mvc\ParameterBag;

/**
 * Class Author
 * @package ThemeHouse\ForceStyle\XFRM\Pub\Controller
 */
class Author extends XFCP_Author
{
    /**
     * @param $action
     * @param ParameterBag $params
     * @throws \XF\Mvc\Reply\Exception
     */
    protected function preDispatchController($action, ParameterBag $params)
    {
        parent::preDispatchController($action, $params);

        if (\XF::options()->thforcestyle_xfrm) {
            $this->setViewOption('style_id', \XF::options()->thforcestyle_xfrm);
        }
    }
}
