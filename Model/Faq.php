<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data\FaqInterface;
use Magento\Framework\Model\AbstractModel;
use Magebit\Faq\Model\ResourceModel\Faq as ResourceFaq;

class Faq extends AbstractModel implements FaqInterface
{

    protected function _construct(): void
    {
        $this->_init(ResourceFaq::class);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int) $this->getData(self::ID);
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * @param string $question
     * @return void
     */
    public function setQuestion(string $question): void
    {
        $this->setData(self::QUESTION, $question);
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * @param string $answer
     * @return void
     */
    public function setAnswer(string $answer): void
    {
        $this->setData(self::ANSWER, $answer);
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @param int $status
     * @return void
     */
    public function setStatus(int $status): void
    {
        $this->setData(self::STATUS, $status);
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->getData(self::POSITION);
    }

    /**
     * @param int $position
     * @return void
     */
    public function setPosition(int $position): void
    {
        $this->setData(self::POSITION, $position);
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @param string | null $time
     * @return void
     */
    public function setUpdatedAt(string | null $time): void
    {
        $this->setData(self::UPDATED_AT, $time);
    }


}
