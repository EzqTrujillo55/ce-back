<?php

namespace App\Controller;
use App\Entity\Ruta;
use Doctrine\Common\Collections\Criteria;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use PDO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManagerInterface;


/**
 * Class DefaultController
 * @package App\Controller
 * @ApiResource
 */


/*
DefaultController, contiene endpoints que se usan de forma general en el sistema,
principalmente Sps, Generación de reportes.
*/
class DefaultController extends AbstractController
{
    //Importación del Trait Globales (Contiene funciones globales como la conexion a BDD, etc)
    use Globales;

    /**
     * @Route("/", name="homepage", methods={"GET"})
     */
    public function index(): Response
    {

        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/api/busquedaRuta/{mensajero}", name="busquedaRuta", methods={"GET"})
     */
    public function busquedaRuta($mensajero){
        $repository = $this->getDoctrine()->getRepository(Ruta::class);
        $rutas = $repository->findOneBy(['mensajero' => $mensajero]);
        $response = new Response(json_encode($rutas));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


}
