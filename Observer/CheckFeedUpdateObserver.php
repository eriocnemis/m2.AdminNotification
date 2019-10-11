<?php
/**
 * Copyright © Eriocnemis, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Eriocnemis\AdminNotification\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Backend\Model\Auth\Session;
use Eriocnemis\AdminNotification\Model\FeedFactory;

/**
 * Feed observer
 */
class CheckFeedUpdateObserver implements ObserverInterface
{
    /**
     * Feed factory
     *
     * @var FeedFactory
     */
    protected $feedFactory;

    /**
     * Backend session
     *
     * @var Session
     */
    protected $session;

    /**
     * Initialize observer
     *
     * @param FeedFactory $feedFactory
     * @param Session $session
     */
    public function __construct(
        FeedFactory $feedFactory,
        Session $session
    ) {
        $this->feedFactory = $feedFactory;
        $this->session = $session;
    }

    /**
     * Checking for updates
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if ($this->session->isLoggedIn()) {
            $feed = $this->feedFactory->create();
            /* @var \Eriocnemis\AdminNotification\Model\Feed $feed */
            $feed->checkUpdate();
        }
    }
}
