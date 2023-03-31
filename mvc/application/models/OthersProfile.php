
<?php
class OthersProfile extends ConnectDB{
  public static $userId;
  public static $profilePic;
  public static $name;
  public static $emailId;
  public static $bio;
  public static $postNo;
  public static $postContent = array();
  public static $postImage = array();

  public function fetchData($userId){
    $sql = "select * from user_details where binary userId='" . $userId . "';";
    $result = $this->query($sql);
    while($row = $result->fetch_assoc()){
      OthersProfile::$userId = $userId ;
      OthersProfile::$name = ucwords($row["fName"]) .  " " . ucwords($row["lName"]);
      OthersProfile::$profilePic = $row["profilePic"];
      OthersProfile::$emailId = $row["emailId"];
      OthersProfile::$bio = $row["bio"];
    }
    $this->fetchPostData();
  }
  public function fetchPostData()
  {
    $sql = "SELECT * FROM post where post.postAuthorId= '". OthersProfile::$userId ."'  order by postId desc ;";
    try {
      $result = $this->query($sql);
      OthersProfile::$postNo = $result->num_rows;
      $i = 0;
      while ($row = $result->fetch_assoc()) {
        OthersProfile::$postImage[$i] = $row["postImage"];
        OthersProfile::$postContent[$i++] = $row["postContent"];
      }
    } catch (exception $e) {
      echo "No more Posts.";
    }
  }
}
?>