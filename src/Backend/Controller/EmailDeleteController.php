<?php


namespace App\Backend\Controller;


use App\Backend\Email\EmailService;
use App\Framework\AppController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class EmailDeleteController extends AppController
{

    private EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * @Route("/api/v1/email/{emailId}", methods={"DELETE"})
     */
    public function invoke(string $emailId): JsonResponse
    {

        $result = $this->emailService->deleteEmail($emailId);
        if ($result->isSuccess()) {
            return $this->jsonSuccess(true);
        }

        return $this->json(['success' => false, 'error' => $result->getError()]);
    }
}