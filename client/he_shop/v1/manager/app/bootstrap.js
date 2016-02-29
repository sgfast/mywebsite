
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

/**
 * ajax错误处理服务
 */
app.factory('ajaxHandler', function(){
	return {
		
		// 成功后的处理
		success: function(data, callback){
			if (data.return !== 'OK'){
				ajaxHandler.errorLogic(data);
			}else{
				if (callback !== undefined){
					callback(data);
				}
			}
		},
		
		// 逻辑错误
		erroLogic: function(data){
			alert(data.return);
		},
		
		// 请求错误
		errorRequest: function(status){
			alert('访问出错: ' + status + '!');
		}
	}
});

/**
 * ajax服务
 */
app.factory('ajax', function($http, $state, ajaxHandler){
	return {
		
		// get
		get: function(url, callback){
			$http.get(url)
			.success(function(data){ajaxHandler.success(data, callback);})
			.error(function(data, status){ajaxHandler.errorRequest(status);});
		},
		
		// post
		post: function(url, param, callback){
			$http.post(url, param)
			.success(function(data){ajaxHandler.success(data, callback);})
			.error(function(data, status){ajaxHandler.errorRequest(status);});
		},
		
		// put
		put: function(url, param, callback){
			$http.put(url, param)
			.success(function(data){ajaxHandler.success(data, callback);})
			.error(function(data, status){ajaxHandler.errorRequest(status);});
		},
		
		// delete
		delete: function(url, callback){
			$http.delete(url)
			.success(function(data){ajaxHandler.success(data, callback);})
			.error(function(data, status){ajaxHandler.errorRequest(status);});
		},
		
		// redirect
		redirect: function(state, params, options){
			$state.go(state, params, options);
		},
		
		// reload
		reload: function(){
			$state.reload($state.current);
		}
	}
})
