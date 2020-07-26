<?php


namespace App\Backend\Email;


use App\Backend\Entity\Email;
use App\Backend\Service\ServiceOperationResult;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;

class EmailService
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createEmail(EmailCreateRequest $request): ServiceOperationResult
    {
        $email = $request->toDomainModel();

        $this->em->persist($email);
        $this->em->flush();

        // send Event

        return ServiceOperationResult::success($email);
    }

    public function deleteEmail(string $emailId): ServiceOperationResult
    {
        if (false === Uuid::isValid($emailId)) {
            return ServiceOperationResult::error("ID must be an UUID V1");
        }

        $email = $this->em->find(Email::class, $emailId);
        if (null === $email) {
            return ServiceOperationResult::error("Email ".$emailId. " not found");
        }

        $this->em->remove($email);
        $this->em->flush();

        // send Event

        return ServiceOperationResult::success($email);
    }

}