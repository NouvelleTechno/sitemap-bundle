<?php

namespace NouvelleTechno\SitemapBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class SitemapController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entm;
    private $twig;
    protected $container;
    protected $router;

    public function __construct(EntityManagerInterface $entm, Environment $twig, ContainerInterface $container, UrlGeneratorInterface $router)
    {
        $this->em = $entm;
        $this->twig = $twig;
        $this->container = $container;
        $this->router = $router;
    }
    /**
     * Shows the sitemap index with links to deeper sitemap sections
     * @Route("/sitemap.xml", name="sitemap", defaults={"_format"="xml"})
     */
    public function indexAction()
    {
        $parameters = $this->container->getParameter('nouvelletechno.sitemap.config');
        $urls = [];
        foreach($parameters['routes'] as $parameter){
            if(!isset($parameter['entity'])){
                $urls[] = ['loc' => $this->router->generate($parameter['route'], [], UrlGeneratorInterface::ABSOLUTE_URL)];
            }
            if(isset($parameter['parameters'])){
                $method = 'get'.ucfirst($parameter['parameters']);
                foreach ($this->entm->getRepository('App:'.$parameter['entity'])->findAll() as $data) {
                    $urls[] = [
                        'loc' => $this->router->generate($parameter['route'], [
                            $parameter['parameters'] => $data->$method(),
                        ], UrlGeneratorInterface::ABSOLUTE_URL)
                    ];
                }
            }
        }

        // Fabrication de la réponse XML
        $response = new Response(
            $this->renderView('@Sitemap/sitemap.xml.twig', compact('urls')),
            200
        );

        // Ajout des entêtes
        $response->headers->set('Content-Type', 'text/xml');

        // On envoie la réponse
        return $response;
    }
}