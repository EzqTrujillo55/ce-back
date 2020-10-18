<?php

namespace App\Entity;

use App\Repository\MensajeroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MensajeroRepository::class)
 * @ApiResource
 */
class Mensajero
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $cedula;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups({"ruta"})
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups({"ruta"})
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $tipoVehiculo;

    /**
     * @ORM\Column(type="string", length=450, nullable=true)
     */
    private $descripcionVehiculo;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $placa;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=Ruta::class, mappedBy="mensajero")
     */
    private $rutas;

    public function __construct()
    {
        $this->rutas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCedula(): ?string
    {
        return $this->cedula;
    }

    public function setCedula(?string $cedula): self
    {
        $this->cedula = $cedula;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(?string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getTipoVehiculo(): ?string
    {
        return $this->tipoVehiculo;
    }

    public function setTipoVehiculo(?string $tipoVehiculo): self
    {
        $this->tipoVehiculo = $tipoVehiculo;

        return $this;
    }

    public function getDescripcionVehiculo(): ?string
    {
        return $this->descripcionVehiculo;
    }

    public function setDescripcionVehiculo(?string $descripcionVehiculo): self
    {
        $this->descripcionVehiculo = $descripcionVehiculo;

        return $this;
    }

    public function getPlaca(): ?string
    {
        return $this->placa;
    }

    public function setPlaca(?string $placa): self
    {
        $this->placa = $placa;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

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

    /**
     * @return Collection|Ruta[]
     */
    public function getRutas(): Collection
    {
        return $this->rutas;
    }

    public function addRuta(Ruta $ruta): self
    {
        if (!$this->rutas->contains($ruta)) {
            $this->rutas[] = $ruta;
            $ruta->setMensajero($this);
        }

        return $this;
    }

    public function removeRuta(Ruta $ruta): self
    {
        if ($this->rutas->contains($ruta)) {
            $this->rutas->removeElement($ruta);
            // set the owning side to null (unless already changed)
            if ($ruta->getMensajero() === $this) {
                $ruta->setMensajero(null);
            }
        }

        return $this;
    }
}
