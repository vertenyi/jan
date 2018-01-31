<?php 
class Cat extends Db{
	protected function getAllCategory(){
		$data = $this->inquery('*','category');
		return $data;
	}
	protected function getCategory($id){
		$sql = "SELECT * FROM category WHERE id = '$id'";
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
class SelectCategory extends Cat{
	public function __construct($action){
		$result = $this->getAllCategory();
		echo '<form name="selectcategoryform" method="post" action="'.$action.'"><select name="selectcategory">';
		foreach($result as $row){
			echo '<option value="'.$row['id'].'">'.$row['title'].' ('.$row['id'].')</option>';
		}
		echo '</select><input type="submit"></form>';
	}	
}

?>