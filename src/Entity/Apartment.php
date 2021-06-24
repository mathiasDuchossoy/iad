<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ApartmentRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\AddApartement;

/**
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"read"}},
 *          "denormalization_context"={"groups"={"write"}}
 *     },
 *     collectionOperations={
 *         "get"={
 *              "openapi_context" = {
 *                  "parameters" = {
 *                      {
 *                          "name" = "prospect",
 *                          "in" = "query",
 *                          "required" = true,
 *                          "type" : "integer",
 *                      }
 *                  }
 *               }
 *          },
 *          "add_apartment"={
 *              "method"="POST",
 *              "path"="/prospects/{id}/apartments",
 *              "controller"=AddApartement::class,
 *              "openapi_context" = {
 *                  "parameters" = {
 *                      {
 *                          "name" = "id",
 *                          "in" = "path",
 *                          "required" = true,
 *                          "type" : "integer",
 *                      }
 *                  }
 *              }
 *          },
 *     },
 * )
 * @ORM\Entity(repositoryClass=ApartmentRepository::class)
 */
class Apartment extends Housing
{
}
