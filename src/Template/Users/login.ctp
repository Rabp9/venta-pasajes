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