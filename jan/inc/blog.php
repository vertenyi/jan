<?php 
class Blog extends Db{
	protected function getAllBlog(){
		$sql = "SELECT * FROM blog";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}
	protected function getBlogItem($id){
		$sql = "SELECT * FROM blog WHERE id = '$id'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}
	protected function getBlogByCat($id){
		$sql = "SELECT * FROM blog WHERE cat_id = '$id'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0){
			while ($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}
}
class DisplayBlog extends Blog{
	public function showAllBlog(){
		$result = $this->getAllBlog();
		echo '<table class="sum"><tr><td>id</td><td>title</td><td>Blog</td></tr>';
		foreach($result as $row){
			echo '<tr><td>' . $row['id'].'_'. $row['cat_id'].'</td><td>'.$row['title'].'</td><td>'.$row['text'].'</td></tr>';
		}
		echo '</table>';
	}
	public function showBlogItem($id){
		$result = $this->getBlogItem($id);
		foreach($result as $row){
			echo '<article id="'.$row['id'].'">';
			echo '<h2>' . $row['id'].'_'. $row['cat_id'].' '.$row['title'].'</h2><div class="text">'.$row['text'].'</div>';
			echo '</article>';
		}
	}
	public function showBlogByCat($id){
		$result = $this->getBlogByCat($id);
		foreach($result as $row){
			echo '<article id="'.$row['id'].'">';
			echo '<h2>' . $row['id'].'_'. $row['cat_id'].' '.$row['title'].'</h2><div class="text">'.$row['text'].'</div>';
			echo '</article>';
		}
	}
}
class SelectTitle extends Blog{
	public function __construct($action){
		$result = $this->getAllBlog();
		echo '<form name="selecttitleform" method="post" action="'.$action.'"><select name="selecttitle">';
		foreach($result as $row){
			echo '<option value="'.$row['id'].'">'.$row['title'].' ('.$row['id'].')</option>';
		}
		echo '</select><input type="submit"></form>';
	}	
}

?>