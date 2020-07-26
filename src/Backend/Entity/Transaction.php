<?php


namespace App\Backend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Transaction
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidOrderedTimeGenerator")
     * @ORM\Column(type="uuid_binary_ordered_time", unique=true)
     */
    private string $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTime $scheduledAt;

    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Backend\Entity\Email")
     */
    private Email $email;


    public function getId(): string
    {
        return $this->id;
    }


}