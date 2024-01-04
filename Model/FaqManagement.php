<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data\FaqInterface;
use Magebit\Faq\Api\FaqManagementInterface;

class FaqManagement implements FaqManagementInterface
{

    /**
     * @var FaqInterface
     */
    private FaqInterface $faq;

    /**
     * @param FaqInterface $faq
     */
    public function __construct(FaqInterface $faq)
    {
        $this->faq = $faq;
    }

    /**
     * Disable question
     * @param int $status
     *
     * @return void
     * */
    public function disableQuestion(int $status): void
    {
        $this->faq->setStatus($status);
    }

    /**
     * Enable question
     * @param int $status
     *
     * @return void
     * */
    public function enableQuestion(int $status): void
    {
        $this->faq->setStatus($status);
    }
}
