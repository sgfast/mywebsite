/**
 * 商品结构
 */
var product = {};

/**
 * 全局link属性
 */
product.link = {
	single: [
 	    ['使用说明', 'http://www.help.com', true],
 	    ['使用说明', 'http://www.help.com']
 	],
 	list: [
 	    
 	]
};

/**
 * 页面配置
 */
// 添加
product.add = {
	type: 'add',
	name: '添加商品',
	link: product.link.single,
	data: product.data.form,
	resource: {
		set: 'product/product/add'
	}
};
// 编辑 
product.update = {
	type: 'update',
	name: '编辑商品',
	link: product.link.single,
	data: product.data.list,
	resource: {
		get: 'product/product/id',
		set: 'product/product/update'
	}
};
// list页面
product.list = {
	type: 'list',
	name: 'name',
	link: link,
	data: product.data.list,
	resource: {
		get: 'product/product/all'
	}
};
// paging
product.paging = {
	type: 'paging',
	name: 'name',
	link: link,
	data: product.data.list,
	resource: {
		get : 'product/product/all'
	}
}

/**
 * form数据定义
 */
product.data.form = [
{
	head: '选择大类',
	type: 'select',
	name: 'bid',
	model: 'model.bid',
	event: {
		change: 'bidChange()'
	}
	valid: {
		reqiured: true,
		message: '必须选择'
	}
},
{
	head: '选择小类',
	type: 'select',
	name: 'sid',
	model: 'model.bid',
	valid: {
		reqiured: true,
		message: '必须选择'
	}
},
{
	head: '商品名称',
	type: 'input',
	name: 'name',
	model: 'model.name',
	valid: {
		reqiured: true,
		min: 0,
		max: 100,
		minlength: 2,
		maxlength: 10,
		message: '必须填写，最小2位，最大10位'
	}
}];

/**
 * list数据定义
 */
product.data.list = {
filter: [
	{type:'select', resource:{get: 'resout'}},
	{type:'select', resource:{get: 'resout'}},
	{type:'select', resource:{get: 'resout'}},
	{type:'select', resource:{get: 'resout'}},
	{type:'select', resource:{get: 'resout'}}
],
head: [
    ['ID',5],
   	['名称',5],
	['图片',5],
	['浏览',5],
	['排序',5],
	['库存',5],
	['推荐',5]
],
data: [
	{
		type: 'input',
		model: 'model.bid',
		event: {
			  
		},
		valid: {
			  
		}
	},
	{
		type: 'input',
		model: 'model.bid',
		event: {
			  
		},
		valid: {
			  
		}
	}
]};
