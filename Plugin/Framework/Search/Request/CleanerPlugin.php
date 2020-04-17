<?php

namespace Klevu\Override\Plugin\Framework\Search\Request;

use Klevu\Search\Helper\Config as KlevuConfig;
use Magento\Framework\App\Request\Http as Magento_Request;
use Magento\Framework\Registry as MagentoRegistry;
use Magento\Framework\Search\Request\Cleaner as MageCleaner;
use Magento\Setup\Exception;
use Psr\Log\LoggerInterface;


class CleanerPlugin
{
    /**
     * Psr Logger  instance
     *
     * @var LoggerInterface
     * @since 100.1.0
     */
    protected $logger;


    /**
     * CleanerPlugin constructor.
     * @param LoggerInterface $logger
     * @param MagentoRegistry $magentoRegistry
     * @param Magento_Request $magentoRequest
     */
    public function __construct(
        LoggerInterface $logger,
        MagentoRegistry $magentoRegistry,
        Magento_Request $magentoRequest,
        KlevuConfig $klevuConfig

    )
    {
        $this->logger = $logger;
        $this->magentoRegistry = $magentoRegistry;
        $this->magentoRequest = $magentoRequest;
        $this->klevuConfig = $klevuConfig;


    }


    /**
     * Plugin clener
     *
     * @param MageCleaner $subject
     * @param $result
     * @param array $requestData
     * @return mixed
     */
    public function afterClean(MageCleaner $subject, $result, array $requestData)
    {
        try {
            $this->logger->debug('************************************************');
            $this->logger->debug('afterMageCleaner');
            $this->logger->debug(get_class($subject));
            $this->logger->debug(__METHOD__ . ' - ' . __LINE__);
            $this->logger->debug(json_encode($requestData));
            $this->logger->debug('end--------afterMageCleaner');
            $this->logger->debug('************************************************');

        } catch (\Exception $e) {
            $this->logger->debug('Exception thrown in KlevuOverride::afterClean' . $e->getMessage());
            return $result;
        }
        return $result;
    }


}
