<?php

  class Dashboard extends ConnectDB{

    public static $userName;
    public static $postNo;
    public static $postAutor = array();
    public static $postContent = array();
    public static $activeUserName = array();
    public static $activeUserNo;
    public function fetchData(){
      $this->fetchUserData();
      $this->fetchPostData();
      $this->activeUser();
    }

    public function fetchUserData(){
      $sql = "select * from user_details where userId='" . $_SESSION["userId"] . "';";
      $result = $this->query($sql);
      while($row = $result->fetch_assoc()){
        Dashboard::$userName = ucwords($row["fName"] . " " . $row["lName"]);
        $_SESSION["userName"]=Dashboard::$userName;
      }
    }

    public function fetchPostData() {
      $sql = "SELECT * FROM post order by postId desc;";
      $result = $this->query($sql);
      Dashboard::$postNo = $result->num_rows;
      $i=0;
      while($row = $result->fetch_assoc()){
        Dashboard::$postAutor[$i] = $row["postAuthor"];
        Dashboard::$postContent[$i++] = $row["postContent"];
      }
    }

    public function activeUser(){
      $sql = "select fName,lName from user_details where userId !='". $_SESSION["userId"] ."';";
      $result = $this->query($sql);
      Dashboard::$activeUserNo = $result->num_rows;
      $i=0;
      while($row = $result->fetch_assoc()){
        Dashboard::$activeUserName[$i++] = ucwords($row["fName"] . " " .$row["lName"]);
      }
    }
  }
  

?>
