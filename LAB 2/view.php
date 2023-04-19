<?php 
session_start();
include "db_conn.php"; 
 $sql = "SELECT * FROM images";
 $result = mysqli_query($conn,  $sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<script src="https://kit.fontawesome.com/202dba6802.js" crossorigin="anonymous"></script>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			min-height: 100vh;
			background-color: #F0F2F5;
			background-size: cover;
		}
		.alb {
			width: 200px;
			height: 200px;
			padding: 5px;
		}
		.alb img {
			width: 100%;
			height: 100%;
		}
		a {
			text-decoration: none;
			color: black;
		}
		.topy-list div{
			height: 500px;
			width: 500px;
			margin-top:150px ;
		}
		img{
			height: 100%;
			width: 100%;
			border-radius: 5%;
		}
		.item{
			grid-area:header;
			background-color: lightpink;
			width:500px;
			height: 40px;
		}
	</style>
</head>
<body>
     <a href="index.php">&#8592;</a>
 <?php 
	 $imcc=200;
	 $cnt=0;
	 $ids=1;
	 $idh=300;
	 $idss=1000;
	 $idsc=500;
	 $idssch=600;
	 $idscp=700;
	 $butid=2000;
	 $commid=3000;
?>
  <div id="topy">
        <div class="container">
			<div class="item">
            <h1 class="sub-title" align="center" style="color:blue">Posts</h1>
			</div>
             <div class="topy-list">
             <?php 
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div>
        
                    <h2 align="center"><?php echo $row['full_name'];?>   </h2>
                    <img src="uploads/<?php echo $row['image_url'];?>" alt="">
                    <form action="likecom.php" method="post">

						<?php 
						$ni=$row['image_url'];
						$_SESSION["imgno"]=mysqli_fetch_array(mysqli_query($conn,"SELECT imgno FROM images where image_url='$ni'"))[0]; ?>
						<button type='submit' name="<?php echo $butid; ?>"><i class="fa-regular fa-heart" style="color: #000;"></i></button>
					</form>
                    
                    <i class="fa-regular fa-comment" style="color: #000;"></i>
                    <br>
                    <span><?php echo $row['likes']." ";?> Likes</span>
					<form action="likecom.php" method='post'>
                        <table>
                            <tr>
                                <td><label for="">Add comment:</label></td>
                                <td><input type="text" name="<?php echo $idsc;?>" id="<?php echo $idsc;?>"></td>
                                <td><button  type='submit' name="<?php echo $commid;?>">Post</button></td>

                            </tr>
                        </table>
                        </form>
                    <nav class="nene">
						<table>
							<tr>
                        <td><h4 style="margin-top:-2%;background-color:#f5ed8a;display: inline-block;" id="<?php echo $idssch;?>"><?php echo $row['com'];?> </h4></td>
                        <td><p style="background-color:#f5ed8a;margin-top:-3%;" id="<?php echo $idscp;?>"><?php echo $row['comm'];?></p></td>
						</tr></table>
                    </nav>
                </div>
                <?php 
			$ids+=1;$idss+=1; $idsc+=1;
			$idssch+=1;$butid+=1;$commid+=1;
			$idscp+=1;$idh+=1;$cnt+=1;$imcc+=1;}?>
        </div>
    </div>
    </div>
     
</body>
</html>