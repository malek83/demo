<?php

declare(strict_types=1);

namespace App\Entity;

/**
 * Class NodeEntity
 * @package App\Entity
 */
class NodeEntity extends AbstractEntity implements ArrayableInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var int
     */
    protected $creditsLeft;

    /**
     * @var int
     */
    protected $creditsRight;

    /**
     * @var int
     */
    protected $lft;

    /**
     * @var int
     */
    protected $rgt;

    /**
     * @var string
     */
    protected $direction;

    /**
     * @var NodeEntity|null;
     */
    protected $leftChild;

    /**
     * @var NodeEntity|null
     */
    protected $rightChild;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return int
     */
    public function getCreditsLeft(): int
    {
        return (int) $this->creditsLeft;
    }

    /**
     * @return int
     */
    public function getCreditsRight(): int
    {
        return (int) $this->creditsRight;
    }

    /**
     * @return int
     */
    public function getLft(): int
    {
        return (int) $this->lft;
    }

    /**
     * @return int
     */
    public function getRgt(): int
    {
        return (int) $this->rgt;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @return NodeEntity|null
     */
    public function getLeftChild(): ?NodeEntity
    {
        return $this->leftChild;
    }

    /**
     * @param NodeEntity|null $leftChild
     */
    public function setLeftChild(?NodeEntity $leftChild): void
    {
        $this->leftChild = $leftChild;
    }

    /**
     * @return NodeEntity|null
     */
    public function getRightChild(): ?NodeEntity
    {
        return $this->rightChild;
    }

    /**
     * @param NodeEntity|null $rightChild
     */
    public function setRightChild(?NodeEntity $rightChild): void
    {
        $this->rightChild = $rightChild;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param int $creditsLeft
     */
    public function setCreditsLeft(int $creditsLeft): void
    {
        $this->creditsLeft = $creditsLeft;
    }

    /**
     * @param int $creditsRight
     */
    public function setCreditsRight(int $creditsRight): void
    {
        $this->creditsRight = $creditsRight;
    }

    /**
     * @param int $lft
     */
    public function setLft(int $lft): void
    {
        $this->lft = $lft;
    }

    /**
     * @param int $rgt
     */
    public function setRgt(int $rgt): void
    {
        $this->rgt = $rgt;
    }

    /**
     * @param string $direction
     */
    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'credits_left' => $this->creditsLeft,
            'credits_right' => $this->creditsRight,
            'lft' => $this->lft,
            'rgt' => $this->rgt,
            'direction' => $this->direction
        ];
    }
}
