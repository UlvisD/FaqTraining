<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Api;

interface FaqManagementInterface
{
    /**
     * @param int $status
     *
     * @return void
     * */
    public function enableQuestion(int $status): void;

    /**
     * @param int $status
     *
     * @return void
     * */
    public function disableQuestion(int $status): void;
}
