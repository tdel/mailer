<?php


namespace App\Backend\Controller;


use App\Backend\Email\EmailService;
use App\Framework\AppController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EmailUpdateController extends AppController
{

    private EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * @Route("/api/v1/email/{emailId}", methods={"PUT"})
     */
    public function invoke(Request $request, string $emailId)
    {

    }
}