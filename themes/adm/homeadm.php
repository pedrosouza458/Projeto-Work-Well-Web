<head>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<div id="logo">
        <span class="" style="margin-left: 40px;">Admin</span>
    
    </div>
    <style>
 * {
    box-sizing: border-box;
}

body {
    background-color: #f6f7fb;
    color: #888da8;
    letter-spacing: 0.2px;
    font-family: 'Poppins', sans-serif;
    padding: 0;
    margin: 0;
}

a,
p,
span,
div,
li,
td {
    font-weight: 300!important;
}

::placeholder {
    color: #ccc !important;
    font-weight: 300;
}

:-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: #ccc !important;
    font-weight: 300;
}

::-ms-input-placeholder {
    /* Microsoft Edge */
    color: #ccc !important;
    font-weight: 300;
}

input {
    display: flex;
    flex-direction: column;
    border-color: #d8e0e5;
    border-radius: 2px !important;
    box-shadow: none !important;
    font-weight: 300 !important;
}


.form-control:disabled,
.form-control[readonly] {
    background-color: #f6f7fb;
}

button.btn {
    border-radius: 2px !important;
    box-shadow: none !important;
}

button.btn.btn-primary {
    background-color: #0e9aee !important;
}

button.btn.btn-primary:hover {
    background-color: #0879c8 !important;
}

#left-menu {
    position: fixed;
    top: 0;
    left: 0;
    width: 280px;
    background-color: #5d55df;
    overflow-y: auto;
    height: 100vh;
    border-right: 1px solid #e6ecf5;
    margin-top: 60px;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    overflow-x: hidden;
    z-index: 2;
}

#left-menu.small-left-menu,
#logo.small-left-menu {
    width: 60px;
}

#left-menu ul {
    padding: 0;
    margin: 0;
}

#left-menu ul li {
    padding: 0 10px;
    display: block;
    position: relative;
}

#left-menu > ul > li {
    margin: 15px 0;
}

#left-menu ul li a {
    color: #99abb4;
    width: 100%;
    display: inline-block;
    width: 260px;
    height: 37px;
    position: relative;
}


#left-menu ul li a i {
    font-size: 22px;
    text-align: center;
    width: 35px;
    height: 35px;
    display: inline-block;
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#left-menu ul li:hover a span{
    color: #0e9aee;
}
#left-menu ul li:hover a i{
    color: #0e9aee;
}

#left-menu ul li a span {
    width: 100%;
    height: 35px;
    padding-left: 10px;
    color: #99abb4;
    font-weight: 300;
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

#left-menu ul li.active a {
   
}

#left-menu ul li.active a span {
    color: white;
}

#left-menu ul li.active a i {
    
}


#left-menu li.has-sub ul {
    background-color: #454e62;
    margin: 0 -10px;
    padding-left: 45px;
    height: 0;
    overflow: hidden;
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

#left-menu li ul.open {
/*    height: 140px;*/
}

#left-menu li.has-sub ul > li {
    padding-top: 10px;
}

a:hover {
    text-decoration: none;
}

#logo {
    position: fixed;
    top: 0;
    z-index: 2;
    left: 0;
    background-color: #5a53d1;
    border-color: #464e62;
    height: 60px;
    width: 280px;
    font-size: 30px;
    line-height: 2em;
    border-right: 1px solid #e6ecf5;
    z-index: 4;
    color: #fff;
    padding-left: 15px;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    overflow: hidden;
}

label {
    color: #6c63ff;
}

button {
    background-color: "#ff4f5a";
}


#header {
    background-color: #fff;
    height: 60px;
    border-bottom: 1px solid #e6ecf5;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 3;
}

#header .header-left {
    padding-left: 300px;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

#header .header-right {
    padding-right: 40px;
}

#header .header-right i,
#header .header-left i {
    font-size: 30px;
    line-height: 2em;
    padding: 0 5px;
    cursor: pointer;
}

#main-content {
    min-height: calc(100vh - 60px);
    clear: both;
}

#page-container {
    padding-left: 300px;
    padding-top: 80px;
    padding-right: 25px;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

#page-container.small-left-menu,
#header .header-left.small-left-menu {
    padding-left: 80px;
}

.card {
    border: 1px solid #e6ecf5;
    margin-bottom: 1em;
    font-weight: 300;
}

.card .title {
    padding: 5px 10px;
    border-bottom: 1px solid #e6ecf5;
    margin-bottom: 10px;
    color: #ff4f5a;
    font-size: 18px;
}

#show-lable {
    opacity: 0;
    visibility: hidden;
    left: 80px;
    font-weight: 300;
    padding: 6px 15px;
    background-color: #0e9aee;
    position: fixed;
    color: #fff;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

#left-menu.small-left-menu li.has-sub::after{
    content: '';
}
#left-menu.small-left-menu li.has-sub ul{
    position: fixed;
    width: 280px;
    z-index: 123;
    height: 0;
    left: 69px;
    padding-left: 15px;
}

@media only screen and (max-width: 992px) {
    #left-menu,
    #logo {
        width: 60px;
    }
    
    #page-container,
    #header .header-left {
        padding-left: 80px;
    }
    
    #toggle-left-menu,.big-logo{
        display: none;
    }
/*
    #logo{
        padding: 0;
        padding-left: 3px;
    }
    .small-logo{
        display: block;
    }
*/
    
}

.btn {
    background-color:#0094d9;
    border: none;
    color: white;
    font-family: 'Poppins', sans-serif;
}

@media only screen and (min-width: 992px) {
    #left-menu li.has-sub::after {
        font-family: "Ionicons";
        content: "\f3d3";
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        transform: rotate(0deg);
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }
    #left-menu li.has-sub.rotate:after {
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
    }
    .small-logo{
        display: none;
    }
    
}    

    </style>
    <body>
    <div id="left-menu">
        <ul>
            <li class="active"><a href="#">
                <i class="ion-ios-person-outline"></i>
                <span>Painel</span>
            </a></li>
            <li class="has-sub">
                <a href ="<?= url("admin/userPDF") ?>">
                    <i class="ion-ios-person-outline"></i>
                    <span>Lista de usuários</span>
                </a>
                <ul>
                
                    <li><a href="#">UI Elements Item 1</a></li>
                    <li><a href="#">UI Elements Item 2</a></li>
                    <li><a href="#">UI Elements Item 3</a></li>
                </ul>
            </li>
            <li> <a href ="<?= url("admin/adminPDF") ?>">
                <i class="ion-ios-albums-outline"></i>
                <span>Lista de adms</span>
            </a></li>
            <li class="has-sub">
                <a href= "<?= url("admin/tasksPDF") ?>">
                    <i class="ion-ios-person-outline"></i>
                    <span>Lista de tarefas</span>
                </a>
                <ul>
                    <li><a href="#">Lista de notificações</a></li>
                </ul>
            </li>
          
      
        

        </ul>
    </div>
    <div id="main-content">
        <div id="header">
            <div class="header-left float-left">
                <i id="toggle-left-menu" class="ion-android-menu"></i>
            </div>
            <div class="header-right float-right">
                <i class="ion-ios-people"></i>
            </div>
        </div>

        <div id="page-container">
            <div class="card">
                <div class="title" style = "color: #6c63ff"><h2>Bem vindo  <?=$_SESSION['adm']["name"];?>! <br> <a href="<?= url("admin/sair") ?>" style="font-size: 15px">Logout</a</h2></div>
                <div class="title" style = "color: #ff4f5a">Lista de Usuários</div>
                <div class="users" style="color: black; margin-left: 10px">
       <?php
        foreach ($users as $user){
       ?>
         <a style = "color: #0094d9">Nome: <span style="color: #6c63ff;"><?= $user->name; ?><span></a><br>
         <a style = "color: #0094d9">Email: <span style="color: #6c63ff;"><?= $user->email; ?><span></a><br><br>
       <?php
         }
        ?>
              </div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                               
                            </div>
                        </div>
                     

                     

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                   
                                </div>
                            </div>
                            <div class="col-sm-6">
                               
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">Cadastrar Usuário</div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group" style="">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control">
                                </div><br>
                                <button class="btn">Cadastrar</button>
                            </div>
                        </div>
                        <br>
                     
            <div class="card">
                <div class="title">Cadastrar Admin</div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control">
                                </div>
                                </div><br>
                                <button class="btn">Cadastrar</button>
                            </div>
                        </div>
                     

                     

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                   
                                </div>
                            </div>
                            <div class="col-sm-6">
                               
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">Criar Tarefa</div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Text</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">idImportance</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div><br>
                                <button class="btn">Cadastrar</button>
                </div>
            </div>
            <div class="card">
                <div class="title">Criar Notificação</div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Text</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">idImportance</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Time</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div><br>
                                <button class="btn">Cadastrar</button>
                </div>
            </div>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </body>
        </html>
    