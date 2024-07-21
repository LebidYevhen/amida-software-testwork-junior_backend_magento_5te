<?php

namespace YevhenLebid\OneClickOrder\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_postFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \YevhenLebid\OneClickOrder\Model\PostFactory $postFactory,
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);

        if (!$this->getRequest()->isAjax()) {
            $data = [
                'success' => false,
                'message' => 'There was an error placing your order'
            ];
            $result->setHttpResponseCode(400);
        } else {
            $params = $this->getRequest()->getParams();
            $post = $this->_postFactory->create();
            $post->setData($params)->save();

            $data = [
                'success' => true,
                'message' => 'Order placed successfully'
            ];
            $result->setHttpResponseCode(200);
        }

        return $result->setData($data);
    }
}
