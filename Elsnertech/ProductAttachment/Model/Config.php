<?php

namespace Elsnertech\ProductAttachment\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;


class Config implements ConfigInterface
{
    const XML_PATH_ENABLED = 'elsnertech_productattachment/general/enabled';
    const XML_PATH_DEBUG = 'elsnertech_productattachment/general/debug';

    const XML_PATH_ATTACHMENT_TAB_LABEL = 'elsnertech_productattachment/attachment/tab_label';
    const XML_PATH_ATTACHMENT_DOWNLOAD_LABEL = 'elsnertech_productattachment/attachment/download_label';
    const XML_PATH_ATTACHMENT_ALLOWED_EXTENSIONS = 'elsnertech_productattachment/attachment/allowed_extensions';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @inheritDoc
     */
    public function getConfigFlag($xmlPath, $storeId = null)
    {
        return $this->scopeConfig->isSetFlag(
            $xmlPath,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * @inheritDoc
     */
    public function getConfigValue($xmlPath, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $xmlPath,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function isEnabled($storeId = null)
    {
        return $this->getConfigFlag(self::XML_PATH_ENABLED, $storeId);
    }

    public function isDebugEnabled($storeId = null)
    {
        return $this->getConfigFlag(self::XML_PATH_DEBUG, $storeId);
    }

    public function getAttachmentTabLabel($storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_ATTACHMENT_TAB_LABEL, $storeId);
    }

    public function getAttachmentDownloadLabel($storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_ATTACHMENT_DOWNLOAD_LABEL, $storeId);
    }

    public function getAttachmentAllowedExtensions($storeId = null)
    {
        $value = $this->getConfigValue(self::XML_PATH_ATTACHMENT_ALLOWED_EXTENSIONS, $storeId);
        return explode(',', $value);
    }
}
