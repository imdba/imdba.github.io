/**
 * Created by Administrator on 2015/12/21 0021.
 */
function GreetCtrl($scope,$rootScope){
    $scope.name = 'World';
    $rootScope.department = 'Angular';
}

function ListCtrl($scope){
    $scope.names = ['zh','cx','yj'];
}