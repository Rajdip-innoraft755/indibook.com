<?php

class MakePost extends ConnectDB {
  public $postImage;
  public $postId;
  public function addPost($postContent,$postImage)
  {
    $postContent = htmlspecialchars($postContent, ENT_QUOTES);
    $t = time();
    $this->postId = date("Y-m-d H:i:s", $t) . " " . $_SESSION["userId"];
    $this->imgStoring($postImage);
    $postAuthorId = $_SESSION["userId"];
    $sql = "insert into post (postId,postContent,postImage,postAuthorId) values('$this->postId','$postContent','$this->postImage','$postAuthorId');";
    $this->query($sql);
    return true;
  }
  public function imgStoring($postImage){
		if(!empty($postImage["name"])){
			$target_file = "assets/img/" . $this->postId . $postImage["name"];
			move_uploaded_file($postImage["tmp_name"],$target_file);
			$this->postImage = $target_file;
		}
	}
}
?>