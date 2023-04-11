<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
  /**
   * This is a object of EntityManagerInterface class
   * It is to manage persistance and retriveal Entity object from Database.
   *
   * @var object
   */
  public $em;

  /**
   * __construct
   *
   * This constructor initializes object of HomeController Class also provides
   * access to EntityManagerInterface object .
   *
   * @param  object $em
   *  It is to manage persistance and retriveal Entity object from Database.
   *
   * @return void
   *  Constructor returns nothing .
   */
  public function __construct(EntityManagerInterface $em)
  {
    $this->em = $em;
  }
  /**
   * @Route("/dashboard", name = "dashboard")
   */
  public function index(): Response
  {
    if($_COOKIE["active"] == TRUE){
      return $this->render("dashboard.html.twig");
    }
    return $this->redirect("/");
  }
}
