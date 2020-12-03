<?php
namespace Hiberus\Cortes\Controller\MiControlador;
class Index extends \Magento\Framework\App\Action\Action {
    protected $pageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }
    public function execute() {
        echo ("hola");
        return $this->pageFactory->create();
    }
}
