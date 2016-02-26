/**
 * router名称空间
 */
var router = [	
	
	/**
	 * 首页
	 */
	{
		path: 'tmp/index',
		data: {
			url: '/index',
		    templateUrl: 'tmp/index.html'
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
		path: 'product/detail',
		data: {
			url: '/product/detail',
			templateUrl: 'tmp/product/detail.html'
		}
	},

	/**
	 * 用户部分
	 */
	{
		path: 'user/index',
		data: {
			url: '/user/index',
	    	templateUrl: 'tmp/user/index.html'
		}
	},
	{
		path: 'user/cash',
		data: {
			url: '/user/cash',
	    	templateUrl: 'tmp/user/cash.html'
		}
	},
	{
		path: 'user/point',
		data: {
			url: '/user/point',
	    	templateUrl: 'tmp/user/point.html'
		}
	},
	{
		path: 'user/coupon',
		data: {
			url: '/user/coupon',
	    	templateUrl: 'tmp/user/coupon.html'
		}
	},
	{
		path: 'user/order',
		data: {
			url: '/user/order',
	    	templateUrl: 'tmp/user/order.html'
		}
	},
	{
		path: 'user/feedback',
		data: {
			url: '/user/feedback',
	    	templateUrl: 'tmp/user/feedback.html'
		}
	},
	{
		path: 'user/about',
		data: {
			url: '/user/about',
	    	templateUrl: 'tmp/user/about.html'
		}
	},
	
	// 订单部分
	{
		path: 'user/order/index',
		data: {
			url: '/user/order/index',
	    	templateUrl: 'tmp/user/order/index.html'
		}
	},
	{
		path: 'user/order/detail',
		data: {
			url: '/user/order/detail',
	    	templateUrl: 'tmp/user/order/detail.html'
		}
	},
	
	// 卡券部分
	{
		path: 'user/tick/index',
		data: {
			url: '/user/tick/index',
	    	templateUrl: 'tmp/user/tick/index.html'
		}
	},
	{
		path: 'user/tick/detail',
		data: {
			url: '/user/tick/detail',
	    	templateUrl: 'tmp/user/tick/detail.html'
		}
	},
	{
		path: 'user/tick/valid',
		data: {
			url: '/user/tick/valid',
	    	templateUrl: 'tmp/user/tick/valid.html'
		}
	},
	{
		path: 'user/tick/exchange',
		data: {
			url: '/user/tick/exchange',
	    	templateUrl: 'tmp/user/tick/exchange.html'
		}
	},
	
	// 收货部分
	{
		path: 'user/receive/index',
		data: {
			url: '/user/receive/index',
	    	templateUrl: 'tmp/user/receive/index.html'
		}
	},
	{
		path: 'user/receive/add',
		data: {
			url: '/user/receive/add',
	    	templateUrl: 'tmp/user/receive/add.html'
		}
	},
	{
		path: 'user/receive/update',
		data: {
			url: '/user/receive/update',
	    	templateUrl: 'tmp/user/receive/update.html'
		}
	},
	
	/**
	 * 订单部分
	 */
	{
		path: 'order/cart',
		data: {
			url: '/order/cart',
	    	templateUrl: 'tmp/order/cart.html'
		}
	},
	{
		path: 'order/submit',
		data: {
			url: '/order/submit',
	    	templateUrl: 'tmp/order/submit.html'
		}
	},
	{
		path: 'order/result',
		data: {
			url: '/order/result',
	    	templateUrl: 'tmp/order/result.html'
		}
	}
];