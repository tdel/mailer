<?php


namespace App\Backend\Email;


use App\Backend\Entity\Email;
use App\Backend\Entity\ValueObject\EmailAddress;
use App\Backend\Entity\ValueObject\EmailAttachment;

class EmailCreateRequest
{
    public array $from;

    public ?string $subject = null;

    public array $to;
    public ?array $cc = null;
    public ?array $bcc = null;

    public ?string $bodyText = null;
    public ?string $bodyHtml = null;

    public ?array $attachments = null;


    public function toDomainModel(): Email
    {
        $to = [];
        foreach ($this->to as $element) {
            $to[] = new EmailAddress($element['email'], $element['name']);
        }

        $email = new Email(
            new EmailAddress($this->from['email'], $this->from['name']),
            $to
        );

        $email->setSubject($this->subject);

        foreach ($this->cc as $cc) {
            $email->addCc(new EmailAddress($cc['email'], $cc['name']));
        }

        foreach ($this->bcc as $bcc) {
            $email->addBcc(new EmailAddress($bcc['email'], $bcc['name']));
        }

        $email->setContentText($this->bodyText);
        $email->setContentHtml($this->bodyHtml);

        foreach ($this->attachments as $attachment) {
            $email->addAttachment(
                new EmailAttachment($attachment['content_type'], $attachment['filename'], $attachment['content_base64'])
            );
        }

        return $email;
    }
}