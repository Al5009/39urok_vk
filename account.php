<?php 
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', '39urok');
	$query = mysqli_query($con, "SELECT * FROM users WHERE id={$_SESSION['id']}");
	$stroka = $query->fetch_assoc();
 ?>
<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<meta charset="utf-8">
 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 	<style type="text/css">
 		.search-input{
			border-radius: 15px;
			border:none;
			padding-top: 5px;
			padding-bottom: 5px;
			padding-left: 10px;		
			background: #224b7a;
			color: white;
			outline: none;
			width: 250px;
		}
 	</style>
 </head>
 <body>

<div class="col-12" style="background-color: #4680C2">
	<div class="col-8 mx-auto">
		<div class="row">
			<div class="col-2">
				<img src="img/vk.png" class="w-25">
			</div>
			<div class="col-8">
				<input class="mt-1 search-input" placeholder="Поиск" >
			</div>
		</div>
	</div>
</div>

<div class="col-8 mx-auto">
	<div class="row">
		<div class="d-flex">
			<div class="col-2">
				<h6 style="color: #4680C2">Моя страница</h6>
				<h6 style="color: #4680C2">Главная</h6>
				<h6 style="color: #4680C2">Друзья</h6>
				<h6 style="color: #4680C2">Группы</h6>
			</div>
			<div>
				<div class="d-flex">
					<div class="col-3 text-center" style="background: white">
						<div>
							<?php echo "<img src=" . $stroka['avatar'] . " class='w-100 img'>" ?>
							<div style="background-color: rgba(0,0,0,0.7)">
								<p data-toggle="modal" data-target="#exampleModal" class="text-white update">Обновить фотографию</p>
							</div>
						</div>
						

						<button class="btn btn-primary mt-3">Редактировать</button>
					</div>
					<div class="col-7 pt-3" style="background: white">
						<div class="col-12 border-bottom" >
							<h5><?php echo $stroka['name'] . " " . $stroka['surname'] ?></h5>
							<p class="text-secondary">Изменить статус</p>
							<p><?php echo 'Город: ' . $stroka['city']?></p>
							<p><?php echo 'Образование: ' . $stroka['education']?></p>
						</div>
						<div class="d-flex">
							<form method="POST" action="insert.php" enctype="multipart/form-data">	
								<input type="" name="text" class="form-control">
								<input type="file" name="photo"  placeholder="Выбрать файл">
								<button class="btn btn-primary mt-3">Сохранить и продолжить</button>
							</form>
						</div>
						<div style="background: white;" class="col-11 mx-auto">
						<?php 
						$room = mysqli_query($con, "SELECT * FROM posts WHERE id_user={$_SESSION['id']}");
						for ($i=mysqli_num_rows($room); $i > 0 ; $i--) { 
							$artur = $room->fetch_assoc();
						 ?>

							<div>
								<div><p><?php echo $artur['text'] ?></p></div>
								<div style="height:300px; background-image:url(<?php echo $artur['img'] ?>); background-size: cover; background-position:center"></div>
							</div>

						<?php 
						}
						?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<!--модальное окно-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Загрузка новой фотографии</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p>Друзьям будет проще узнать Вас, если Вы загрузите свою настоящую фотографию.
		Вы можете загрузить изображение в формате JPG, GIF или PNG.</p>
		<form method="POST" action="updatePhoto.php" enctype="multipart/form-data">	
			<input type="file" name="photo"  placeholder="Выбрать файл">
			<input class="d-none" name="id"  placeholder="" value="<?php echo $stroka['id'] ?>" >
			<button class="btn btn-primary mt-3">Сохранить и продолжить</button>
		</form>
		
      </div>
      <div class="modal-footer">
        
        <p>Если у Вас возникают проблемы с загрузкой, попробуйте выбрать фотографию меньшего размера.</p>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

 </body>
 </html>