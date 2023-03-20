<?php

  class Dashboard extends ConnectDB{
    public static $userName;
    public static $userProfilePic;
    public static $postNo;
    public static $postAutor = array();
    public static $postAuthorProfilePic = array();
    public static $postContent = array();
    public static $activeUserName = array();
    public static $activeUserNo;
    public static $activeUserProfilePic = array();
    public function fetchData(){
      $this->fetchUserData();
      $this->fetchPostData();
      $this->activeUser();
    }
    public function fetchUserData(){
      $sql = "select * from user_details where binary userId='" . $_SESSION["userId"] . "';";
      $result = $this->query($sql);
      while($row = $result->fetch_assoc()){
        Dashboard::$userName = ucwords($row["fName"] . " " . $row["lName"]);
        Dashboard::$userProfilePic = "/".$row["profilePic"];
        $_SESSION["userName"]=Dashboard::$userName;
      }
    }

    public function fetchPostData() {
      $sql = "SELECT * FROM post,user_details where post.postAuthorId=user_details.userId order by postId desc;";
      $result = $this->query($sql);
      Dashboard::$postNo = $result->num_rows;
      $i=0;
      while($row = $result->fetch_assoc()){
        Dashboard::$postAutor[$i] = $row["postAuthor"];
        Dashboard::$postContent[$i] = $row["postContent"];
        Dashboard::$postAuthorProfilePic[$i++] = "/".$row["profilePic"];
      }
    }

    public function activeUser(){
      $sql = "select * from user_details ;";
      $result = $this->query($sql);
      Dashboard::$activeUserNo = $result->num_rows;
      $i=0;
      while($row = $result->fetch_assoc()){
        Dashboard::$activeUserName[$i] = ucwords($row["fName"] . " " .$row["lName"]);
        Dashboard::$activeUserProfilePic[$i++] = "/".$row["profilePic"];
      }
    }
  }
  

?>
