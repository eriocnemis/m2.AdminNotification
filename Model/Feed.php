<?php
/**
 * Copyright © Eriocnemis, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Eriocnemis\AdminNotification\Model;

use Magento\AdminNotification\Model\Feed as AbstractFeed;

/**
 * Feed
 */
class Feed extends AbstractFeed
{
    /**
     * Feed url config path
     *
     * @var string
     */
    const XML_FEED_URL_PATH = 'system/adminnotification/eriocnemis_feed_url';

    /**
     * Retrieve feed url
     *
     * @return string
     */
    public function getFeedUrl()
    {
        $httpPath = $this->_backendConfig->isSetFlag(self::XML_USE_HTTPS_PATH) ? 'https://' : 'http://';
        if ($this->_feedUrl === null) {
            $this->_feedUrl = $httpPath . $this->_backendConfig->getValue(self::XML_FEED_URL_PATH);
        }
        return $this->_feedUrl;
    }
}
