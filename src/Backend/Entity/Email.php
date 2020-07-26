<?php


namespace App\Backend\Entity;

use App\Backend\Email\EmailCreateRequest;
use App\Backend\Entity\ValueObject\EmailAddress;
use App\Backend\Entity\ValueObject\EmailAttachment;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Email
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidOrderedTimeGenerator")
     * @ORM\Column(type="uuid_binary_ordered_time", unique=true)
     */
    private string $id;

    /**
     * @ORM\Column(type="json")
     */
    private array $sender = [];

    /**
     * @ORM\Column(type="json")
     */
    private array $recipientsTo = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private ?array $recipientsCC = null;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private ?array $recipientsBCC = null;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private ?string $subject = null;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $contentText = null;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $contentHtml = null;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private ?array $attachments = null;

    private $status;


    public function __construct(EmailAddress $from, array $to = [])
    {
        $this->sender[] = $from;

        foreach ($to as $address) {
            $this->addTo($address);
        }

        $this->recipientsTo = $to;
    }

    public function getId(): string
    {
        return $this->id;
    }


    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function getFrom(): EmailAddress
    {
        return $this->sender[0];
    }

    public function addTo(EmailAddress $address): void
    {
        $this->recipientsTo[] = $address;
    }

    public function getTo(): array
    {
        return $this->recipientsTo;
    }

    public function addCc(EmailAddress $address): void
    {
        $this->recipientsCC = $this->recipientsCC ?? [];
        $this->recipientsCC[] = $address;
    }

    public function getCc(): ?array
    {
        return $this->recipientsCC;
    }

    public function addBcc(EmailAddress $address): void
    {
        $this->recipientsBCC = $this->recipientsBCC ?? [];
        $this->recipientsBCC[] = $address;
    }

    public function getBcc(): ?array
    {
        return $this->recipientsBCC;
    }

    public function setContentHtml(?string $content): void
    {
        $this->contentHtml = $content;
    }

    public function getBodyHtml(): ?string
    {
        return $this->contentHtml;
    }

    public function setContentText(string $content): void
    {
        $this->contentText = $content;
    }

    public function getBodyText(): string
    {
        return $this->contentText;
    }

    public function addAttachment(EmailAttachment $attachment): void
    {
        $this->attachments = $this->attachments ?? [];
        $this->attachments[] = $attachment;
    }

    public function getAttachments(): array
    {
        return $this->attachments;
    }

}