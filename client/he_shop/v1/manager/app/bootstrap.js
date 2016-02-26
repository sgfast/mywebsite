
/**
 * 初始化app
 */
var app = angular.module('myApp', ['ui.router']);

/**
 * 初始化router
 */
app.config(function($stateProvider, $urlRouterProvider){
	
	// 注册首页
	$urlRouterProvider.when('', '/index');
	
	// 注册其它页面
	for (var i=0; i<router.length; i++){
		$stateProvider.state(router[i].path, router[i].data);
	}
});