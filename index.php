<?php 

class demo
{
	public $con;

	function __construct()
	{
		$this->con = mysqli_connect('localhost','root','','ajax_login');
	}
	function get($tbl_name)
	{ 
		
		$query = "select * from $tbl_name";
		$data = mysqli_query($this->con,$query);
		return $data;
	}

	function get_where($tbl_name,$field,$value)
	{
		echo $query = "select * from $tbl_name where $field = $value";
		$data = mysqli_query($this->con,$query);
		return $data;
	}

	function insert($tbl_name,$data)
	{
		$ins_query = "insert into $tbl_name(".implode(',', array_keys($data)).") values ('".implode(",",array_values($data))."')";
		mysqli_query($this->con,$ins_query); 
	}
}

$n1 = new demo();


$demo_insert = array('email' => 'demo@gmail.com');
$n1->insert('user',$demo_insert);

$demo = $n1->get('user');

 ?>

 <table>
 	<th>Id</th>
 	<th>email</th>
 	<?php while($row = mysqli_fetch_assoc($demo)){ ?>

 		<tr>
 			<td><?php echo $row['id'] ?></td>
 			<td><?php echo $row['email'] ?></td>
 		</tr>

 	<?php } ?>
 </table>
