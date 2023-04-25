<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>
<body>

<h2>Messages</h2>

<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Info !</strong> Compte Bloquer par Admin, Contacter Support
</div>
<br><br>
<div >
  <a onclick="event.preventDefault();
  document.getElementById('logout-form').submit();" class="btn btn-danger" href="#!"><span class="me-2" data-feather="log-out"></span>Sign out</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>  
</div>
</body>
</html>