<?php

namespace App\Controller;

use App\Entity\Apartment;
use App\Entity\Prospect;
use App\Repository\ProspectRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AddApartement
{
    public function __invoke(int $id, Apartment $data, ProspectRepository $prospectRepository): Apartment
    {
        $prospect = $prospectRepository->find($id);

        if (!$prospect instanceof Prospect) {
            throw new NotFoundHttpException('Prospect class ' . $id . ' not found');
        }

        $data->setProspect($prospect);

        return $data;
    }
}
