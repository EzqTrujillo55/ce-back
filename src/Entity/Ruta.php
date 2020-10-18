<?php

namespace App\Entity;

use App\Repository\RutaRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ORM\Entity(repositoryClass=RutaRepository::class)
 * @ApiResource(normalizationContext={"groups"={"ruta"}})
 */
class Ruta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"ruta"})
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha;

    /**
     * @Groups({"ruta"})
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $status;

    /**
     * @Groups({"ruta"})
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $detalle;

    /**
     * @ORM\ManyToOne(targetEntity=Mensajero::class, inversedBy="rutas")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Groups({"ruta"})
     *
     */
    private $mensajero;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDetalle(): ?string
    {
        return $this->detalle;
    }

    public function setDetalle(?string $detalle): self
    {
        $this->detalle = $detalle;

        return $this;
    }

    public function getMensajero(): ?Mensajero
    {
        return $this->mensajero;
    }

    public function setMensajero(?Mensajero $mensajero): self
    {
        $this->mensajero = $mensajero;

        return $this;
    }
}
