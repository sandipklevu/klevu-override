<?php
/**
 *
 */

namespace Klevu\Override\Plugin\Framework\Search\Request;

use Klevu\Search\Helper\Config as KlevuConfig;
use Magento\Framework\App\Request\Http as Magento_Request;
use Magento\Framework\Registry as MagentoRegistry;
use Magento\Framework\Search\Request\Cleaner as MageCleaner;
use Psr\Log\LoggerInterface;


class KlevuCleanerPlugin
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
     * Cleaner on the Klevu Category Navigation Module
     *
     * @param MageCleaner $subject
     * @param $result
     * @param array $requestData
     */
    public function afterKlevuQueryCleanupCategory(MageCleaner $subject, $result, array $requestData)
    {
        try {
            $this->logger->debug('************************************************');
            $this->logger->debug('cleanerStartedForCategoryNavigation::afterKlevuQueryCleanupCategory');
            $this->logger->debug(get_class($subject));
            $this->logger->debug(__METHOD__ . ' - ' . __LINE__);
            $this->logger->debug(json_encode($requestData));
            $this->logger->debug('end----cleanerStartedForCategoryNavigation--end');
            $this->logger->debug('************************************************');
        } catch (\Exception $e) {
            $this->logger->debug('Exception thrown in KlevuOverride::afterKlevuQueryCleanupCategory' . $e->getMessage());
            return $result;
        }
        return $result;
    }

    /**
     * Cleaner for the Klevu Search Module
     *
     * @param MageCleaner $subject
     * @param $result
     * @param array $requestData
     */
    public function afterKlevuQueryCleanup(MageCleaner $subject, $result, array $requestData)
    {
        try {
            $this->logger->debug('************************************************');
            $this->logger->debug('cleanerStartedForKlevuSearch::afterKlevuQueryCleanup');
            $this->logger->debug(get_class($subject));
            $this->logger->debug(__METHOD__ . ' - ' . __LINE__);
            $this->logger->debug(json_encode($requestData));
            $this->logger->debug('end----cleanerStartedForKlevuSearch--end');
            $this->logger->debug('************************************************');


        } catch (\Exception $e) {
            $this->logger->debug('Exception thrown in KlevuOverride::afterKlevuQueryCleanup' . $e->getMessage());
            return $result;
        }
        return $result;

    }

}
