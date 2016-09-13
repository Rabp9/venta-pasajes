<!-- src/Template/Users/login.ctp -->
<html ng-app="VentaPasajesApp">
    <head>
        <title>LOGIN</title>
        <meta charset="UTF-8">
        <?= $this->Html->css(["ribbon.css", "bootstrap.min.css", "style.css", 
            "fonts25.css", "panels.css", "angular-animations.css"]) ?>
        <?= $this->Html->css(["jquery-ui.min.css", "jquery-ui.structure.css", "jquery-ui.theme.min.css"]) ?>
        <?= $this->Html->script(["angular.min.js", "angular-route.min.js", 
            "angular-resource.min.js", "angular-animate.min.js", "ng-file-upload.min.js",
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
    <body>
        <form name="loginForm" ng-controller="UsersController"
            ng-submit="login(user)" novalidate>
            <label for="username">Username:</label>
            <input type="text" id="username"
                ng-model="user.username">
            <label for="password">Password:</label>
            <input type="password" id="password"
                ng-model="user.password">
            <button type="submit">Login</button>
        </form>
    </body>
</html>