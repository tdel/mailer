<?php


namespace App\Backend\Entity\ValueObject;


class EmailAddress
{
    private string $email;

    private ?string $name;

    public function __construct(string $email, ?string $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

}