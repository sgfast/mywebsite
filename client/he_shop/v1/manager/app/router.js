/**
 * router名称空间
 */
var router = [	
              
/**
 * 首页
 */
{
	path: 'index',
	data: {
		url: '/index',
	    templateUrl: 'tmp/index.html',
	    controller: function($scope, ajax, msg){
	    	ajax.get('json/test.json', null, function(data){
	    		$scope.model = data;
	    		
	    	});
		}
	}
},

/**
 * 商品
 */
{
	path: 'product/category',
	data: {
		url: '/product/category',
		templateUrl: 'tmp/product/category.html'
	}
},
{
	path: 'product/list',
	data: {
		url: '/product/list',
		templateUrl: 'tmp/product/list.html',
		controller: function(){
			
		}
	}
},
{
	path: 'product/add',
	data: {
		url: '/product/add',
		templateUrl: 'tmp/product/add.html',
		controller: function($scope){
			$scope.submit = function(form){
				alert(1);
			}
		}
	}
},
{
	path: 'product/update',
	data: {
		url: '/product/update',
    	templateUrl: 'tmp/product/update.html'
	}
},

/**
 * 用户部分
 */
{
	path: 'user/list',
	data: {
		url: '/user/list',
    	templateUrl: 'tmp/user/list.html'
	}
},
{
	path: 'user/detail',
	data: {
		url: '/user/detail',
    	templateUrl: 'tmp/user/detail.html'
	}
},


/**
 * 订单部分
 */
{
	path: 'order/list',
	data: {
		url: '/order/list',
    	templateUrl: 'tmp/order/list.html'
	}
	
},
{
	path: 'order/detail',
	data: {
		url: '/order/detail',
    	templateUrl: 'tmp/order/detail.html'
	}
	
}];