<?php


namespace App\Backend\Entity\ValueObject;


class EmailAttachment
{

    private string $contentType;

    private string $filename;

    private string $contentBase64;


    public function __construct(string $contentType, string $filename, string $contentBase64)
    {
        $this->contentType = $contentType;
        $this->filename = $filename;
        $this->contentBase64 = $contentBase64;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getContentBase64(): string
    {
        return $this->contentBase64;
    }
}