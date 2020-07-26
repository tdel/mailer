<?php


namespace App\Backend\Service;


class ServiceOperationResult
{

    private const STATUS_SUCCESS = 'success';
    private const STATUS_ERROR = 'error';

    private string $status;

    private $target;

    private $error;


    private function __construct(string $status, $target = null, $error = null)
    {
        $this->status = $status;
        $this->target = $target;
        $this->error = $error;
    }

    public static function success($target): self
    {
        return new self(self::STATUS_SUCCESS, $target);
    }

    public static function error(string $error, $target = null): self
    {
        return new self(self::STATUS_ERROR, $target, $error);
    }

    public function isSuccess(): bool
    {
        return $this->status === self::STATUS_SUCCESS;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function getError(): ?string
    {
        return $this->error;
    }
}