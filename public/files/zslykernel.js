var path_url = 'http://count.23lvxing.com';
var error_url = 'http://super.23lvxing.com/api/message/storeSystemError';
var consult_count = typeof over_count != "undefined" ? over_count : '';
var start_time = new Date().getTime();
var ocpc_token = null;
var resubmission = ''; /* 1或者true 为不去重 */
/*获取微信信息*/

try{
    if (sessionStorage.getItem('zsly'+zsly[1])) {
        var data = JSON.parse(sessionStorage.getItem('zsly'+zsly[1]));
        display(data);
    } else{
        post(path_url+'/api/getrandonewechat', {id: zsly[1],consult_count:consult_count}, display, function (xhr, status, statusText) {
            try{
                js_error(xhr, status, {mold:"important_mistakes",account_id:"",account_name:"",channel_id:"",channel_name:"",text:statusText},'重要错误1');
            }catch (e) {
                console.log(e);
            }
        });
    }

}catch (e) {
    post(path_url+'/api/getrandonewechat', {id: zsly[1],consult_count:consult_count}, display, function (xhr, status, statusText) {
        try{
            js_error(xhr, status, {mold:"important_mistakes",account_id:"",account_name:"",channel_id:"",channel_name:"",text:statusText},'重要错误2');
        }catch (e) {
            console.log(e);
        }
    });
}

/*处理模板信息*/
function display(data) {
    try {
        sessionStorage.setItem('zsly'+zsly[1], JSON.stringify(data));
    }catch (e) {
        console.log(e);
    }
    try{
        if(data.warning){
            js_error('', 200, data.warning,'接口警告');
        }
    }catch (e) {
        console.log(e);
    }
    try{
        if(data.status == 'error'){
            js_error('', 200, data.error,'接口警告');
        }
    }catch (e) {
        console.log(e);
    }

    try{
        if(data.status == 'success'){
            /*微信头像*/
            try{
                if (data.info.wechat_header_img != "") {
                    $('.whimg').attr('src', data.info.wechat_header_img).css('background-image','url('+data.info.wechat_header_img+')');
                }
            }catch (e) {
                console.log(e);
            }
            /*微信性别*/
            try{
                if(data.info.wechat_sex != ""){
                    $('.wsex').html(data.info.wechat_sex==1?"他":"她");
                    $('.wsexb').html(data.info.wechat_sex==1?"帅哥":"靓女");
                    $('.wsexc').html(data.info.wechat_sex==1?"小哥":"小妹");
                }
            }catch (e) {
                console.log(e);
            }
            /*品牌别名*/
            try{
                if(data.info.brand_nickname != "" && data.info.brand_nickname != "不显示"){
                    $('.bnname').html(data.info.brand_nickname);
                    $('.wxname2').html(data.info.brand_nickname);
                }
            }catch (e) {
                console.log(e);
            }
            /*次微信*/
            try{
                if(data.over.length > 0){
                    var timeout = undefined;
                    $.each(data.over,function(i,value){
                        var key = i+2;
                        $('.over_'+ key + '_wxnumber').html(value.wxnumber);
                        $('.over_'+ key + '_weixin').html(value.wxnumber);
                        $('.over_'+ key + '_wxname').html(value.nickname);
						$('.over_'+ key + '_whimg').attr('src', value.wechat_header_img).css('background-image','url('+value.wechat_header_img+')');
                        $('.over_'+ key + '_weixin').click(function(event){

                            go(event.delegateTarget.dataset.wxhao,event.delegateTarget.dataset.wxid)
                        });

                        $('.over_'+ key + '_weixin').on("touchstart", function (event) {
                            lastTime = new Date().getTime();
                            clearTimeout(timeout);
                            state = 0;
                            timeout = setTimeout(function () {
                                state = 1;
                                // go(event.currentTarget.innerText)
                                go(event.delegateTarget.dataset.wxhao,event.delegateTarget.dataset.wxid)
                            }, 500)
                        }).on("touchend", function (event) {
                            event.preventDefault();
                            clearTimeout(timeout);
                            state = 0;
                            nowTime = new Date().getTime();
                            var timeLength = nowTime - lastTime;
                            if (timeLength < 1000) {
                            }
                        });


                    });
                }
            }catch (e) {
                console.log(e);
            }
            /*套餐价钱*/
            try{
                if(data.prices.length > 0){
                    $.each(data.prices,function(i,value){
                        $('.'+value[0]).html(value[1]);
                    });
                }
            }catch (e) {
                console.log(e);
            }
            try{
                $('.wechat_code_id').attr({'data-wechat_code':data.info.wxnumber,'data-wechat_id':data.info.wechat_id}).click(function(){
                    var wechat_code = $(this).data('wechat_code');
                    var wechat_id = $(this).data('wechat_id');
                    go(wechat_code,wechat_id);
                });
            }catch (e) {
                console.log(e);
            }
            /*页面logo*/
            // try{
                // if(data.copyright.company.indexOf('小飞鱼') != -1){
                    // $(".cwk_logo,.xfy_logo").attr('src','http://www.23lvxing.com/img/xfy_logo.png');
                // }
                // if(data.copyright.company.indexOf('纯玩客') != -1){
                    // $(".cwk_logo,.xfy_logo").attr('src','http://www.23lvxing.com/img/cwk_logo.png');
                // }
            // }catch (e) {
                // console.log(e);
            // }
            /*其它*/
            try{
                $(".code_url").attr('src',data.info.code);
                $('.wxname').html(data.info.nickname);
                // $('.wxname2').html(data.copyright.subjection_nickname);
                // $(".Fcompany").text(data.copyright.company);
                // $(".Ficp").text(data.copyright.icp);
                // $(".Faddress").text(data.copyright.address);
            }catch (e) {
                console.log(e);
            }


            /*微信*/
            try{
                if (data.status == "success") {
                    if (zsly[0] == "pc") {
                        $("body").append('<div class="zhezhaocc" style="position: fixed;top:0;left:0;right:0;bottom:0;background-color: rgba(0,0,0,0.5);z-index:8888;display: none;cursor: pointer;"></div>');
                        $('.weixin').html('<span class="wxhao">' + data.info.wxnumber + '</span><img data-wxhao="'+data.info.wxnumber+'" data-wxid="'+data.info.wechat_id+'" src="'+path_url+'/static/img/see2wm.png" align="middle" style="cursor: pointer;vertical-align: top;"><div style="width:238px;height:271px;position:fixed;top:50%;margin-top:-120px;left:50%;margin-left: -120px;z-index: 9999;display: none;background:url('+path_url+'/static/img/wxtc_bg.png) no-repeat;"><div style="width:175px;height:175px;margin:40px 0 0 26px;line-height:175px;text-align:center;font-size:0;box-sizing: border-box;"><img class="linjj" src="' + data.info.code + '" style="max-width:175px;height:auto;vertical-align: middle;"></div><div style="width:35px;height:35px;position:absolute;top:0;right:0;cursor:pointer;" class="wxtc_close"></div></div>');
                        $('.JJLin').attr({"data-wxhao":data.info.wxnumber,"data-wxid":data.info.wechat_id});
						/*事件*/
                        try{
                            $(".weixin").on('click', 'img', function () {
                                go(this.dataset.wxhao,this.dataset.wxid);
                                $(this).siblings("div").show();
                                $(".zhezhaocc").show()
                            }).on('click', '.wxtc_close', function () {
                                $(".zhezhaocc").hide();
                                $(".weixin").children("div").hide()
                            });
                            $(".JJLin").on('click', function () {
                                go(this.dataset.wxhao,this.dataset.wxid);
                                $(".weixin").eq(1).find("div").show();
                                $(".zhezhaocc").show()
                            }).on('click', '.wxtc_close', function () {
                                $(".zhezhaocc").hide();
                                $(".weixin").children("div").hide()
                            });
                            $('.zhezhaocc').click(function () {
                                $(this).hide();
                                $(".weixin").children("div").hide()
                            });
                        }catch (e) {
                            console.log(e);
                        }
                    } else {
                        $('.weixin').html(data.info.wxnumber).attr('data-wxhao',data.info.wxnumber).attr('data-wxid',data.info.wechat_id);
                        try{
                            var timeout = undefined;
                            $(".weixin").on("touchstart", function (event) {
								var what_number = event.currentTarget.dataset.what_number || '';
                                lastTime = new Date().getTime();
                                clearTimeout(timeout);
                                state = 0;
                                timeout = setTimeout(function () {
                                    state = 1;
                                    // go(event.currentTarget.innerText)
                                    go(event.delegateTarget.dataset.wxhao,event.delegateTarget.dataset.wxid,what_number)
                                }, 500)
                            });
                            $(".weixin").on("touchend", function (event) {
                                event.preventDefault();
                                clearTimeout(timeout);
                                state = 0;
                                nowTime = new Date().getTime();
                                var timeLength = nowTime - lastTime;
                                if (timeLength < 1000) {
                                }
                            });
                        }catch (e) {
                            console.log(e);
                        }


                    }
                }
            }catch (e) {

            }
        }
		/*页面logo*/
		try{
			if(data.copyright.company.indexOf('小飞鱼') != -1){
				$(".cwk_logo,.xfy_logo").attr('src','http://www.23lvxing.com/img/xfy_logo.png');
			}
			if(data.copyright.company.indexOf('纯玩客') != -1){
				$(".cwk_logo,.xfy_logo").attr('src','http://www.23lvxing.com/img/cwk_logo.png');
			}
		}catch (e) {
			console.log(e);
		}
		/*其它*/
		try{
			//$('.wxname2').html(data.copyright.subjection_nickname);
			$(".Fcompany").text(data.copyright.company);
			$(".Ficp").text(data.copyright.icp);
			$(".Faddress").text(data.copyright.address);
		}catch (e) {
			console.log(e);
		}
    }catch (e) {
        console.log(e);
    }

	try {
		typeof get_wx_callback === "function" ? get_wx_callback(data) : false;
	}catch (e) {
		console.log(e);
	}
	try{
		ocpc_token = data.ocpc_token;
	}catch(e){}
}
function code_display(class_name,info){
	//$("body").append('<div class="zhezhaocc" style="position: fixed;top:0;left:0;right:0;bottom:0;background-color: rgba(0,0,0,0.5);z-index:8888;display: none;cursor: pointer;"></div>');
    $('.'+class_name).html('<span class="wxhao">' + info.wxnumber + '</span><img data-wxhao="'+info.wxnumber+'" data-wxid="'+info.wechat_id+'" src="'+path_url+'/static/img/see2wm.png" align="middle" style="cursor: pointer;vertical-align: top;"><div style="width:238px;height:271px;position:fixed;top:50%;margin-top:-120px;left:50%;margin-left: -120px;z-index: 9999;display: none;background:url('+path_url+'/static/img/wxtc_bg.png) no-repeat;"><div style="width:175px;height:175px;margin:40px 0 0 26px;line-height:175px;text-align:center;font-size:0;box-sizing: border-box;"><img class="linjj" src="' + info.code + '" style="max-width:175px;height:auto;vertical-align: middle;"></div><div style="width:35px;height:35px;position:absolute;top:0;right:0;cursor:pointer;" class="wxtc_close"></div></div>');
	$("."+class_name).on('click', 'img', function () {
		go(this.dataset.wxhao,this.dataset.wxid);
		$(this).siblings("div").show();
		$(".zhezhaocc").show()
	}).on('click', '.wxtc_close', function () {
		$(".zhezhaocc").hide();
		$("."+class_name).children("div").hide()
	});
}
/*处理统计信息*/
function go(wechat,wechat_id,what_number) {
    var url = window.location.href;
    var burl1 = document.referrer;
    var stop_time = new Date().getTime();
    var residence_time = stop_time - start_time;
	var scroll_percent = window.zsly.scroll_percent || 0;
	var what_number = what_number || '';
    $.post(path_url+"/api/count", {landing_page: url, wechat: wechat, source_url: burl1, wechat_id: wechat_id, phone_model: phone_model(),residence_time:parseInt(residence_time/1000),scroll_percent:scroll_percent,what_number:what_number,ocpc_token:ocpc_token,resubmission:resubmission},function(data){
		try {
			typeof go_callback === "function" ? go_callback(data) : false;
		}catch (e) {
			console.log(e);
		}
	})
}
/*POST 请求*/
function post(url, data, success, error, debug) {
    try {
        var _data = [];
        /*IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码*//*IE6, IE5 浏览器执行代码*/
        var xmlhttp = window.XMLHttpRequest ? (new XMLHttpRequest()) : (new ActiveXObject("Microsoft.XMLHTTP"));
        xmlhttp.onreadystatechange = function (event) {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                try {
                    return success(JSON.parse(xmlhttp.responseText));
                } catch (e) {
                    if (debug) {
                        document.body.innerHTML = "function post result success error!<br>" + e;
                        console.log(e);
                    }
                }
            } else if (xmlhttp.readyState == 4) {
                try {
                    if (debug) {
                        document.body.innerHTML = xmlhttp.responseText;
                    }
                    return error(xmlhttp, xmlhttp.status, xmlhttp.responseText);
                } catch (e) {
                    if (debug) {
                        document.body.innerHTML = "function post result error error!<br>" + e;
                        console.log(e);
                    }
                }
            }
        };
        for (var key in data) {
            if (key && key.length) {
                _data.push(encodeURIComponent(key) + "=" + encodeURIComponent(data[key]));
            }
        }
        xmlhttp.open("POST", url);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(_data.join("&"));
    } catch (e) {
        if (debug) {
            document.body.innerHTML = "function post error!<br>" + e;
            console.log(e);
        }
    }

}
/*手机类型*/
function phone_model () {
    var u = navigator.userAgent;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1;
    var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
    if (isAndroid == true) {
        return 'Android'
    } else if (isiOS == true) {
        return 'IOS'
    } else {
        return 'Windows'
    }
}

function js_error(xhr, status, statusContent, errorText){
    try{
        var error_text = errorText?errorText:'日常错误';
        var account = zsly[1];
        var data = {
            // browser_app_code_name:navigator.appCodeName,
            // browser_app_name:navigator.appName,
            // browser_app_version:navigator.appVersion,
            // browser_language:navigator.language,
            // browser_oscpu:navigator.oscpu,
            // account:account,
            landing_page:window.location.href,
            source_url:document.referrer,
            error_text:error_text,
            status:status,
            status_mold:statusContent.mold,
            account:statusContent.account_id?statusContent.account_id:account,
            account_name:statusContent.account_name,
            channel:statusContent.channel_id,
            channel_name:statusContent.channel_name,
            status_text:statusContent.text,
        };
        post(error_url,data,function(statusText){

        },function (xhr, status, statusText) {

        });
    }catch (e) {
        console.log(e);
    }

}
(function () {
    var F = document.getElementsByClassName("Time_Month_1");
    var D = new Date;
    var M = D.getMonth();
    var M_day = D.getDate();
    if (M >= 11) {
        M += 2 - 12
    } else if (M == 3 && M_day > 25) {
        M = '五一劳动节'
    } else if (M == 4) {
        if (M_day < 5) {
            M = '五一劳动节'
        } else if(M_day<25){
            M += 1
        } else{
            M +=2
        }
    } else if (M == 8 && M_day > 25) {
        M = '十一'
    } else if (M == 9) {
        if (M_day < 5) {
            M = '十一'
        } else if(M_day<25){
			M += 1
		}else{
			M += 2
		}
    } else  if(M_day<25){
        M += 1
    }else{
        M += 2
    }
    if (!isNaN(M)) {
        M += '月'
    }
    for (var i = 0; i < F.length; i += 1) {
        F[i].innerHTML = M
    }
})();

try{
	var page_url = window.location.origin+window.location.pathname;
	post(path_url+'/api/comment/check',{page_url:page_url},function(e){
		if(e.status == 'success' && e.ycpl=='yes'){
			$('.ycpl').hide();
			$('.articleinfos').hide();
		}
	});
}catch(e){
  //TODO handle the exception
}

try{
	// 页面总高
	var totalH = document.body.scrollHeight || document.documentElement.scrollHeight
	// 可视高
	var clientH = window.innerHeight || document.documentElement.clientHeight
	// 滚动百份比
	window.zsly.scroll_percent = '0';
	window.addEventListener('scroll', function(e){
		// 计算有效高
		var validH = totalH - clientH
		// 滚动条卷去高度
		var scrollH = document.body.scrollTop || document.documentElement.scrollTop
		// 百分比
		
		window.zsly.scroll_percent = scrollH >= validH ? 100 : (scrollH/validH*100).toFixed(0);
	})
}catch(e){
	console.log('scroll_percent is error');
}
