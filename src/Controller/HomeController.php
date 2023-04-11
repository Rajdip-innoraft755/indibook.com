<?php

namespace App\Controller;

use Exception;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * HomeController
 *
 * This controller is to manage the register and login process.
 *
 * @author rajdip <rajdip.roy@innoraft.com>
 */
class HomeController extends AbstractController
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
   *
   * @Route("/", name="index")
   *  This route to show the first page when user enters the url of the project.
   *
   * @return Response
   *  The response is the login page .
   */
  public function index(): Response
  {
    return $this->render("login.html.twig");
  }
  /**
   * @Route("/login")
   *  This route to take user credentials and checks in database whether those
   *  are valid or not , if the credentials are valid then send the user to the
   *  dashboard page otherwise return to the login page with error message.
   *
   * @param object $rq
   *  This Request object is to handles the user credentials.
   *
   * @return Response
   *  Based on the validation the response is to either dashboard page or
   *  the login page with the proper error messages.
   */
  public function login(Request $rq): Response
  {
    $data = $rq->request->all();
    $user = $this->em->getRepository(User::class)->findOneBy(
      array(
        "userId" => $data["userId"],
        "password" => md5($data["password"])
      )
    );
    if ($user != NULL) {
      setcookie("userId", $data["userId"]);
      setcookie("active", TRUE);
      return $this->redirect("/dashboard");
    } else {
      return $this->render(
        "login.html.twig",
        array(
          "loginErr" => "* Invalid Credentials ."
        )
      );
    }
  }
  /**
   *
   * @Route("/registerview", name="registerview")
   *  This route to send user to send user to user registeration page.
   *
   * @return Response
   *  The response is to registration page.
   *
   */
  public function registerview(): Response
  {
    return $this->render("register.html.twig");
  }
  /**
   * @Route("/register", name="register")
   *  This route to take user input data and validate those data and
   *  store the user data in database if the all the data are valid and send
   *  the user to the login page otherwise
   *  return to the registration page with the error .
   *
   * @param object $rq
   *  This Request object is to handles the user input data.
   *
   * @return Response
   *  Based on the validation the response is to either login page or
   *  the restration page with the proper error messages.
   */
  public function register(Request $rq): Response
  {
    //Error array is initialized to store the error messages based on
    //the validate function .
    $error = [];
    $data = $rq->request->all();
    $image = $rq->files->get('imgUpload');
    $error = $this->validate($data);
    $filepath = $this->imgStoring($image, $data["userId"]);
    if ($error == NULL && $filepath != FALSE) {
      $user = new User();
      $user->setUserId($data["userId"]);
      $user->setUniqueId($this->generateUniqueId($data["emailId"]));
      $user->setFName($data["fName"]);
      $user->setLName($data["lName"]);
      $user->setEmailId($data["emailId"]);
      $user->setPassword(md5($data["password"]));
      $user->setProfilePic($filepath);
      if (!empty($data["cookie"])) {
        $user->setCookie($data["cookie"]);
      } else {
        $user->setCookie("decline");
      }
      $this->em->persist($user);
      $this->em->flush();
      return $this->redirect("/");
    }
    return $this->render("register.html.twig", array("error" => $error));
  }

  /**
   * validate
   *  This method checks the whether the user gives the valid inputs or not
   *  and stores the errors in an array and returned it to the calling method.
   *
   * @param  array $data
   *  This method accepts user data in form of an array as parameter.
   *
   * @return array
   *  This method returns the errors in form an array
   */
  public function validate(array $data): array
  {
    //Initialize error array
    $error = [];
    //checks whether the first name contains only alphabet or not .
    //If first name contains other than alphabets then store the error .
    if (!(preg_match("/^[a-zA-Z ]*$/", $data["fName"]))) {
      $error["fName"] = "* first name only contains alphabet.";
    }
    //checks whether the last name contains only alphabet or not .
    //If last name contains other than alphabets then store the error .
    if (!(preg_match("/^[a-zA-Z ]*$/", $data["lName"]))) {
      $error["lName"] = "* last name only contains alphabet.";
    }
    //checks whether the email id is in valid format or not .
    //If email id is not in valid format then store the error .
    if (!(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $data["emailId"]))) {
      $error["emailId"] = "* not a valid email.";
    }
    //checks whether the user id already taken by some other users or not.
    //If the user id is not free then store the error.
    if ($this->em->getRepository(User::class)->findBy(array("userId" => $data["userId"])) != NULL) {
      $error["userId"] = "* UserId already exists.";
    }
    //checks whether the password follows the following checkpoints or not:
    //more than 8 characters
    //atleast one uppercase and one lowercase and one digit
    //and one special characters(@, $, #, !, %, *, ?, &).
    //If the password does not match these conditions then store the error.
    if (!(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@#$!%*?&]{8,}$/", $data["password"]))) {
      $error["password"] = "* weak password.";
    }
    return $error;
  }

  /**
   * imgStoring
   *  This method is used to store the user profile picture in local storage.
   *  And returns the filepath to store that in database.
   *
   * @param $image
   *  Accepts the HTTPFoundation files object
   *
   * @param $userId
   *  Accepts the user id of perticular user.
   *
   * @return string
   *  Returns the filepath of the stored profile picture.
   */
  public function imgStoring($image, $userId)
  {
    if ($image != NULL) {
      $targetFile = $userId . "-profile-pic-" . $image->getClientOriginalName();
      $image->move("assets/img/", $targetFile);
      return "/assets/img/" . $targetFile;
    } else {
      return "/assets/img/default-dp.jpg";
    }
  }
  /**
   * generateUniqueId
   *
   *  This method geneate a unique Id for the user which stores the emailId
   *  and the time of registration.
   *
   * @param  string $email
   *  Accepts the user email as parameter.
   *
   * @return string
   *  Returns the generated uniqueId for the user.
   */
  public function generateUniqueId(string $email): string
  {
    $t = time();
    return date("Y-m-d H:i:s", $t) . $email;
  }
  /**
   * @Route("/logout", name = "logout")
   *  This route destroy the cookies which are set at the time of login and
   *  logout the user and returns to the login page.
   *
   * @return Response
   *  Returns the response to login page.
   */
  public function logout(): Response
  {
    setcookie("active","",0);
    setcookie("userId","",0);
    return $this->redirect("/");
  }
}
?>

