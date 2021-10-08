<?php

namespace ThemeHouse\ForceStyle\Option;

use XF\Entity\Option;
use XF\Option\AbstractOption;

class ChatRoom extends AbstractOption
{
    protected static $isActive = null;

    protected static function isChatInstalledAndActive()
    {
        if (self::$isActive === null) {
            $addonCache = \XF::app()->container('addon.cache');
            self::$isActive = isset($addonCache['Siropu/Chat']);
        }

        return self::$isActive;
    }

    public static function renderSelect(Option $option, array $htmlParams)
    {
        if (!self::isChatInstalledAndActive()) {
            return self::getTemplater()->formRow(\XF::phrase('thforcestyle_siropu_chat_not_installed'), []);
        }

        $data = self::getSelectData($option, $htmlParams);

        array_unshift($data['choices'], [
            'value' => 0,
            'label' => ''
        ]);

        return self::getTemplater()->formSelectRow(
            $data['controlOptions'], $data['choices'], $data['rowOptions']
        );
    }

    public static function renderSelectMultiple(Option $option, array $htmlParams)
    {
        if (!self::isChatInstalledAndActive()) {
            return self::getTemplater()->formRow(\XF::phrase('thforcestyle_siropu_chat_not_installed'), []);
        }

        $data = self::getSelectData($option, $htmlParams);
        $data['controlOptions']['multiple'] = true;
        $data['controlOptions']['size'] = 5;

        return self::getTemplater()->formSelectRow(
            $data['controlOptions'], $data['choices'], $data['rowOptions']
        );
    }

    protected static function getSelectData(Option $option, array $htmlParams)
    {
        $choices = array_merge([-1 => [
            'label' =>  \XF::phrase('thforcestyle_chat_full_page'),
            'value' => -1
        ]], \XF::repository('Siropu\Chat:Room')->getRoomOptionsData());

        return [
            'choices' => $choices,
            'controlOptions' => self::getControlOptions($option, $htmlParams),
            'rowOptions' => self::getRowOptions($option, $htmlParams)
        ];
    }
}