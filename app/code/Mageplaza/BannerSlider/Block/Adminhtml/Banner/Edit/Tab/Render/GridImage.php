<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_BannerSlider
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\BannerSlider\Block\Adminhtml\Banner\Edit\Tab\Render;

use Mageplaza\BannerSlider\Model\Config\Source\Image as ImageModel;
use Magento\Backend\Block\Context;

class GridImage extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    /**
     * @var ImageModel
     */
    protected $imageModel;

    /**
     * GridImage constructor.
     *
     * @param Context $context
     * @param ImageModel $imageModel
     * @param array $data
     */
    public function __construct(
        Context $context,
        ImageModel $imageModel,
        array $data = []
    )
    {
        $this->imageModel = $imageModel;

        parent::__construct($context, $data);
    }

    /**
     * Render Banner Image
     *
     * @param \Magento\Framework\DataObject $row
     *
     * @return string
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        if ($row->getData($this->getColumn()->getIndex())){
            $imageUrl = $this->imageModel->getBaseUrl().$row->getData($this->getColumn()->getIndex());
            return '<img src="'.$imageUrl.'" width=\'150\' class="admin__control-thumbnail"/>';
        }

        return '';
    }
}