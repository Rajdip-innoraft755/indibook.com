<?php

class Dashboard extends ConnectDB
{
  public static $userName;
  public static $userProfilePic;
  public static $postNo;
  public static $postAuthorId = array();
  public static $postAuthor = array();
  public static $postAuthorProfilePic = array();
  public static $postImage = array();
  public static $postContent = array();
  public static $activeUserId = array();
  public static $activeUserName = array();
  public static $activeUserNo;
  public static $activeUserProfilePic = array();
  public function fetchData($limit)
  {
    $this->fetchUserData();
    $this->fetchPostData($limit);
    $this->activeUser();
  }
  public function fetchUserData()
  {
    $sql = "select * from user_details where binary userId='" . $_SESSION["userId"] . "';";
    $result = $this->query($sql);
    while ($row = $result->fetch_assoc()) {
      Dashboard::$userName = ucwords($row["fName"] . " " . $row["lName"]);
      Dashboard::$userProfilePic = "/" . $row["profilePic"];
      $_SESSION["userName"] = Dashboard::$userName;
    }
  }

  public function fetchPostData($limit)
  {
    $sql = "SELECT * FROM post,user_details where post.postAuthorId=user_details.userId order by postId desc ;";
    try {
      $result = $this->query($sql);
      Dashboard::$postNo = $result->num_rows;
      $i = 0;
      while ($row = $result->fetch_assoc()) {
        Dashboard::$postAuthorId[$i] = $row["userId"]; 
        Dashboard::$postAuthor[$i] = $row["fName"] . " " . $row["lName"];
        Dashboard::$postImage[$i] = $row["postImage"];
        Dashboard::$postContent[$i] = $row["postContent"];
        Dashboard::$postAuthorProfilePic[$i++] = "/" . $row["profilePic"];
      }
    } catch (exception $e) {
      echo "No more Posts.";
    }
  }

  public function activeUser()
  {
    $sql = "select * from user_details where userId != '" . $_SESSION["userId"] . "';";
    $result = $this->query($sql);
    Dashboard::$activeUserNo = $result->num_rows;
    $i = 0;
    while ($row = $result->fetch_assoc()) {
      Dashboard::$activeUserId[$i] = $row["userId"];
      Dashboard::$activeUserName[$i] = ucwords($row["fName"] . " " . $row["lName"]);
      Dashboard::$activeUserProfilePic[$i++] = "/" . $row["profilePic"];
    }
  }
}


?>