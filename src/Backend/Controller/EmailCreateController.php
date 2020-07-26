<?php


namespace App\Backend\Controller;


use App\Backend\Email\EmailCreateRequest;
use App\Backend\Email\EmailService;
use App\Backend\Email\Form\EmailCreateFormType;
use App\Framework\AppController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmailCreateController extends AppController
{

    private EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * @Route("/api/v1/email", methods={"POST"})
     */
    public function invoke(Request $request): Response
    {
        $dto = new EmailCreateRequest();
        $form = $this->createForm(EmailCreateFormType::class, $dto);

        $form->submit($request->request->all());
        if ($form->isValid()) {
            $result = $this->emailService->createEmail($dto);
            if ($result->isSuccess()) {
                return $this->jsonSuccess($result->getTarget());
            }
        }

        return $this->jsonErrorForm($form);
    }

}