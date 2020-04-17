<?php


namespace Klevu\Override\Plugin;

use Magento\Elasticsearch\SearchAdapter;
use Psr\Log\LoggerInterface;

/**
 * Response Factory
 * @api
 * @since 100.1.0
 */
class ResponseCheck
{
    /**
     * Psr Logger  instance
     *
     * @var LoggerInterface
     * @since 100.1.0
     */
    protected $logger;


    /**
     * @param ObjectManagerInterface $objectManager
     */
    public function __construct(
        LoggerInterface $logger
    )
    {
        $this->logger = $logger;

    }


    public function beforeCreate(\Magento\Elasticsearch\SearchAdapter\ResponseFactory $subject, $result)
    {
        if (!is_array($result) || empty($result)) return false;
        foreach ($result['documents'] as $rawDocument) {
            $this->logger->debug('CAL_FRM_TPFix_RES', $rawDocument);
        }


    }


}
