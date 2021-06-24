<?php

namespace App\Controller;

use App\Entity\House;
use App\Entity\Prospect;
use App\Repository\ProspectRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AddHouse
{
    public function __invoke(int $id, House $data, ProspectRepository $prospectRepository): House
    {
        $prospect = $prospectRepository->find($id);

        if (!$prospect instanceof Prospect) {
            throw new NotFoundHttpException('Prospect class ' . $id . ' not found');
        }

        $data->setProspect($prospect);

        return $data;
    }
}
