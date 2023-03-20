<?php

class MakePost extends ConnectDB {
  public function addPost($postContent)
  {
    $t = time();
    $postId = date("Y-m-d H:i:s", $t) . " " . $_SESSION["userId"];
    $postAuthorId = $_SESSION["userId"];
    $postAuthor = $_SESSION["userName"];
    $sql = "insert into post (postId,postAuthor,postContent,postAuthorId) values('$postId','$postAuthor','$postContent','$postAuthorId');";
    $this->query($sql);
    return true;
  }
}
?>