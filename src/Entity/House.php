<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\HouseRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\AddHouse;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}},
 *     denormalizationContext={"groups"={"write"}},
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
 *          "add_house"={
 *              "method"="POST",
 *              "path"="/prospects/{id}/houses",
 *              "controller"=AddHouse::class,
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
 * @ORM\Entity(repositoryClass=HouseRepository::class)
 */
class House extends Housing
{
}
