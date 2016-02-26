$(function()
{
	// swiper
	var swiper = new Swiper('.swiper-container', {
	    pagination: '.swiper-pagination',
	    paginationClickable: true,
	    autoplay: 3000,
	    autoplayDisableOnInteraction : false,
	    debugger: true
	});
	
	// tab效果
	$('.tab').click(function()
	{
		// 取key
		var key = $(this).attr('key');
	
		// 隐藏所有body
		$('.body').css('display', 'none');
	
		// 去除所有tab的on
		$('.tab').removeClass('on');
	
		// 渐显body
		$('#body_' + key).fadeIn(500);
	
		// 将本元素加入on
		$(this).addClass('on');
	});

})

/*--------------------------------------------------------------------------------*/
/* Ad 首页广告块  */
/*--------------------------------------------------------------------------------*/	
var 首页广告 = function(){}

/**
 *  属性部分
 */

//固定参考宽度值,用做比例
首页广告.Bwidth = 500;

// 页面实际宽度
首页广告.Width = 0;


/**
 *  初始化
 */
首页广告.初始化 = function()
{
	// 实际宽度赋值为当前设备屏幕宽度
	首页广告.Width = $(window).width();
}

/*--------------------------------------------------------------------------------*/
/* sytle1 */
/*--------------------------------------------------------------------------------*/

首页广告.广告_1 = function()
{
	首页广告.初始化();
	
	// 固定高(参考值,用作比例  宽高 2:1)
	Bheight = 250;
	
	// 广告整体高度
	Height = 首页广告.Width*Bheight/首页广告.Bwidth;
	
	// 右侧图片高度（去除 padding 和 margin,向下取整）
	Imgheight = Math.floor((Height - 10)/3);

	// 左侧宽度(12为p首页广告ding 左右各4, 中间4)
	$('#style1 .left').css('width' , (首页广告.Width - 21)/2 + 'px');

	// 右侧宽度
	$('#style1 .right').css('width' , (首页广告.Width - 21)/2 + 'px');

	// 左侧图片高度
	$('#style1 .l1').css('height' , Imgheight*3 + 10 + 'px');

	// 右侧图片高度
	$('#style1 .r1').css('height' , Imgheight + 'px');
}


/*--------------------------------------------------------------------------------*/
/* sytle2 */
/*--------------------------------------------------------------------------------*/

首页广告.广告_2 = function()
{
	首页广告.初始化();
	
	// 固定高(参考值,用作比例    宽高 4:3)
	Bheight2 = 375;

	// 广告整体高度
	Height2 = 首页广告.Width*Bheight2/首页广告.Bwidth;

	// 右侧图片高度（向下取整）
	Imgheight2 = Math.floor((Height2-10)/3);

	// 左侧宽度(12为p首页广告ding 左右各4, 中间4)
	$('#style2 .left').css('width' , (首页广告.Width - 21)/2 + 'px');

	// 右侧宽度
	$('#style2 .right').css('width' , (首页广告.Width - 21)/2 + 'px');

	// 左侧大图片高度
	$('#style2 .left .l1').css('height' , Imgheight2*2 + 5 + 'px');

	// 左侧小图高度
	$('#style2 .left .l2').css('height' , Imgheight2 + 'px');

	// 右侧图片高度
	$('#style2 .right .r1').css('height' , Imgheight2 + 'px');
}


/*--------------------------------------------------------------------------------*/
/* sytle3 */
/*--------------------------------------------------------------------------------*/

首页广告.广告_3 = function()
{
	首页广告.初始化();
	
	// 固定高(参考值,用作比例    宽高 4:3)
	Bheight3 = 375;

	// 广告整体高度
	Height3 = 首页广告.Width*Bheight3/首页广告.Bwidth;

	// 右侧图片高度（向下取整）
	Imgheight3 = Math.floor((Height3-10)/3);

	// 左侧宽度(12为p首页广告ding 左右各4, 中间4)
	$('#style3 .left').css('width' , (首页广告.Width - 21)/2 + 'px');

	// 右侧宽度
	$('#style3 .right').css('width' , (首页广告.Width - 21)/2 + 'px');

	// 左侧大图片高度
	$('#style3 .left .l1').css('height' , Imgheight3*2 + 5 + 'px');

	// 底部小图片宽度,高度
	$('#style3 span img').css({width:((首页广告.Width - 21)/2-5)/2 + 'px', height:Imgheight3 + 'px'});

	// 右侧图片高度
	$('#style3 .right .r1').css('height' , Imgheight3 + 'px');
}


/*--------------------------------------------------------------------------------*/
/* sytle4 */
/*--------------------------------------------------------------------------------*/

首页广告.广告_4 = function()
{
	首页广告.初始化();
	
	// 固定高(参考值,用作比例    宽高 4:3)
	Bheight4 = 375;

	// 广告整体高度
	Height4 = 首页广告.Width*Bheight4/首页广告.Bwidth;

	// 右侧图片高度（向下取整）
	Imgheight4 = Math.floor((Height4-10)/3);

	// 左侧宽度(12为p首页广告ding 左右各4, 中间4)
	$('#style4 .left').css('width' , (首页广告.Width-21)*3/4 + 'px');

	// 右侧宽度
	$('#style4 .right').css('width' , (首页广告.Width-21)/4 + 'px');

	// 左侧大图片高度
	$('#style4 .left img').css('height' , Imgheight4 + 'px');

	// 右侧图片高度
	$('#style4 .right img').css('height' , Imgheight4 + 'px');
}


/*--------------------------------------------------------------------------------*/
/* sytle5 */
/*--------------------------------------------------------------------------------*/

首页广告.广告_5 = function()
{
	首页广告.初始化();
	
	// 固定高(参考值,用作比例    宽高 5:3)
	Bheight5 = 300;

	// 广告整体高度
	Height5 = 首页广告.Width*Bheight5/首页广告.Bwidth;

	// 右侧图片高度（向下取整）
	Imgheight5 = Math.floor((Height5-15)/4);

	// 左侧宽度(12为p首页广告ding 左右各4, 中间4)
	$('#style5 .left').css('width' , (首页广告.Width-21)/2 + 'px');

	// 右侧宽度
	$('#style5 .right').css('width' , (首页广告.Width-21)/2 + 'px');

	// 左侧大图片高度
	$('#style5 .left .l1').css('height' , Imgheight5*3 + 10 + 'px');

	// 左侧小图片高度
	$('#style5 .left .l2').css('height' , Imgheight5 + 'px');

	// 右侧图片高度
	$('#style5 .right img').css('height' , Imgheight5 + 'px');
}


/*--------------------------------------------------------------------------------*/
/* sytle6 */
/*--------------------------------------------------------------------------------*/

首页广告.广告_6 = function()
{
	首页广告.初始化();
	
	// 固定高(参考值,用作比例    宽高 1:1)
	Bheight6 = 500;

	// 广告整体高度
	Height6 = 首页广告.Width*Bheight6/首页广告.Bwidth;

	// 右侧图片高度（向下取整）
	Imgheight6 = Math.floor((Height6-15)/4);

	// 左侧宽度(12为p首页广告ding 左右各4, 中间4)
	$('#style6 .left').css('width' , (首页广告.Width-21)*3/4 + 'px');

	// 右侧宽度
	$('#style6 .right').css('width' , (首页广告.Width-21)/4 + 'px');

	// 左侧大图片高度
	$('#style6 .left .l1').css('height' , Imgheight6*2 + 5 + 'px');

	// 左侧小图片高度
	$('#style6 .left .l2').css('height' , Imgheight6 + 'px');

	// 右侧图片高度
	$('#style6 .right img').css('height' , Imgheight6 + 'px');
}


/*--------------------------------------------------------------------------------*/
/* sytle7 */
/*--------------------------------------------------------------------------------*/

首页广告.广告_7 = function()
{
	首页广告.初始化();
	
	// 固定高(参考值,用作比例    宽高 4:3)
	Bheight7 = 375;

	// 广告整体高度
	Height7 = 首页广告.Width*Bheight7/首页广告.Bwidth;

	// 右侧图片高度（向下取整）
	Imgheight7 = Math.floor((Height7-10)/3);

	// 左侧宽度(12为p首页广告ding 左右各4, 中间4)
	$('#style7 .left').css('width' , (首页广告.Width-21)/2 + 'px');

	// 右侧宽度
	$('#style7 .right').css('width' , (首页广告.Width-21)/2 + 'px');

	// 左侧大图片高度
	$('#style7 .left .l1').css('height' , Imgheight7*2 + 5 + 'px');

	// 右侧大图片高度
	$('#style7 .right .r1').css('height' , Imgheight7*2 + 5 + 'px');

	// 底部小图片宽度 , 高度
	$('#style7 span img').css({width:((首页广告.Width-21)/2-5)/2 + 'px', height:Imgheight7 + 'px'});
}


/*--------------------------------------------------------------------------------*/
/* sytle8 */
/*--------------------------------------------------------------------------------*/

首页广告.广告_8 = function()
{
	首页广告.初始化();
	
	// 固定高(参考值,用作比例    宽高 1:1)
	Bheight8 = 500;

	// 广告整体高度
	Height8 = 首页广告.Width*Bheight8/首页广告.Bwidth;

	// 右侧图片高度（向下取整）
	Imgheight8 = Math.floor((Height8-15)/4);

	// 左侧宽度(12为p首页广告ding 左右各4, 中间4)
	$('#style8 .left').css('width' , (首页广告.Width-21)/2 + 'px');

	// 右侧宽度
	$('#style8 .right').css('width' , (首页广告.Width-21)/2 + 'px');

	// 左侧大图片高度
	$('#style8 .left .l1').css('height' , Imgheight8*2 + 5 + 'px');

	// 左侧小图片高度
	$('#style8 .left .l2').css('height' , Imgheight8 + 'px');

	// 右侧大图片高度
	$('#style8 .right .r1').css('height' , Imgheight8*2 + 5 + 'px');

	// 右侧大图片高度
	$('#style8 .right .r2').css('height' , Imgheight8 + 'px');
}