<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\FaqInterface;

interface FaqRepositoryInterface
{

    /**
     * @param int $id
     *
     * @return FaqInterface
     * */
    public function get(int $id): FaqInterface;

    /**
     * @param FaqInterface $faq
     *
     * @return void
     * */
    public function save(FaqInterface $faq): void;

    /**
     *
     * @return FaqInterface[]
     * */
    public function getList(): array;

    /**
     * @param FaqInterface $faq
     *
     * @return void
     * */
    public function delete(FaqInterface $faq): void;

    /**
     * @param int $id
     *
     * @return void
     * */
    public function deleteById(int $id): void;

    /**
     * @return string[] | string
     */
    public function getJson(): array | string;
}
