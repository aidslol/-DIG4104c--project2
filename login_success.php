<? 
session_start();
if( !isset($_SESSION['myusername'])){
header("location:main_login.php");
}
?>


<html>
<body>
Login Successful
</body>
</html>