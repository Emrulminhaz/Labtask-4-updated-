<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>LabTask-4</title>
</head>
<body>

	<?php
		class registration{
			private $name;
			private $email;
			private $birthdate;
			private $degree;
			private $gender;
			private $BLOOD;
		
		
			function __construct(){
				$name="";
				$email="";
				$date="";
				$degree="";
				$gender="";
				$BLOOD="";
			}
			function set_name($name){
				$this->name=$name;
			}
			function get_name(){
				return $this->name;
			}
			
			function set_email($email){
				$this->email=$email;
			}
			function get_email(){
				return $this->email;
			}
			
			function set_birthdate($birthdate){
				$this->birthdate=$birthdate;
			}
			function get_birthdate(){
				return $this->birthdate;
			}
			
			function set_degree($degree){
				$this->degree=$degree;
			}
			function get_degree(){
				return $this->degree;
			}
			
			function set_gender($gender){
				$this->gender=$gender;
			}
			function get_gender(){
				return $this->gender;
			}
			
			function set_BLOOD($BLOOD){
				$this->BLOOD=$BLOOD;
			}
			function get_BLOOD(){
				return $this->BLOOD;
			}
			
			
		
		}
		$registration=new registration();
		
		$nameErr = $emailErr = $birthdateErr=$degreeErr= $genderErr=$BLOODErr= $monthErr = $yearErr = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["name"])){
				$nameErr = "Name is required";
			} 
			else {
				$registration->set_name($_POST["name"]);
			}
			if (empty($_POST["email"])){
				$emailErr = "Email is required";
			} 
			else {
				$registration->set_email($_POST["email"]);
			}
			
			if (empty($_POST["birthdate"])){
				$dateErr = "Date is required";
			} 
			else {
				$registration->set_birthdate($_POST["birthdate"]);
			}
			
			
			if (empty($_POST["gender"])){
				$genderErr = "Gender is required";
			} 
			else {
				$registration->set_gender($_POST["gender"]);
			}
			
			if (($_POST["BLOOD"])=="none"){
				$BLOODErr = "BloodGroup is required";
			} 
			else {
				$registration->set_BLOOD($_POST["BLOOD"]);
			}
			
			if (empty($_POST["SSC"]) || empty($_POST["HSC"])){
				$degreeErr = "SSC and HSC are requird";
			} 
			else {
				
				$degree = $_POST["SSC"].",".$_POST["HSC"];
				$registration->set_degree($degree);
				if(!empty($_POST["BSC"]))
				{
					$degree =$registration->$get_degree().", ".$_POST["BSC"];
					$registration->set_degree($examm);
				}
					
				
				if(!empty($_POST["MSC"]))
				{
					$degree =$registration->$get_degree().", ".$_POST["MSC"];
					$registration->set_degree($degree);
				}
			}
			
			
		}
		
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table>
			<tr>
				<td><b>Name :</b></td>
				<td><input type="text" name="name"/></td>
				<td><span style="color:red;">* <?php echo $nameErr;?></span></td>
			</tr>
			<tr>
				<td><b>Email :</b></td>
				<td><input type="email" name="email"/></td>
				<td><span style="color:red;">* <?php echo $emailErr;?></span></td>
			</tr>
			<tr>
				<td><b>Date of Birth :</b></td>
				<td><input type="Date" name="birthdate"/></td>
				<td><span style="color:red;">* <?php echo $birthdateErr;?></span></td>
			</tr>
			<tr>
				<td><b>Gender :</b></td>
				<td>
					<input type="radio" value="Male" name="gender"/>Male
					<input type="radio" value="Female" name="gender"/>Female
					<input type="radio" value="Other" name="gender"/>Others</td>
				<td><span style="color:red;">* <?php echo $genderErr;?></span></td>
			</tr>
			<tr>
				<td><b>Degree :</b></td>
				<td>
					<input type="checkbox" name="SSC" value="SSC"/>SSC
					<input type="checkbox" name="HSC" value="HSC"/>HSC
					<input type="checkbox" name="BSC" value="BSC"/>BSC
					<input type="checkbox" name="MSC" value="MSC"/>MSC
				</td>
				<td><span style="color:red;">* <?php echo $degreeErr;?></span></td>
			</tr>
			<tr>
				<td><b>Blood Group :</b></td>
				<td>
					<select name="BLOOD">
						<option value="none"></option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select>
				</td>
				<td><span style="color:red;">* <?php echo $BLOODErr;?></span></td>
			</tr>
			<tr>
				<td align="center" ><input type="submit" value="Submit form" name="submit" id="sform"/> <br></td> 
				
				<td align="center"><input type="submit" value="Submit xml" name="submit" id="sxml"/><br></td> 
				<td align="center"><input type="submit" value="Submit file" name="submit" id="sfile"/><br></td> 
				
			</tr>
			
		</table>
		
		<hr/>
		
		
		
		
		
		
		
		
		
		
	</form>
	<br><br>
	<?php
	if($registration->get_name()!="" && $registration->get_email()!="" && $registration->get_birthdate()!="" && $registration->get_degree()!="" && $registration->get_gender()!="" && $registration->get_BLOOD()!="")
		{
			if($_POST["submit"]=="Submit form")
			{
				echo "<h3> Name :". $registration->get_name()."</h3>";
				echo "<h3>Email :". $registration->get_email()."</h3>";
				echo "<h3>Date of Birth :". $registration->get_birthdate()."</h3>";
				echo "<h3>Gender :". $registration->get_gender()."</h3>";
				echo "<h3>Degree :". $registration->get_degree()."</h3>";
				echo "<h3>Blood group :". $registration->get_BLOOD()."</h3>";
				echo "<hr/>";
			}
			
			elseif($_POST["submit"]=="Submit file")
			{
				$filename=$registration->get_name().".txt";
				$myfile = fopen($filename, "w") or die("Unable to open file!");
				
				$txt = "Name :".$registration->get_name()."\n";
				fwrite($myfile, $txt);
				
				$txt = "Email :".$registration->get_email()."\n";
				fwrite($myfile, $txt);
				
				$txt = "Date of Birth :". $registration->get_birthdate()."\n";
				fwrite($myfile, $txt);
				
				$txt = "Gender :". $registration->get_gender()."\n";
				fwrite($myfile, $txt);
				
				$txt = "Degree :". $registration->get_degree()."\n";
				fwrite($myfile, $txt);
				
				$txt = "Blood group :". $registration->get_BLOOD()."\n";
				fwrite($myfile, $txt);
				
				
				
				fclose($myfile);
				
				echo "<h2>"."Read From File"."</h2>";
				
				$myfile = fopen($filename, "r") or die("Unable to open file!");
				
				while(!feof($myfile)) {
					echo fgets($myfile) . "<br>";
				}
				fclose($myfile);
			
			}
		
			else
			{
				//XML file
				$dom = new DOMDocument();

				$dom->encoding = 'utf-8';

				$dom->xmlVersion = '1.0';

				$dom->formatOutput = true;

				$xml_file_name = 'registrations_list.xml';

					$root = $dom->createElement('registrations');

					$registration_node = $dom->createElement('registration');

					$attr_registration_id = new DOMAttr('registration_id', '5467');

					$registration_node->setAttributeNode($attr_registration_id);
					
					

					$child_node_name = $dom->createElement('name', $registration->get_name());

					$registration_node->appendChild($child_node_name);
					

					$child_node_email = $dom->createElement('email', $registration->get_email());

					$registration_node->appendChild($child_node_email);
					
					
					$child_node_birthdate = $dom->createElement('email', $registration->get_birthdate());

					$registration_node->appendChild($child_node_birthdate);
					
					
					
					$child_node_gender = $dom->createElement('email', $registration->get_gender());

					$registration_node->appendChild($child_node_gender);
					
					$child_node_degree = $dom->createElement('email', $registration->get_degree());

					$registration_node->appendChild($child_node_degree);
					
					$child_node_BLOOD = $dom->createElement('email', $registration->get_BLOOD());

					$registration_node->appendChild($child_node_BLOOD);
				

					$root->appendChild($registration_node);

					$dom->appendChild($root);

				$dom->save($xml_file_name);

				echo "$xml_file_name has been successfully created";
			}
			
			
		}
		
	?>
	
</body>
</html>