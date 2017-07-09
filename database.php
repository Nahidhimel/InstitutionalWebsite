<?php 
	
	class database{
		private $connection;

		public function openConnect(){
			$this->connection = mysqli_connect('localhost','root','','school');
			if (!$this->connection) {
				die("Database Connection failed ".mysqli_connect_error());
			}

			else{
				$select_db=mysqli_select_db($this->connection, 'school');
				if (!$select_db) {
					die("Database Selection Problem ". mysqli_error($this->connection));
				}

			}
		}

		public function performQuery($qu){
			$result=mysqli_query($this->connection, $qu);
			//echo $qu;

			if (!$result) {
				die("There was an error With The Result ".mysqli_connect_error());
			}

			return $result;
		}

		public function searchResult($studentId){

			$sql="SELECT student.idStudent, student.Name, course.idCourse, course.CourseName, result.grade from student, course, result where student.idStudent=result.stuId and course.idCourse=result.courseId and student.idStudent = $studentId"; 
			//echo $sql;
			$ret = $this->performQuery($sql);


			$i = 0;
			$arr = array(); 

				while($row=mysqli_fetch_assoc($ret)){
					$arr["idStudent"][$i]=$row["idStudent"];
					$arr["Name"][$i]=$row["Name"];
					$arr["idCourse"][$i]=$row["idCourse"];
					$arr["CourseName"][$i]=$row["CourseName"];
					$arr["grade"][$i]=$row["grade"];
					$i++;
				}

				return $arr;
		}

		private function confirm_query($result){
			if (!$result) {
				die("Database Query Failed". mysqli_error());
			}
		}//end of confirm query

		public function fetch_result($result){
			
			return mysqli_fetch_assoc($result);
		}//end of fetch result


		public function last_insertedid(){

			return mysqli_insert_id($this->connection);
		}// end of last insertedid

		public function num_rows($result){

			return mysqli_num_rows($result);

		}//end of num rows

		public function affected_rows(){

			return mysqli_affected_rows($this->connection);
		}//end of affected rows

		public function authentication($username, $password){

			$username = mysqli_real_escape_string($this->connection, $username);
			$sql="SELECT username, password from staff where staff.username ='{$username}' AND staff.password = '{$password}'";
			//$sql0 = "SELECT acess from staff where staff.username ='{$username}' AND staff.password = '{$password}'";

			//echo "$sql";

			$result=$this->performQuery($sql);
			$result=$this->fetch_result($result);
			//$access = $this->performQuery($sql0);
			//$i = 0;

			if ($result == null) {
				die("invalid username/password");
			}
			else{
				session_start();
				$_SESSION['name'] = $username;

				if($username == "Admin" ) {

					//
					header('Location: admin.php');
					// $this->redirect_to("admin.php");
					
				}
				else{
					
					// $this->redirect_to("teacher.php");
					header('Location: teacher.php');
					
				}
			}
		}
		public function redirect_to($address){

			 header("refresh:0;url=".$address);
		}

		public function logout(){
			
				
				session_destroy();
				//session_unset($_SESSION['name']);
				
				header('Location: login.php');
			
		}

		public function add_staff($staffID, $acess, $username, $password, $name, $email, $phone, $address){
			$sql1 = "INSERT into staff VALUES ( {$staffID}, {$acess}, '{$username}', '{$password}', '{$name}',  '{$email}', '{$phone}', '{$address}')";

			$ret = $this->performQuery($sql1);
			return $ret;

		}

		public function addapplicant($name, $fname, $mname, $addr, $aclass, $pca, $pcr, $psa, $email, $phone){
			$sql = "INSERT into admission values( '{$name}', '{$fname}', '{$mname}', '{$addr}', '{$aclass}', '{$pca}', '{$pcr}', '{$psa}', '{$email}', '{$phone}')";

			$result = $this->performQuery($sql);
			return $result;
		}

		public function del_staff($username){
			$sql2= "DELETE from staff where staff.username = '{$username}' ";
			$this->performQuery($sql2);

		}

		public function showstaff(){
			$sql = "SELECT staffID,username, name, email, phone, address from staff order by staffID";

			$result = $this->performQuery($sql);

			$arr = array();
			$i = 0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["staffID"][$i]=$row["staffID"];
				$arr["username"][$i]=$row["username"];
				$arr["name"][$i]=$row["name"];
				$arr["email"][$i]=$row["email"];
				$arr["phone"][$i]=$row["phone"];
				$arr["address"][$i]=$row["address"];
				$i++;
			}
			return $arr;
		}

		public function makeSchedule($staffid, $scheduleid, $courseid, $day){

			$sql = "INSERT into  ssrel VALUES ({$staffid}, {$scheduleid}, {$courseid}, '{$day}')";

			$result = $this->performQuery($sql);
			return $result;
		}

		public function updateresult($studentId, $courseid, $grade){

			$sql = "INSERT into result VALUES ({$courseid}, {$studentId}, {$grade})";
			$result = $this->performQuery($sql);
			return $result;
		}

		public function del_result($studentId){

			$sql = "DELETE from result where result.stuId = {$studentId}";
			$result = $this->performQuery($sql);
			return $result;
		}

		public function showschedule(){
			$sql = "SELECT staffId, scheduleid, schedule, courseid, CourseName, day from  ssrel, schedule, course where ssrel.scheduleid=schedule.idSchedule and ssrel.courseid=course.idCourse";

			$result = $this->performQuery($sql);
			$arr = array();
			$i = 0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["staffId"][$i]=$row["staffId"];
				//$arr["name"][$i]=$row["name"];
				$arr["scheduleid"][$i]=$row["scheduleid"];				
				$arr["schedule"][$i]=$row["schedule"];
				$arr["courseid"][$i]=$row["courseid"];
				$arr["CourseName"][$i]=$row["CourseName"];
				$arr["day"][$i]=$row["day"];
				$i++;
			}
			return $arr;
		}

		public function showtSchedule($staffid){

			$sql = "SELECT staffId, scheduleid, schedule, courseid, CourseName, day from  ssrel, schedule, course where ssrel.scheduleid=schedule.idSchedule and ssrel.courseid=course.idCourse and ssrel.staffId= $staffid ";

			$result = $this->performQuery($sql);
			$arr = array();
			$i = 0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["staffId"][$i]=$row["staffId"];
				//$arr["name"][$i]=$row["name"];
				$arr["scheduleid"][$i]=$row["scheduleid"];				
				$arr["schedule"][$i]=$row["schedule"];
				$arr["courseid"][$i]=$row["courseid"];
				$arr["CourseName"][$i]=$row["CourseName"];
				$arr["day"][$i]=$row["day"];
				$i++;
			}
			return $arr;
		}

		public function updateNotice($noticeId, $nosub, $noticetext, $date){

			$sql = "INSERT into notice values ({$noticeId}, '{$nosub}', '{$noticetext}', '{$date}')";

			$ret = $this->performQuery($sql);
			return $ret;
		}

		public function del_notice($noticeId){
			$sql2= "DELETE from notice where notice.noticeId = '{$noticeId}' ";
			$this->performQuery($sql2);

		}

		public function viewinfo($username){
			$sql = "SELECT * From staff where staff.username = '{$username}'";

			$result=$this->performQuery($sql);
			$result=$this->fetch_result($result);
			return $result;
		}

		public function update_pass($password, $new_password, $re_type){

			if ($new_password == $re_type) {
				$sql = "UPDATE staff set password = '{$new_password}' where password ='{$password}'";

				$result = $this->performQuery($sql);
				return $result;

			}
			else{
				echo "password mis-match";
			}
			
		}

		public function getstudent(){
			$sql = "SELECT * from student";
			$result = $this->performQuery($sql);
			$arr=array();
			$i=0;
			while ($row=mysqli_fetch_assoc($result)) {
				$arr["idStudent"][$i]=$row["idStudent"];
				$arr["Name"][$i]=$row["Name"];
				$i++;
			}
			return $arr;

		}

		public function getclass(){
			$sql = "SELECT * from admissionclass";
			$result = $this->performQuery($sql);
			$arr=array();
			$i=0;
			while ($row=mysqli_fetch_assoc($result)) {
				$arr["Class"][$i]=$row["Class"];
				$arr["Seat"][$i]=$row["Seat"];
				$i++;
			}
			return $arr;

		}

		public function remainingSeat($class){
			$sql = "SELECT * from admission where AdmissionClass = '{$class}'";
			//$sql1 = "SELECT Seat from admissionclass where Class = '{$class}'";

			$result = $this->performQuery($sql);
			//$ret = $this->performQuery($sql1);
			$num = $this->num_rows($result);
			//$num2 = mysqli_fetch_assoc($ret);
			//$num3 = $num2-$num

			return 200-$num;
		}

		public function getscheduledetails(){
			$sql = "SELECT * from schedule";

			$result = $this->performQuery($sql);
			$arr=array();
			$i=0;
			while ($row=mysqli_fetch_assoc($result)) {
				$arr["idSchedule"][$i]=$row["idSchedule"];
				$arr["schedule"][$i]=$row["schedule"];
				$i++;
			}
			return $arr;
		}

		public function getcourse(){

			$sql = "SELECT * from course";

			$result = $this->performQuery($sql);
			$arr=array();
			$i=0;
			while ($row=mysqli_fetch_assoc($result)) {
				$arr["idCourse"][$i]=$row["idCourse"];
				$arr["CourseName"][$i]=$row["CourseName"];
				$i++;
			}
			return $arr;
		}

		public function getNotice(){
			$sql = "SELECT * from notice order by noticeId desc";

			$result = $this->performQuery($sql);
			$arr=array();
			$i=0;
			while ($row=mysqli_fetch_assoc($result)) {
				$arr["noticeId"][$i]=$row["noticeId"];
				$arr["nosub"][$i]=$row["nosub"];
				$arr["noticetext"][$i]=$row["noticetext"];
				$arr["date"][$i]=$row["date"];
				$i++;
			}
			return $arr;
		}

		public function getNoticel(){
			$sql = "SELECT nosub from notice order by noticeId desc limit 4";

			$result = $this->performQuery($sql);
			$arr = array();
			$i = 0;
			while ($row=mysqli_fetch_assoc($result)) {
				$arr["nosub"][$i]=$row["nosub"];
				$i++;
			}
			return $arr;
		}


		public function close_connection(){

			if (isset($this->connection)) {
				mysqli_close($this->connection);

				unset($this->connection);
			}
		}
	}
	$databasecall = new database();
	$databasecall->openConnect();
	//$databasecall->performQuery("SELECT username, password from staff where staff.username ='admin', staff.password = '012345'");
 ?>