<?php

namespace App\Controller;

use App\Entity\UserDetails;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
  public $db;
  public function __construct(EntityManagerInterface $em){
    $this->db = $em;
  }
  /**
   * @Route("/")
   *
   * index
   *
   * @return Response
   */
  public function index(): Response
  {
    return $this->render("login.html.twig");
  }
  /**
   * @Route("/registerview")
   */
  public function registerview(): Response
  {
    return $this->render("register.html.twig");
  }
  /**
   * @Route("/register")
   */
  public function register()
  {
    $error = $this->validate($_POST);
    $filepath = $this->imgStoring($_FILES,$_POST["userId"]);
    if($error == NULL && $filepath != FALSE) {
      $user = new UserDetails();
      $user->setFname($_POST["fName"]);
      $user->setLname($_POST["lName"]);
      $user->setUserid($_POST["userId"]);
      $user->setEmailid($_POST["emailId"]);
      $user->setPassword($_POST["password"]);
      $user->setProfilepic($filepath);
      if(!empty($_POST["cookie"])){
        $user->setCookie($_POST["cookie"]);
      }
      else{
        $user->setCookie("decline");
      }
    }
  }
  public function validate($post){
    $error = [];
  	if (!(preg_match("/^[a-zA-Z ]*$/", $post["fName"]))) {
			$error["fName"] = "* first name only contains alphabet." ;
		}
		if (!(preg_match("/^[a-zA-Z ]*$/", $post["lName"]))) {
			$error["lName"] = "* last name only contains alphabet.";
		}
		if (!(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $post["emailId"]))) {
			$error["email"] = "* not a valid email.";
		}
    if( $this->db->getRepository(UserDetails::class)->findBy(array("userid" => $post["userId"])) != NULL) {
      $error["userId"] = "* UserId already exists.";
    }
		if (!(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@#$!%*?&]{8,}$/", $post["password"]))) {
			$error["password"] = "* weak password.";
		}
		return $error;
	}
  public function imgStoring($imgUpload,$userId)
  {
    if (!empty($imgUpload["name"])) {
      $target_file = "assets/img/" .$userId . "-profile-pic-" . $imgUpload["name"];
      try {
        move_uploaded_file($imgUpload["tmp_name"], $target_file);
        return  "/" . $target_file;
      }
      catch(Exception $e) {
        return FALSE;
      }
    }
    else {
      return "/assets/img/default-dp.jpg";
    }
  }
  /**
   * @Route("/login")
   */
  public function login(): Response
  {
    $user = $this->db->getRepository(UserDetails::class)->findOneBy(
      array(
        "userid" => $_POST["userId"],
        "password" => md5($_POST["password"])
      )
    );
    if ($user != NULL) {
      return $this->render("dashboard.html.twig");
    }
    else {
      return $this->render(
        "login.html.twig",
        array(
          "loginErr" => "* Invalid Credentials ."
        )
      );
    }
  }
}
?>
