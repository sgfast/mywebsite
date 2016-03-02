//***************************************************************************************************************
// 全局方法与对象部分
//***************************************************************************************************************
/**
 * 全局get方法
 * @param name get参数名
 * @param def 默认值
 * @returns get参数值
 */
function get(name, def)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     
     // 判断返回
     if(r != null){
    	 return decodeURIComponent(r[2]);
     }
     
     // 如果等于null, 则返回空字符串
     if (def == undefined){
    	 return '';
     }else{
    	 return def;
     } 
}

/**
 * 正则表达式对象
 */
var reg = {
	name:	 	/^[a-zA-Z0-9_\-]+$/,
	password:	/^[a-zA-Z0-9_!@#$%^&*()\-]+$/,
	chinese: 	/^[\u0391-\uFFE5]+$/,
	number:  	/^[-\+]?\d+(\.\d+)?$/,
	int:	 	/^[-\+]?\d+$/,
	price:  	/^[0-9]+([.]{1}[0-9]{1,2})?$/,
	float: 	 	/^[-\+]?\d+(\.\d+)?$/,
	date: 		/^(\d{4})(-|\/)(\d{1,2})\2(\d{1,2})$/,
	datetime:	/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}$/,
	time:		/^\d{2}:\d{2}$/,
	email:	 	/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/,
	url: 	 	/^(((ht|f)tp(s?))\:\/\/)[a-zA-Z0-9]+\.[a-zA-Z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/,
	tel: 		/^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/,
	mobile:	 	/^1\d{10}$|^\d{7,8}$/,
	code:	 	/^[1-9]\d{5}$/,
	card:  	 	/(^\d{15}$)|(^\d{17}[0-9Xx]$)/,
	ip: 	 	/^(0|[1-9]\d?|[0-1]\d{2}|2[0-4]\d|25[0-5]).(0|[1-9]\d?|[0-1]\d{2}|2[0-4]\d|25[0-5]).(0|[1-9]\d?|[0-1]\d{2}|2[0-4]\d|25[0-5]).(0|[1-9]\d?|[0-1]\d{2}|2[0-4]\d|25[0-5])$/,
	qq: 	 	/^[1-9]\d{4,10}$/,
	msn: 	 	/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
};

//***************************************************************************************************************
//bootstrap部分
//***************************************************************************************************************
/**
 * 基础消息服务
 */
var factoryMsg = function(){
return {
	
	// 成功
	ok: function(msg){
		this.msg(msg, 'ok');
	},
	
	// 出错
	error: function(msg){
		this.msg(msg, 'error');
	},
	
	// 通用消息框
	msg: function(msg, type){
		
		// 如果当前已经存在infotips，则先删除之
		if ($("#tips").length > 0)
			$("#tips").remove();

		// 创建一个节点，并添加到body下
		var infoDivObj = $('<div id="tips" class="tips"></div>');
		infoDivObj.appendTo($("body")).html(msg);
		
		// 制作弹出动画
		var pot = $("#tips").innerWidth();
		$("#tips").css("margin-left", -pot / 2).animate({opacity:'1'}, 800, function(){
			$(this).animate({opacity:'1'}, 2000, function(){
				$(this).animate({opacity:'0'}, 600, function(){
					$(this).css("display", "none");
					$(this).remove();
				})
			})		
		});
		
		// 为tipsDiv添加背景颜色
		switch (type) {
			case 'ok':
				$("#tips").addClass('tips_ok');
				break;
			case 'error':
				$("#tips").addClass('tips_error');
				break;
			default:
				break;
		}
	}}
}

/**
 * ajax处理器服务
 */
var factoryAjaxHandler = function($http, msg){
return {
	
	// ajax通用框架
	action: function(type, url, params, callback){

		// 如果type === get 或  delete，则首先组装url
		if (type === 'get' || type === 'delete'){
			url = this.packUrl(url, params);
		}

		// 分支取回promise
		var promise = null;
		switch (type){
			case 'get':		promise = $http.get(url); break;
			case 'delete':	promise = $http.delete(url); break;
			case 'post':	promise = $http.post(url, params); break;
			case 'put':		promise = $http.put(url, params); break;
			default: brreak;
		}

		// 为promise添加成功处理方法，注意：此处为异步处理，this是不管用的（ES6箭头函数可用）
		promise
		.success(function(data){
			if (data.return !== 'OK'){
				msg.error(data.return);
			}else{
				if (callback !== undefined){
					callback(data);
				}
			}
		})
		
		// 为promise添加失败处理方法
		.error(function(data, status){
			msg.error('访问出错: ' + status + '!');
		});
	},

	// 组装get,delete的url和params，返回一个url（带参数）的字符串
	packUrl: function(url, params){
		
		// 求参数字符串
		var p = '';
		for (key in params){
			if (p !== ''){
				p += '&';
			}
			p += key + '=' + params[key];
		}
		
		// 组合返回，注意，如果p为空串，则不应该加上？
		return p === '' ? url : url + '?' + p;
	}
}}

/**
 * Ajax服务
 */
var factoryAjax = function($http, $state, ajaxHandler){
return {
	
	// 四种访问restful的方法
	get: 	function(url, params, callback){ ajaxHandler.action('get', 		url, params, callback); },
	post: 	function(url, params, callback){ ajaxHandler.action('post', 	url, params, callback); },
	put: 	function(url, params, callback){ ajaxHandler.action('put', 		url, params, callback); },
	delete: function(url, params, callback){ ajaxHandler.action('delete', 	url, params, callback); },

	// 跳转
	redirect: function(state, params, options){
		$state.go(state, params, options);
	},
	
	// reload
	reload: function(){
		$state.reload($state.current);
	}
}}

/**
 * Linkage服务
 */
var factoryLinkage = function(ajax){
return {
	
	// 属性
	objs = null;
	parentValue: 0,
	
	/**
	 * 创建linkage应用（添加、编辑均可）
	 * url: 'http://示例/master/controller/action'
	 * objs: [{
	 * 		id: 'element_id',
	 * 		value: 0, 	// 添加时为0，编辑时为从数据库中取出的值
	 * 		type: 'bid'	// 与后台接口相对应，由此值确定为哪级数据
	 * 	}]
	 * 
	 */
	linkage: function(url, objs){
		
		// 绑定select对象
		for (var i=0; i<objs.length; i++){
			objs[i].obj = doucment.getElementById(objs[i].id);
		}
		
		// 将objs赋值到全局对象
		this.objs = objs;
		
		// 遍历所有select，绑定数据
		for (var i=0; i<objs.length; i++){
			
			// 如果不是第一条数据，而且其对象的值为0时，跳出循环
			// 添加时：第一条数据需要通过restful取回数据，但以后的条目不需要
			// 编辑时：所有前面重要的value值均不可能为0
			// 所以，此算法成立
			if (i > 0 && objs[i].value === 0){
				break;
			}
			
			// 确定fullUrl
			var params = 'type=' + objs[i].type + '&value=' + objs[i].value;
			if (i > 0){
				params += '&parent=' + parentValue;
			}
			var fullUrl = url + '?' + params;
			
			// 绑定新的parentValue
			this.parentValue = objs[i].value;
			
			// 取回数据
			ajax.get(fullUrl, null, function(data){
				
				// 添加数据到select元素中，注意，options[0]已被占用，要从1开始
				for (var j=1; j<=data.length; j++){
					objs[i].obj.options[j] = new Option(data[j-1].text, data[j-1].value);
					
					// 检查selectedId 是否等于 data[i-1].value，如果是应该选中的项，则让其选中
					if (objs[i].value === data[j-1].value){
						objs[i].obj.options[j].selected = true;
					}
				}
			});
		}
		
		// 添加事件
		for (var i=0; i<objs.length; i++){
			
		}
	},
	
	// 事件处理器
	changeEventHandler: function(){
		
	},
	
	// 保留第一项默认option项,清空其它所有option选项
	clearOptions: function(obj){
		var len = obj.options.length;
		for(var i=1; i<len; i++)
			obj.options[1] = null;
	}
}}

/**
 * 工厂服务组装
 */
var factory = [
{
	name: 'msg',
	func: factoryMsg
},
{
	name: 'ajaxHandler',
	func: factoryAjaxHandler
}, 
{
	name: 'ajax',
	func: factoryAjax
},
{
	name: 'linkage',
	func: factoryLinkage
}];

//***************************************************************************************************************
// bootstrap部分
//***************************************************************************************************************

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
 * 注册所有factory
 */
for (var i=0; i<factory.length; i++){
	app.factory(factory[i].name, factory[i].func);
}

