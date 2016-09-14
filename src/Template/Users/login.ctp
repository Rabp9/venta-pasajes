<!-- src/Template/Users/login.ctp -->
<html ng-app="VentaPasajesApp">
    <head>
        <title>LOGIN</title>
        <meta charset="UTF-8">
        <?= $this->Html->css(["ribbon.css", "bootstrap.min.css", "style.css", 
            "fonts25.css", "panels.css", "angular-animations.css"]) ?>
        <?= $this->Html->css(["jquery-ui.min.css", "jquery-ui.structure.css", "jquery-ui.theme.min.css"]) ?>
        <?= $this->Html->script(["angular.min.js", "angular-route.min.js", 
            "angular-resource.min.js", "angular-animate.min.js", "ng-file-upload.min.js", "angular-local-storage.min.js",
            "angular-input-date", "VentaPasajesApp/app.js", "VentaPasajesApp/utils/ImportarController.js", "VentaPasajesApp/utils/ImportarService.js"])
        ?> 
        <?= $this->Html->script(["VentaPasajesApp/users/UsersService.js"]); ?>
        <?= $this->Html->script(["VentaPasajesApp/users/UsersController.js"]); ?>
        <?= $this->Html->script([
            "jquery-1.12.1.min",
            "bootstrap.min",
            "jquery-ui.min",
            "datepicker-es",
            "checklist-model"
        ]) ?>
    </head>
    <body ng-controller="UsersController">
        <div id="dvFormLogin" class="panel panel-default">
            <form name="loginForm" ng-submit="login(user)">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <div ng-show="error" class="alert alert-danger alert-dismissible ng-hide" role="alert">
                        <button type="button" class="close" ng-click="error = false"><span aria-hidden="true">&times;</span></button>
                        Usuario o contraseña incorrectos
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" class="form-control" ng-model="user.username">
                        <label for="password">Password:</label>
                        <input type="password" id="password" class="form-control" ng-model="user.password">
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary" type="submit" style="width: 100%">Acceder</button>
                </div>
            </form>
        </div>
    </body>
</html>