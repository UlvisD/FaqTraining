<?php
/**
 * @copyright Copyright (c) 2023 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Api\Data;
interface FaqInterface
{

    const TABLE = 'magebit_faq';

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    const QUESTION = 'question';
    const ANSWER = 'answer';
    const ID = 'id';
    const STATUS = 'status';
    const POSITION = 'position';
    const UPDATED_AT = 'updated_at';
    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Get question
     *
     * @return string
     * */
    public function getQuestion(): string;

    /**
     * Set question
     *
     * @param string $question
     * @return void
     * */
    public function setQuestion(string $question): void;

    /**
     * Get answer
     *
     * @return string
     * */
    public function getAnswer(): string;

    /**
     * Set answer
     *
     * @param string $answer
     * @return void
     * */
    public function setAnswer(string $answer): void;

    /**
     * Get status
     *
     * @return int
     * */
    public function getStatus(): int;

    /**
     * Set status
     *
     * @param int $status
     * @return void
     * */
    public function setStatus(int $status): void;

    /**
     * Get position
     *
     * @return int
     * */
    public function getPosition(): int;

    /**
     * Set position
     *
     * @param int $position
     * @return void
     * */
    public function setPosition(int $position): void;

    /**
     * Get updated_at
     *
     * @return string
     * */
    public function getUpdatedAt(): string;

    /**
     * @param string $time
     * @return void
     */
    public function setUpdatedAt(string $time): void;

}
