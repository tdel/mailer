<?php


namespace App\Framework;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\ConstraintViolationListInterface;

abstract class AppController extends AbstractController
{

    protected function jsonSuccess($data): JsonResponse
    {
        return $this->json(['data' => $data]);
    }

    protected function jsonError($error): JsonResponse
    {
        return $this->json(['error' => $error], 400);
    }

    protected function jsonErrorValidation(ConstraintViolationListInterface $violationList): JsonResponse
    {
        $errors = [];
        foreach ($violationList as $violation) {
            $errors[$violation->getPropertyPath()] = $violation->getMessage();
        }

        return $this->jsonError($errors);
    }

    protected function jsonErrorForm(FormInterface $form): JsonResponse
    {
        $errors = [];
        foreach ($form->getErrors() as $error) {
            $errors[$error->getOrigin()->getName()][] = $error->getMessage();
        }

        return $this->jsonError($errors);
    }

}