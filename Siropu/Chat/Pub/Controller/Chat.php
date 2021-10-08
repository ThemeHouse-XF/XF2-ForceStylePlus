<?php

namespace ThemeHouse\ForceStyle\Siropu\Chat\Pub\Controller;

use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\View;

class Chat extends XFCP_Chat
{
    /**
     * @param ParameterBag $params
     * @return mixed
     */
    public function actionIndex(ParameterBag $params)
    {
        $reply = parent::actionIndex($params);
        
        if($reply instanceof View) {
            $options = \XF::options();
            if ($options->thforcestyle_siropu_chat && $options->thforcestyle_siropu_chat_rooms) {
                if (in_array(-1, $options->thforcestyle_siropu_chat_rooms)) {
                    $this->setViewOption('style_id', $options->thforcestyle_siropu_chat);
                }
            }
        }

        return $reply;
    }
}
