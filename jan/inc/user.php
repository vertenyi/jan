<?php 

class User extends Db{
	
	protected function getAllUsers(){
		$sql = "SELECT * FROM user";
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

class ViewUser extends User{
	public function showAllUsers(){
		$datas = $this->getAllUsers();
		echo 'number of users: '.count($datas) .'<table class="sum usertable "><tr><td>#</td><td>e-mail</td><td>username</td><td>password</td></tr>';
		foreach($datas as $data){
			unset($data['pass']);
			echo '<tr><td>'.$data['id'].'</td>'.
				'<td>'.$data['email'].'</td>'.
				'<td>'.$data['user'].'</td>'.
				'<td>expunged</td></tr>';
		}
		echo '</table>';	
	}
}
class ShowAllUsers extends User{
	public function __construct(){
		$datas = $this->getAllUsers();
		echo '<h5><i>number of users: '.count($datas) .'</i></h5><table class="sum usertable "><tr><td>#</td><td>e-mail</td><td>username</td><td>password</td></tr>';
		foreach($datas as $data){
			unset($data['pass']);
			echo '<tr><td>'.$data['id'].'</td>'.
				'<td>'.$data['email'].'</td>'.
				'<td>'.$data['user'].'</td>'.
				'<td>expunged</td></tr>';
		}
		echo '</table>';	
	}
}

?>