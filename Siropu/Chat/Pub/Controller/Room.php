<?php

namespace ThemeHouse\ForceStyle\Siropu\Chat\Pub\Controller;

use XF\Mvc\ParameterBag;

/**
 * Class Room
 * @package ThemeHouse\ForceStyle\Siropu\Chat\Pub\Controller
 */
class Room extends XFCP_Room
{
    /**
     * @param ParameterBag $params
     * @return mixed
     */
    public function actionIndex(ParameterBag $params)
    {
        if ($params['room_id']) {
            if (\XF::options()->thforcestyle_siropu_chat && \XF::options()->thforcestyle_siropu_chat_rooms) {
                if (in_array($params['room_id'], \XF::options()->thforcestyle_siropu_chat_rooms)) {
                    $this->setViewOption('style_id', \XF::options()->thforcestyle_siropu_chat);
                }
            }
        }

        return parent::actionIndex($params);
    }
}
