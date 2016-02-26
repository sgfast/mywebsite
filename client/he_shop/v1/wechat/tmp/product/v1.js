
/*--------------------------------------------------------------------------------*/
/*商品详情
/*--------------------------------------------------------------------------------*/
var 详情 = function(){};
//--------------------------------------------------------------------------------*/
//属性
//--------------------------------------------------------------------------------*/
详情.商品号 = 0;			//商品号
详情.规格号 = 0;			//当前选定的规格
详情.库存 = 0;			//当前规格的库存
详情.限购量 = 0;

//--------------------------------------------------------------------------------*/
//启动
//--------------------------------------------------------------------------------*/
详情.启动 = function(商品号, 规格号, 库存, 限购量)
{
	//初始化数值属性
	详情.商品号 = 商品号;
	详情.规格号 = 规格号;
	详情.库存 = 库存;
	详情.限购量 = 限购量;
	
	//事件处理器启动
	详情.事件处理器();
}

详情.事件处理器 = function()
{

	//加购物车
	$('#cart').click(function()
	{
		//取count
		var count = Number($('#count').val());				//当前选择的数值
		
		//如果count为0, 则提示错误
		if (count == 0)
		{
			提示错误('库存数量为0, 无法加入购物车!');
			return;
		}
		
		//参数
		var param = 
		{
			pid: 详情.商品号,
			sid: 详情.规格号,
			limit: 详情.限购量,
			count: count			
		}
		
		//提交到购物车
		快速('添加购物车成功!', param, Ajax_Path + 'product/detail.php', '刷新');
	});
	
	//加
	$('#jia').click(function()
	{
		// 取当前count的值
		var count = Number($('#count').val());				//当前选择的数值
		
		// +1
		count += 1;
		
		// 判断是否大于库存值
		if (count > 详情.库存)
		{
			提示错误('已达到可订购上限！');
			count = 详情.库存;
			return;
		}

		//判断是否大于限购值
		if (详情.限购量 > 0 && count > 详情.限购量)
		{
			提示错误('已达到限购的数量上限！');
			count = 详情.限购量;
			return;
		}
		
		//一定要注意, 加运算, 是需要计算限购的, 不仅仅是库存与本页的限购量, 还要加上以前的购买等信息, 所以需要一个回调
		
		//参数
		var param = 
		{
			pid: 详情.商品号,
			sid: 详情.规格号,
			count: count, 
			type: 'jia'
		}
		
		//通过ajax取回可购买的数量
		回调(param, Ajax_Path + 'product/detail.count.php', function(data)
		{
			if (data.result == 'OK')
			{
				$('#count').val(count);
			}
			else
			{
				提示错误('已达到限购的数量上限！');
			}
		});
	});
	
	//减
	$('#jian').click(function()
	{
		// 取当前count的值
		var count = Number($('#count').val());
		
		// 注意，最小数的计算
		if (count > 1)
			count -= 1;
		
		// 赋值
		$('#count').val(count);
	});
	
	//stand效果
	$('.stand').click(function()
	{
		//取key
		var key = $(this).attr('key');
		
		//清除stand on
		$('.stand').removeClass('on');
		
		//添加this on
		$(this).addClass('on');
		
		//隐藏类控件
		$('.label').css('display', 'none');
		$('.price').css('display', 'none');
		$('.tip').css('display', 'none');
		$('.sales_standard').css('display', 'none');
		
		//显示ID控件
		$('#label_' + key).css('display', 'block');
		$('#price_' + key).css('display', 'block');
		$('#tip_' + key).css('display', 'block');
		$('#sales_standard_' + key).css('display', 'block');
		
		//取当前规格的库存量, 调整各种状态

		var stock = Number($('#stock_' + key).html());	//取规格下的库存总数
		var limit = $('#limit_' + key).html() == '无' ? 0 : Number($('#limit_' + key).html());		//取限购数量, 如果为'无'则为0
		var count = Number($('#count').val());			//取count控件当前的值

		//如果库存等于0, 则需要将所有控件设置为不可用状态
		if (stock == 0)
		{
			$('#count').val('0');
		}
		else
		{
			$('#count').val(1);
		}
		
		//如果count == 0, 但此商品还有库存, 则将count设置为1, 此处注意, 限购可以不在此计算, 因为限购不会小于1
		if (stock > 0 && count == 0)
			$('#count').val(1);
		
		//设置详情属性
		详情.规格号 = key;
		详情.库存 = stock;
		详情.限购量 = limit;
	}); 
}


/*--------------------------------------------------------------------------------*/
/*类别部分 */
/*--------------------------------------------------------------------------------*/
var 类别 = function(){};
//--------------------------------------------------------------------------------*/
//启动
//--------------------------------------------------------------------------------*/
类别.启动 = function()
{
	//tab效果
	$('.tab').click(function()
	{
		//取key
		var key = $(this).attr('key');

		//隐藏所有body和sales_order
		$('.body').css('display', 'none');
		$('.sales_order').css('display', 'none');

		//去除所有tab的on
		$('.tab').removeClass('on');

		//渐显body
		$('#body_' + key).fadeIn(500);
		
		//显示sales_order
		if ($('#sales_order_' + key))
		{
			$('#sales_order_' + key).css('display', 'block');
		}

		//将本元素加入on
		$(this).addClass('on');
	}); 
}

/*--------------------------------------------------------------------------------*/
/* 列表瀑布流部分 */
/*--------------------------------------------------------------------------------*/
var 瀑布 = function(){};

/*--------------------------------------------------------------------------------*/
/* 瀑布流属性 */
/*--------------------------------------------------------------------------------*/
瀑布.当前页面 = 1;
瀑布.每次加载数量 = 10;
瀑布.到达尾部 = false;
瀑布.逻辑页面 =  Ajax_Path + 'product/list.php'
瀑布.大类号 = 0;
瀑布.小类号 = 0;
瀑布.关键字 = '';
瀑布.正在载入 = false;
瀑布.容器对象;
瀑布.尾部对象;

/*--------------------------------------------------------------------------------*/
/* 瀑布流启动 */
/*--------------------------------------------------------------------------------*/
瀑布.启动 = function()
{
	// 初始化对象类属性
	瀑布.容器对象 = $('#contianer');
	瀑布.尾部对象 = $('#tail');

	//初始大类号与小类号
	瀑布.大类号 = get('bid');
	瀑布.小类号 = get('sid');
	瀑布.关键字 = get('key');
	瀑布.类型 = get('type');
	
	// 初始载入
	瀑布.判断载入();	
	
	// 事件处理
	瀑布.事件处理器();
}

/*--------------------------------------------------------------------------------*/
/* 瀑布流事件处理器 */
/*--------------------------------------------------------------------------------*/
瀑布.事件处理器 = function()
{
	$(window).scroll(function()
	{		
		// 当滚动到最底部以上200像素时， 加载新内容 (var scrollTop = window.pageYOffset|| document.documentElement.scrollTop || document.body.scrollTop;)
		if (($(document).height() - $(this).scrollTop() - $(this).height()) >= 200) 
			return;
		
		瀑布.判断载入();
	});
}

/*--------------------------------------------------------------------------------*/
/* 瀑布流判断载入 */
/*--------------------------------------------------------------------------------*/
瀑布.判断载入 = function()
{
	// 注意这里要进行判断, 是否正在载入, 否则会不断载入相同的内容
	if (!瀑布.正在载入)
	{			
		// 还有数据, 且已经下拉, 则载入
		瀑布.载入();
	}
}

/*--------------------------------------------------------------------------------*/
/* 瀑布流真正的载入部分 */
/*--------------------------------------------------------------------------------*/
/**
 * data协议:
 * {
 * 		tail: true | false,
 * 		list: [{}, {}, {}]
 * }
 */
瀑布.载入 = function()
{
	// 如果数据已到达尾部, 则不载入
	if (瀑布.到达尾部)
		return;
	
	//当进行载入时,将正在载入设置为true
	瀑布.正在载入 = true;
	
	// 调起ajax
	回调({page: 瀑布.当前页面, number: 瀑布.每次加载数量, bid: 瀑布.大类号, sid: 瀑布.小类号, key: 瀑布.关键字, type: 瀑布.类型}, 瀑布.逻辑页面, function(data)
	{
		//首先确保data.data是存在的, 也就是确实存在着返回的商品
		if (data.data)
		{
			//循环添加
			for (var i=0; i<data.data.length; i++)
			{			
				//声明快捷访问方式
				var d = data.data[i];
		
				//制作条目
				var li = $("<li style='display:none;'></li>");
				
				//--------------------------------------------------------------------
				//标签
				var span = $('<span></span>');
				//根据开启了哪种促销方式, 进行标签输出, 并记录是否已开启特殊属性
				var sales = false;
				if (d.是限时抢)
				{
					span.append($("<i class='rush'>限时抢</i>"));
					sales = true;
				}
				if (d.是N元区)
				{
					span.append($("<i class='yuan'>特价</i>"));
					sales = true;
				}
				if (d.是买赠)
				{
					span.append($("<i class='present'>买赠</i>"));
					sales = true;
				}
				if (d.是买优)
				{
					span.append($("<i class='prefer'>买优</i>"));
					sales = true;
				}
				if (d.是促销)
				{
					span.append($("<i class='sale'>促销</i>"));
					sales = true;
				}
				if (d.是推荐)
				{
					span.append($("<i class='recom'>推荐</i>"));
					sales = true;
				}
				if (d.是新品)
				{
					span.append($("<i class='new'>新品</i>"));
					sales = true;
				}
				if (d.是限购)
				{
					span.append($("<i class='limit'>限购</i>"));
					sales = true;
				}
				if (d.库存 == 0)
				{
					span.append($("<i class='empty'>售罄</i>"));
					sales = true;
				}
				
				//--------------------------------------------------------------------
				//链接与列表内容
				var a = $("<a href='detail.php?id=" + d.序号 + "'></a>");
				
				//图片
				var img = $("<div class='img'></div>");
				if (d.库存 == 0)
					img = $("<div class='img touming'></div>");
					img.append($("<img src='http://img.hesq.com.cn/fresh/upload/product/" + d.图片 + "' />"));
				
				//说明
				var mark = $("<div class='mark'></div>");
					mark.append($("<h4>" + d.名称 + "</h4>"));
					mark.append($("<em>" + d.特色 + "</em>"));
					mark.append($("<p>月销量: " + d.销量 + "</p>"));
					mark.append($("<p>总库存: " + d.库存 + "</p>"));
					
				//将img和mark添加到a标签
				a.append(img);
				a.append(mark);
				
				//--------------------------------------------------------------------
				//价格
				var price = $("<b></b>");
				
				//如果促销价格不等于价格, 则分别加入促销价和价格
				if (d.促销价格 != d.价格)
				{
					price.append($('<del>￥' + d.价格 + '</del>'));
					price.append($('<i>￥' + d.促销价格 + '</i>'));
				}
				else
				{
					price.append($('<i>￥' + d.价格 + '</i>'));
				}
				
				//--------------------------------------------------------------------
				//将所有元素添加到li上
				
				//根据是否有特殊属性, 添加span
				if (sales)
					li.append(span);
				
				//添加a标签
				li.append(a);
				
				//添加price
				li.append(price);

				//追加条目
				瀑布.容器对象.append(li);
				
				//显示条目
				li.fadeIn();
			}
		}
		
		//如果到达尾部, 则修改尾部对象的Html文本, 设置到达尾部属性为true
		if (data.tail)
		{
			瀑布.到达尾部 = true;
			瀑布.尾部对象.html('已经没有更多商品了');
		}
		
		//当前页面++
		瀑布.当前页面++;
		
		// 载入完成, 将正在载入设置为false
		瀑布.正在载入 = false;
	});
}



