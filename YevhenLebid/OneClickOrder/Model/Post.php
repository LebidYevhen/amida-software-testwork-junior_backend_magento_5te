<?php
namespace YevhenLebid\OneClickOrder\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'yevhenlebid_oneclickorder_post';

    protected $_cacheTag = 'yevhenlebid_oneclickorder_post';

    protected $_eventPrefix = 'yevhenlebid_oneclickorder_post';

    protected function _construct()
    {
        $this->_init('YevhenLebid\OneClickOrder\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}