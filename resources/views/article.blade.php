
<!DOCTYPE html>
<!-- saved from url=(0043)http://youji.zhilhu.com/gz_bd_p2/index.html -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>{{ $article->web_title }}</title>
    <meta name="keywords" content="{{ $article->keywords ?? '旅游' }}">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="./files/01.css">
    <link rel="stylesheet" href="./files/barrager.css">
    <link rel="stylesheet" href="./files/layer.css" />
    <script type="text/javascript" src="./files/jquery.min.js"></script>
    <script src="./files/layer.js"></script>
    <script type="text/javascript" src="./files/jquery.barrager.min.js"></script>

</head>

<body>

<div class="body">

    <div class="body-head">
        <div class="body-head-middle">

            <ul class="mhide">

                <li onclick="jumpj(&#39;top&#39;)">首页</li>
                <li onclick="jumpj(ask)">评论</li>
                <li onclick="goLink()">精选</li>
                <li onclick="jumpj(&#39;bot&#39;)" class="hidem">攻略</li>
                <li class="JJLin">当地向导</li>
            </ul>
            <div class="body-head-middle-right mhide">
                <div class="search">
                    <input type="" name="" id="" value="" placeholder="搜索攻略、问答">
                    <img src="./files/searchbtn.png" class="searchbtn" style="cursor: pointer;">
                </div>
                <div class="headicon qq" style="margin-right: 20px;"></div>
                <div class="headicon weibo" style="margin-right: 30px;"></div>
            </div>
            <div class="body-head-m-box pchide">
                <img class="body-head-m-avatar whimg" src="./files/a01.jpg">
                <span style="color: white;" onclick="jumpj(&#39;top&#39;)"></span>
                <div class="body-head-m-menu">
                    <img class="body-head-m-menu" src="./files/menu.png">
                    <ul class="body-head-m-ul">
                        <li onclick="jumpj(&#39;top&#39;)"><span>首&nbsp;&nbsp;页</span></li>
                        <li onclick="jumpj(ask)"><span>评&nbsp;&nbsp;论</span></li>
                        <li class="m-contactbtn" style="border: none;"><span>向&nbsp;&nbsp;导</span></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="body-banana">
        <div class="avatar-box">
            <img class="mhide bannerHD" src="storage/{{$article->bg_img}}" style="position: absolute;left:-46%">
            <div class="avatar-middle">
                <div class="avatar">
                    <div class="avatar-left">
                        <div class="avatar-left-title">
                            <span>{{$article->title}}</span>
                        </div>
                        <div class="avatar-left-icon">
                            <div>
                                <img src="./files/timeicon.png">
                                <span>{{$article->trip}}天</span>
                            </div>
                            <div>
                                <img src="./files/dateicon.png">
                                <span><span class="thisMonth">{{$article->method}}</span>月</span>
                            </div>
                            <div>
                                <img src="./files/casticon.png">
                                <span>人均{{$article->cost}}</span>
                            </div>
                            <div>
                                <img src="./files/tripicon.png">
                                <span>{{$article->type}}</span>
                            </div>
                        </div>
                        <div class="avatar-left-icon2" id="links">
                            @foreach(explode(',', $article->tag) as $v)
                  <span style="width:90px"><a href="javascript:;" style="color:#fff;">

                            {{$v}}
                  </a></span>
                            @endforeach
{{--                            <span><a href="#tiao2" style="color:#fff">--}}
{{--                    苗族风情--}}
{{--                  </a></span>--}}
{{--                            <span><a href="#tiao3" style="color:#fff">--}}
{{--                    高山流水--}}
{{--                  </a></span>--}}
{{--                            <span><a href="#tiao4" style="color:#fff">--}}
{{--                    最新评论--}}
{{--                  </a></span>--}}
                        </div>
{{--                        <script>--}}
{{--                            $("#links span").on("click",function(){--}}
{{--                                var $index = $(this).index();--}}
{{--                                var $width = $(window).width();--}}
{{--                                switch($index){--}}
{{--                                    case 0:--}}
{{--                                        var $tiao1 =  $("#tiao1").offset().top;--}}
{{--                                        if($width>1200){--}}
{{--                                            $("html,body").animate({scrollTop:$tiao1-70});--}}
{{--                                        }--}}
{{--                                        break;--}}
{{--                                    case 1:--}}
{{--                                    case 2:--}}
{{--                                        var $tiao2 =  $("#tiao2").offset().top;--}}
{{--                                        if($width>1200){--}}
{{--                                            $("html,body").animate({scrollTop:$tiao2-70});--}}
{{--                                        }--}}
{{--                                        break;--}}
{{--                                    default:--}}
{{--                                        return false;--}}
{{--                                }--}}
{{--                            });--}}
{{--                        </script>--}}
                        <div class="avatar-left-info">
                            <span>发布时间：{{$article->created_at->toDateString()}}
{{--                            <span class="thisYear">2019</span>-<span class="thisMonth">06</span>-<span class="thisDay">7</span>--}}
                            </span>
                            <span>阅读量：{{$article->read_count}}</span>
                        </div>
                    </div>
                    <div class="avatar-right">
                        <div class="avatar-right-head">
                            <div class="avatar-right-head-img JJLin" style="cursor: pointer;">
                                <img class="vipicon" src="./files/VIP.png">
                                <img class="avataricon whimg" src="./files/a01.jpg">
                            </div>
                        </div>
                        <span class="wxname"></span>
                        <div class="avatar-right-info">
                            <img src="./files/like.png">
                            <span style="margin-right: 34px;">8586</span>
                            <img src="./files/chat.png">
                            <span>7320</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="body-middle">
{{--        {!! $article->content !!}--}}
        <div class="item hidem">
            <div class="item-note">
                <span>贵州到底有多好玩？快来我告诉你呀！</span>
                <span class="contact-blue JJLin">联系当地管家</span>
            </div>
        </div>
        <!--<div class="item">
					<img src="img/01.jpg" />
				</div>-->
        <div class="item">
            <p>因为对云贵高原上贵州这座神秘城市的向往，我前后去过贵州不下三次，只有经历过它的四季才能说得上对它熟悉，所以现在问我：贵州有哪些好看好玩的地方，我应该很有发言权了。黄果树瀑布、小七孔、西江千户苗寨、梵净山、镇远古镇…每次去都有新收获，贵州真的是太美了。</p><br>
            <p>想了解我们的行程、路线、价格的朋友们可以加<span class="bnname"></span>金牌管家<span class="wxname"></span>的微信：<span class="weixin"></span>（免费咨询呦）。</p><br>
            <p>最近一次去贵州是上个星期，我们一行9人又有大半数是第一次去，自由行的话酒店和景点门票太难定了，景点之间距离又远难去，跟团又担心遇上低价购物团强制消费闹得不愉快，最后我问了下经常出去玩的驴友，<span class="wsex">他</span>就给我介绍了自己去贵州时找的<span class="bnname"></span>团队<span class="wxname"></span>管家。管家根据我们的需求安排好了行程，提前订好了酒店和门票，还有专车接送，重要的是<span class="wxname"></span>管家还会一路陪同，为我们介绍景点，帮我们拍美美的照片，我们只管尽兴玩就行了。这次的贵州之旅朋友们都玩得格外开心，<span class="bnname"></span>金牌管家<span class="wxname"></span>绝对功不可没。</p>
        </div>
        <div class="item">
            <div class="mcimg">
                <img src="./files/02.jpg" style="width:100%;">
            </div>
        </div>
        <div class="item" id="xctitle">
            <div class="span-box">
                <span class="line-blue"></span>
                <span class="span-title">行程简介</span>
            </div>
        </div>
        <div class="item">
            <div class="title-box">
                <div class="box-blue">D1</div>
                <p class="title-box-item">出发地——贵阳</p>
            </div>
            <div class="title-box">
                <div class="box-blue">D2</div>
                <p class="title-box-item">贵阳-黄果树瀑布，可以游陡坡塘、天星桥、黄果树瀑布景区</p>
            </div>
            <div class="title-box">
                <div class="box-blue">D3</div>
                <p class="title-box-item">荔波-小七孔景区，可以游鸳鸯湖、水上森林、拉雅瀑布、卧龙潭等</p>
            </div>
            <div class="title-box">
                <div class="box-blue">D4</div>
                <p class="title-box-item">千户苗寨-凯里-铜仁</p>
            </div>
            <div class="title-box">
                <div class="box-blue">D5</div>
                <p class="title-box-item">铜仁-梵净山（佛教圣地）-镇远</p>
            </div>
            <div class="title-box" style="margin-bottom: 0px;">
                <div class="box-blue">D6</div>
                <p class="title-box-item">镇远-贵阳（返程）</p>
            </div>
        </div>
        <div class="item">
            <img src="./files/05.jpg">
        </div>
        <div class="item">
            <div class="span-box">
                <span class="line-blue"></span>
                <span class="span-title">行程介绍</span>
            </div>
        </div>
        <div class="item">
            <div class="title-box2">
                <div class="box-blue2">第一天</div>
                <p>上海——抵达贵阳</p>
            </div>
        </div>
        <div class="item">
            <p>我们是从上海出发直飞贵阳的，一出机场大厅就看到<span class="bnname"></span>金牌管家<span class="wxname"></span>在挥手迎接我们的到来，专车直奔入住酒店。<br>
                下午自由活动去了附近景点，姜文成名作《寻枪》拍摄地-青岩古镇、贵阳标志性建筑（甲秀楼、文昌阁），晚上在27路小吃街吃了贵阳当地特色小吃，丝娃娃、留一手烤鱼、肠旺面等。漫步在贵阳街头，领略夜间的热闹…贵州的多姿多彩仿佛都糅合在这美丽的星空下。
                <br> 如果大家有需要的话也可以联系管家帮忙提前安排呦，<span class="bnname"></span>金牌管家<span class="wxname"></span>微信：<span class="weixin"></span>

            </p>
        </div>
        <div class="item">
            <div class="mcimg">
                <img src="./files/06.jpg">
                <img src="./files/07.jpg">
            </div>

        </div>
        <div class="item">
            <div class="title-box2">
                <div class="box-blue2">第二天</div>
                <p>黄果树瀑布</p>
            </div>
        </div>
        <div class="item">
            <p>要去黄果树瀑布了有点激动！一早<span class="bnname"></span>管家<span class="wxname"></span>就到酒店来接我们了，早餐后直奔黄果树瀑布！管家已经提前帮我们预定好了观光车，so朝着大瀑布前进。还没靠近就听到了巨大的水声，亲眼看到瀑布后真的充分感受到了大自然的神奇，还可以从上、下、前、后、左、右六个方位进行观赏瀑布，西游记的水帘洞就在瀑布的后面。站在瀑布面前，大自然的震撼和感动之情混杂在一起，甚至有点美得让人说不出话来。</p>
        </div>
        <div class="item">
            <img src="./files/08.jpg">
        </div>
        <div class="item" id="tiao1">
            <div class="title-box2">
                <div class="box-blue2">第三天</div>
                <p>小七孔景区</p>
            </div>
        </div>
        <div class="item">
            <p>早上我们吃完早餐后就去“中国最美的地方”，“地球上的绿宝石”——荔波小七孔，感受大自然的鬼斧神工以及享受大自然带给我们的天然氧吧，深呼吸洗肺。这一天我们选择在特别的地方见证爱情，从七孔桥上走过，留下我们的足迹。还有美丽的卧龙潭，一切都是那么醉人。小七孔景区门票为130。一般玩1天。</p>
        </div>
        <div class="item">
            <div class="mcimg">
                <img src="./files/09.jpg" style="width:100%;">
            </div>
        </div>
        <div class="item">
            <p>然后晚上到达西江千户苗寨，管家给我们安排入住的是苗寨特色吊脚楼，晚上登观景台看万家灯火夜景，俯瞰整个苗寨，夜晚的苗寨变得宁静，增添了一份静谧的感动。 如果大家想住苗寨看夜景感受苗族文化的话可以联系一下<span class="bnname"></span>的<span class="wxname"></span>管家，这是<span class="wsex">他</span>的微信<span class="weixin"></span>，有需要就添加哦。</p>
        </div>
        <div class="item" id="tiao3">
            <img src="./files/12.jpg">
        </div>
        <div class="item" id="tiao2">
            <div class="title-box2">
                <div class="box-blue2">第四天</div>
                <p>西江千户苗寨—铜仁</p>
            </div>
        </div>
        <div class="item">
            <p>早起在寨子里面逛逛，白天苗寨揭开了神秘的面纱，苗寨四面环山，重峦叠嶂，梯田依山顺势直连云天，白水河穿寨而过，将西江苗寨一分为二。寨内吊脚楼层层叠叠，顺山势而建，又连绵成片，阳光明媚的早晨，清晨的第一缕阳光似乎可以照进每个人的心窝。</p>
        </div>
        <div class="item">
            <img src="./files/13.jpg">
        </div>
        <div class="item">
            <p>在苗寨里吃饭绝对是一大亮点，“高山流水”酒是苗寨热情的一种待客礼仪，就是一边喝一边倒。在贵州雷山流传一首歌“来到苗乡先品酒，你喜欢也要喝，不喜欢也要喝，管你喜欢不喜欢都要喝，你喜欢喝一杯，不喜欢喝三杯……”。当然，如果你真的喝不下了不要用手去托碗，用手碰碗示意是要把酒喝完的意思，你可以摇摇手表示自己喝不下了，哈哈，考验你酒量的时候来了！来看看同伴们的“高山流水”。永远记得那句“干一杯呀干一杯”。</p>
        </div>
        <div class="item">
            <div class="mcimg">
                <img src="./files/14.jpg">
                <img src="./files/15.jpg">
            </div>
        </div>
        <div class="item">
            <div class="title-box2">
                <div class="box-blue2">第五天</div>
                <p>铜仁—梵净山（佛教圣地）—镇远</p>
            </div>
        </div>
        <div class="item">
            <p>梵净山是贵州独特的一个地标，是黔东灵山，是生态王国，是风景胜地，是一方净土。2018年7月2日，铜仁梵净山成功列入了世界自然遗产名录，梵净山申遗的成功让更多的人知道了这个佛教胜地，到这里一票难求。我们去的时候人挺多的，排队上山就花了一个多钟，为了看风景不留下遗憾，排队也值了。</p>
        </div>
        <div class="item">
            <img src="./files/16.jpg">
        </div>
        <div class="item">
            <p>特别提醒哦，乘坐索道一定要提前预定好！现场买票至少要排队两小时，而且很有可能没票！还好我们有<span class="bnname"></span>金牌管家<span class="wxname"></span>帮我们提前预定了，到达梵净山就直接乘坐索道开始了浪漫旅行，旁边的小年轻没买到票急得都吵架了哈哈~大家有要去贵州旅行的，不如直接找我们的<span class="bnname"></span>金牌管家<span class="wxname"></span>吧，给你们安排得明明白白~微信 <span class="weixin"></span>（←点击复制微信）</p>
        </div>
        <div class="item">
            <img src="./files/17.jpg">
        </div>
        <div class="item">
            <div class="title-box2">
                <div class="box-blue2">第六天</div>
                <p>游玩镇远古镇</p>
            </div>
        </div>
        <div class="item">
            <p>具有2000多年的历史，是贵州省黔东南苗族侗族自治州镇远县名镇，位于舞阳河畔，四周皆山，河水蜿蜒，以"S"形穿城而过。镇远古镇是不需要门票的，但是里面的小景点都是需要另外购票的。如：舞阳河、石屏山、铁溪古城。</p>
        </div>
        <div class="item">
            <img src="./files/18.jpg">
        </div>
        <div class="item">
            <p>或许会有人问买门票值不值？我个人认为值得，来到镇远古镇，不去了解这里的历史，不走进<span class="wsex">他</span>的怀抱，不在舞阳河乘船泛舟看浆声灯影的镇远，怎么能了解这座古城，所以还是值得的。</p>
        </div>
        <div class="item">
            <img src="./files/19.jpg">
        </div>
        <div class="item">
            <p>这次贵州之旅玩得很开心，真心感谢——<span class="bnname"></span>的<span class="wxname"></span>管家的热情服务及周到安排，想要玩得省心省钱的朋友，可以联系<span class="wsex">他</span><span class="weixin"></span>重要的是苗阿妹<span class="wxname"></span>管家对贵州特别熟，没带我们走弯路，全程没有购物也没有隐形消费，非常热情，有问必答，专业的事交给专业的人做，相对于自己瞎逛要省心很多。这次九人贵州之旅可以说是很完美了。在<span class="wsex">他</span>的推荐下，我们也品尝到了很多之前没有吃过的特色美食，希望下次再来贵州时，<span class="bnname"></span>金牌管家<span class="wxname"></span>可以为我们安排更多的特色景点啦。</p>
        </div>
        <div class="item">
            <img src="./files/20.jpg">
            <img src="./files/20-1.jpg">
        </div>
        <div class="item">
            <p>自从上次分享游记之后，很多人都来问我：“<span class="bnname"></span>金牌管家<span class="wxname"></span>是谁？”“你都去过好几次了，为什么还要找人啊？”<br>
                其实常旅行的人一定知道，如果想要行程更简单、更轻松，是不想自己花太多时间去想酒店预定、租车接送、出行路线，费用预算的，我想要的旅行就是我完全放松的去玩，其它的琐碎事有靠谱的人安排好就行！<span class="bnname"></span>金牌管家<span class="wxname"></span>就是这样的必须存在啊，<span class="wsex">他</span>能：
                1、根据我的想法帮我定制化路线，安排好行车、酒店、特色饮食等<br>
                2、需要买票的景点，总是提前帮我预定好，节约排队时间<br>
                3、提供免费接送服务，行程自由，不赶鸭子上架<br>
                4、<span class="bnname"></span>金牌管家<span class="wxname"></span>是专业的私享旅行定制师，专业强、口碑好<br>
                5、自由行，想去哪就去哪，轻松自在<br>
                所以我才总是推荐<span class="bnname"></span>金牌管家<span class="wxname"></span>给大家，只要去贵州，<span class="bnname"></span>金牌管家<span class="wxname"></span>就是我的首选向导！再次跟大家分享一次哦：<br>
                <span class="bnname"></span>金牌管家<span class="wxname"></span>，微信<span class="weixin"></span>（←点击复制微信）<br>
                这趟行程，总共6天5晚，个人总花费才1800左右，吃住行和门票都由<span class="bnname"></span>金牌管家<span class="wxname"></span>帮我们安排，没有购物和隐形消费，全程带着我们九个人玩，不仅玩的开心还玩的超级划算！！</p>
        </div>
        <div class="item">
            <img src="./files/21.jpg">
        </div>
        <div class="item">
            <div class="span-box">
                <span class="line-blue"></span>
                <span class="span-title">贵州旅游注意事项</span>
            </div>
        </div>
        <div class="item">
            <p>1、在贵州游玩不能提前订住宿，要不然会走很多冤枉路，回头路，你要先规划好自己的行程，再根据行程定相对区域的住宿，建议还是不要自己玩，除非你是土豪，让别人坑不在乎钱，贵州是旅游城市，陷阱很多啊！<br>
                2、贵州游玩的景区众多，景点比较分散，自己玩容易走回头路，非常浪费时间，如果经济能力可以，还是自由行玩，可以请<span class="bnname"></span>安排 微信<span class="weixin"></span>，由当地专业的司机兼向导带着玩，不建议自驾游，当地景区分散，且道路崎岖，为了自己的安全还是不建议自驾玩，重要的是安全而且玩的开心呢。<br>
                3、千万不要去参加各种低价团，现在贵州的一般的旅行社都是有强制消费和购物。团费很低，所以大家还是不要参加那种低价团。<br>
                4、 晕车的话提前做好准备，一定要记得携带晕车药、晕车贴。不要因为身体原因影响游玩心情哦。<br>
                5、贵州气候不太稳定，多雨潮湿，有“天无三日晴”的说法，无论什么时候出门，建议随身携带雨具。而且贵州地处高原，紫外线强烈。防晒措施一定要做好，以免晒伤。<br>
                6、贵州的少数民族较多，特别是黔东南一带，要尊重他们的生活和信仰，避免与当地居民发生冲突。比如苗族人好客，敬酒表示对客人的欢迎，有可能会让客人喝很多酒，如果不能喝一定要对他们说明。</p>
        </div>
        <div class="item">
            <img src="./files/22.jpg">
        </div>
        <div class="item">
            <p>贵州多数地方处于山地和高原，气候多变，山路崎岖，多少数民族聚居，以上的事情都需要注意。</p>
        </div>
        <div class="item">
            <div class="lcopyright">
                <p>本文著作权归 @<span class="wxname"></span> 所有，任何形式转载请联系作者。©2019</p>
            </div>
        </div>
    </div>
    <div class="body-chat" id="ask">
        <div class="body-chat-head" id="tiao4">
            <div class="span-box">
                <span class="line-blue"></span>
                <span class="span-title">最新评论</span>
            </div>
            <span class="contact-blue chatbtm" style="width: 98px;" onclick="jumpj(&#39;.chat-item-input&#39;)">发表评论</span>
        </div>
        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a01(1).jpg">
                    <span>老桐0740</span>
                    <span>LV.12</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay2">8</span></span>
            </div>
            <div class="chat-item-body">
                <p>您好，你们的6天线路1800多的费用是包含景点门票住宿用餐了吗？玩得怎么样？第一次去不想留什么遗憾谢啦。</p>
            </div>
            <!--<div class="chat-item">
                          <img src="img/12.jpg" />
                      </div>-->
        </div>

        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a02.jpg">
                    <span>澄澄游世界</span>
                    <span>LV.15</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay2">8</span></span>
            </div>
            <div class="chat-item-body">
                <p><b>@老桐0740：</b>是的，都是包含的，吃住行都非常不错，玩得也很赞。这个行程性价比很高！<span class="bnname"></span>是专门接待像我们这种结伴游、半自由行的客人的，个人觉得<span class="wsex">他</span>们优点就是服务好、收费公道，而且管家还可以根据我们的需求喜好帮我们推荐或定制行程。你如果要去的话可以提前联系，加微信聊很方便，把<span class="wsex">他</span>微信推给你<span class="weixin"></span> ，有什么不懂的都可以问。</p>
            </div>
        </div>

        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a03.jpg">
                    <span>拜托了2019年</span>
                    <span>LV.12</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay2">8</span></span>
            </div>
            <div class="chat-item-body">
                <p>刚从贵州回来，去网红景点打卡了。</p>
            </div>
        </div>

        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a04.jpg">
                    <span>王叁無</span>
                    <span>LV.82</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay2">8</span></span>
            </div>
            <div class="chat-item-body">
                <p>是阿，楼主我觉得你说得很对，个人觉得6天时间玩遍贵州差不多了，我们当时去贵州也是叫<span class="wxname"></span>管家给安排的行程，跟你走的景点差不多，此次贵州这个行程总体感觉：省心，一眼望去，都是绿意，就是享受度假、超放松的感觉，从繁忙的现实世界中抽离....为我们服务的旅行管家很是辛苦......难忘的是：贵州菜
                    两个字“地道”辣儿爽！！！感谢<span class="wxname"></span>管家给了我们一次完美的旅行。</p>
            </div>
            <div class="chat-item">
                <img src="./files/23.jpg">
            </div>
        </div>

        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a05.jpg">
                    <span>柠n檬mm不萌</span>
                    <span>LV.56</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p>你们说的景点都很想去，因为这次是带着家人出去旅游，有老人也有小孩，想省点事，自己去太麻烦，看了大家的介绍感觉挺好的，可以推荐下<span class="bnname"></span>旅游管家的联系方式吗？</p>
            </div>
        </div>

        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a06.jpg">
                    <span>旺崽cattt</span>
                    <span>LV.69</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p>我想咨询一下，<span class="bnname"></span>团队有时间比较短的行程吗？比如3天2晚的。</p>
            </div>
        </div>

        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a04.jpg">
                    <span>王叁無</span>
                    <span>LV.48</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p>统一回答一下！本来为了避免广告嫌疑，是没打算发微信号的。但是看到很多朋友都想了解苗阿妹给我们安排的这个行程，再加上管家安排的行程服务确实很好，就帮宣传一下，如果大家想去贵州旅游可以加<span class="bnname"></span><span class="wxname"></span>管家的微信 <span class="weixin"></span>咨询。</p>
            </div>
        </div>
        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a07.jpg">
                    <span>Patrick_嘉</span>
                    <span>LV.12</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p>现在去的话不知道人多不多，我想带着孩子过去呢~~</p>
            </div>
        </div>
        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a02.jpg">
                    <span>澄澄游世界</span>
                    <span>LV.15</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p><b>@Patrick_嘉：</b>贵州旅游的话人应该不是很多，反正之前我们去的时候还好。不过我也不是很清楚，你加下微信咨询下吧，<span class="wsex">他</span>比较专业。反正咨询又不花钱，了解清楚也好过在网上胡乱找攻略强。</p>
            </div>
        </div>
        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a07.jpg">
                    <span>Patrick_嘉</span>
                    <span>LV.12</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p>好的好的，谢谢。</p>
            </div>
        </div>
        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a08.jpg">
                    <span>章鱼姐</span>
                    <span>LV.17</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p>是的，是的，贵州旅游找苗阿妹安排就是放心，老婆夸<span class="wsex">他</span>100分，吃住都安排很好很热情，整个行程至少省了有1000多块钱，关键是不累，赞一个！贵州旅游咨询找<span class="wsex">他</span>问比看攻略省心多了。</p>
            </div>
        </div>
        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a09.jpg">
                    <span>东东大东东</span>
                    <span>LV.19</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p>真的是缘分，我们也是上个月才从贵州旅游回来，就是找<span class="bnname"></span>报的团。我是在动车上听到有一对小情侣在说旅游的事，打听了一下大概的情况。火车上加的<span class="wxname"></span>管家的微信。聊了10多分钟吧，就定了5日游的团，玩得也很好，黄果树瀑布一定要去！！我现在都推荐我朋友去贵州旅游就找<span class="bnname"></span>。确实很好。</p>
            </div>
        </div>
        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a10.jpg">
                    <span>sunny</span>
                    <span>LV.19</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p>个人总结：贵州游主要是山水体验，出门前找攻略看游记，到地方还是一头雾水，找不着路，搭错车，吃饭被宰，住宿被坑，后悔在家的时候没有提前预定，浪费时间还花了很多冤枉钱，都是经验教训啊，建议楼主去贵州玩的话还是找个当地人带着玩比较好。</p>
            </div>
        </div>
        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a11.jpg">
                    <span>吃货最美丽</span>
                    <span>LV.22</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p><b>@sunny：</b>这么可怕的吗？那俺还是先加楼上推荐的导游先问问吧。</p>
            </div>
        </div>
        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a12.jpg">
                    <span>芥茉柚子茶</span>
                    <span>LV.39</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p>去贵州旅游那边最好是选择散客结伴行自由行比较好，报团游就是走马观花加进购物店，自己去玩可能又玩不到精髓的景点，景点之间距离远搭车找路累得够呛。之前去过贵州的一个朋友也是向我推荐<span class="bnname"></span>的行程规划师<span class="wxname"></span>，设计了专属的行程旅游方案，玩的很开心。在这里把<span class="wsex">他</span>推荐给大家 微信 <span class="weixin"></span> 。</p>
            </div>
        </div>
        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a13.jpg">
                    <span>罗伊小公举</span>
                    <span>LV.39</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p>去年腊月22我去了贵州旅游，趁着放年假就带家人出去走走，春节旅游旺季，5天平均一人1600多的行程<span class="bnname"></span>的<span class="wxname"></span>导游还给省了零头，玩得还挺不错的，因为带有老人和小孩，出行有专车接送方便很多，住的酒店也很不错，而且管家也很照顾我的家人，旅行途中有很多不懂的地方都会及时耐心给我们解答，旅行途中还帮我们拎东西、拍照，说话风趣幽默，人很好哦，这是<span class="wsex">他</span>的微信 <span class="weixin"></span><br>
                    上次回来的时候还说要给<span class="wsex">他</span>介绍朋友过去的，有需要的朋友可以加<span class="wsex">他</span>微信呦。</p>
            </div>
        </div>
        <div class="chat-item-box">
            <div class="chat-item-head">
                <div class="chat-avatar">
                    <img src="./files/a14.jpg">
                    <span>如昨</span>
                    <span>LV.39</span>
                </div>
                <span>2019-<span class="thisMonth">06</span>-<span class="thisDay1">9</span></span>
            </div>
            <div class="chat-item-body">
                <p>刚旅游完，现在还在回老家的车上，大家介绍的导游安排的确实很好，很负责任也很热心，有时候晚上11点多联系都会回消息给我，挺不错的吧。</p>
            </div>
        </div>

        <!--<div class="chat-item-box">
					<div class="loadmore"><span>加载更多</span></div>
				</div>-->
    </div>
    <div class="chat-item-input">
        <div style="margin-bottom: 10px;position: relative;">
            <p style="margin-bottom: 10px;">
                评论
            </p>
            <div class="input-border">
                <textarea type="text" name="" id="chatarea" value="" placeholder="请输入评论..."></textarea>
            </div>
        </div>
        <div style="text-align: right;">
            <button id="chaton">发布</button>
        </div>
    </div>

    <div class="body-bot" style="display: none;">
        <div class="body-chat-head" style="align-items: center;">
            <div class="span-box">
                <span class="line-blue"></span>
                <span class="span-title">更多贵州攻略</span>
            </div>
            <span style="color: rgb(26,174,234);cursor: pointer;" onclick="jumpj(&#39;top&#39;)">查看更多&gt;</span>
        </div>
        <div class="body-bot-info">
            <div class="body-bot-info-item">
                <img src="./files/bot-01.jpg">
                <div>一起去祖国的贵州游...</div>
            </div>
            <div class="body-bot-info-item">
                <img src="./files/bot-02.jpg">
                <div>初到贵州，不容错过的景点及玩法...</div>
            </div>
            <div class="body-bot-info-item">
                <img src="./files/bot-03.jpg">
                <div>贵州城市徒步路线，一站打卡网红...</div>
            </div>
        </div>
        <div class="body-bot-info">
            <div class="body-bot-info-item">
                <img src="./files/bot-04.jpg">
                <div>看美景，贵州各种美食也...</div>
            </div>
            <div class="body-bot-info-item">
                <img src="./files/bot-05.jpg">
                <div>贵州攻略，各种注意事项自...</div>
            </div>
            <div class="body-bot-info-item">
                <img src="./files/bot-06.jpg">
                <div>贵州最好玩的景点你还没去过？这...</div>
            </div>
        </div>
    </div>
    <div class="copyright" style="margin-bottom:75px">
        <p><span class="Fcompany">纯玩客(东莞)旅游咨询服务有限公司</span></p>
        <p>Copyright@2018 <span class="Ficp">粤ICP备18082808号-1</span></p>
        <p><span class="Faddress">东莞市南城区第一国际F座702
            电话：0769-22271540</span></p>
    </div>
    <div class="botwarnning">
        <div style="text-align: center;">
            <span>抱歉！！</span><br>
            <span class="thiswarnning">一起去祖国最南端的贵州游...</span><span>页面请求超时</span><br>
            <span class="botcounts">3</span><span>秒后返回</span>
        </div>
    </div>

</div>
<div>
    <!-- <div class="m-contact pchide">
      <ul>
        <li>推荐向导</li>
        <li><span class="wxname"></span></li>
        <li>微信：<span class="weixin"></span></li>
      </ul>
    </div> -->
    <style>
        .Question-sideColumn {
            width: 296px;
            float: right;
        }.Question-sideColumn--sticky .Card:last-of-type {
             margin-bottom: 0;
         }.RelatedLives-title {
              padding: 0 16px;
          }.Card-header {
               display: -webkit-box;
               display: -ms-flexbox;
               display: flex;
               -webkit-box-pack: justify;
               -ms-flex-pack: justify;
               justify-content: space-between;
               -webkit-box-align: center;
               -ms-flex-align: center;
               align-items: center;
               height: 50px;
               padding: 0 20px;
               border-bottom: 1px solid #f0f2f7;
               box-sizing: border-box;
           }.Card-headerText {
                overflow: hidden;
                font-weight: 500;
                text-overflow: ellipsis;
                white-space: nowrap;
                line-height: 50px;
            }.Card-section {
                 padding: 16px 20px;
                 position: relative;
             }
        #wechat{display: none;}
        .Question-sideColumn{display: none;}
        @media screen and (min-width: 0px) and (max-width: 768px) {
            #wechat{display: block;}
            /* .Question-sideColumn{display: block;} */
        }
        @media screen and (min-width: 0px) and (max-width: 414px){
            #side{top: 20%;right: 15%;}
        }
        @media screen and (min-width: 0px) and (max-width: 375px){
            #side{top: 20%;right: 10%;}
        }
        @media screen and (min-width: 0px) and (max-width: 320px){
            #side{top: 20%;right: 4%;}
        }
    </style>
    <div class="Question-sideColumn Question-sideColumn--sticky" style="display: block;">
        <div id="side" style="position: fixed; width: 296px; background: rgb(255, 255, 255); border-radius: 20px;display: none;z-index: 99999; ">
            <!--相关 Live 推荐-->
            <div class="Card">
                <!-- <div class="Card-header RelatedLives-title">
                  <div class="Card-headerText" style="font-size: 24px;"> 相关推荐 </div>
                </div> -->
                <!-- <div class="Card-section RelatedLives-list">  -->
                <!--取得一个分页DataTable-->
                <!-- </div> -->
                <div class="ma">
                    <div style="margin:auto;padding:10px;border:2px solid #f5aa06;border-radius:20px;">
                        <h1 style="font-size:17px; color:#000;text-align:center;font-weight:bold;margin-bottom: 5px;">【热门推荐】<b><span class="wxname">小然</span></b>旅游金牌规划师</h1>
                        <p style="font-size:15px; color:#000;text-align:center;"> 9年旅游线路规划经验！ </p>
                        <!-- <p style="font-size:15px; color:#000;text-align:center;"> 帮你省心、省钱！ </p> -->
                        <p style="text-align: center;"> <img class="code_url" style="width:84%;" src="http://count.23lvxing.com/uploads/images/20191203/7653104b8495d79d408e6a7993dc51a3.jpg"> </p>
                        <p style="font-size:15px; color:#000;text-align:center;margin-bottom: 10px;">扫描二维码添加微信免费订制私人行程！</p>
                        <p style="text-align: center;"><button id="a_wx" data-clipboard-action="copy" data-clipboard-target=".weixin" style="padding: 10px 20px;outline: none;border: none;color: #FFF;background: #F5AA06;border-radius: 10px;" data-wechat_code="16689634132" data-wechat_id="1914">点击添加<span class="wxname1">小然</span>微信免费获取行程</button></p>
                    </div>
                </div>
            </div>
            <!--推荐-->
        </div>
    </div>
    <div class="m-contact-cover"></div>
</div>
<div class="about_us">
    <div class="about_us_info">
        <div class="about_us_info_head">
            <img src="./files/bg2.jpg">
            <span><span class="wxname2"></span>简介</span>
            <img src="./files/bg2.jpg">
        </div>
        <div class="about_us_info_body">
            <span class="wxname2"></span>是一家由土生土长的当地人创办的第1家导游人自己的团队，提倡向导式半自助游：1个家庭1台小车1个向导1段快乐旅途！<span class="wxname2"></span>的特色就是不固定行程、不限游览时间、不怕被坑被宰，还可以借助导游渠道享受折扣门票，旅游不仅省钱又省心！<span class="wxname2"></span>均是一群人均25岁的当地少数名族，个个都积极阳光、会唱山歌、会讲故事、重视服务，为每一个来贵州的朋友提供放心、舒心、安心的各种旅游服务，涵盖旅游导览、行程咨询、代订门票酒店等服务。<span class="wxname2"></span>的导游均来自有正规国证的旅行社“退役”的金牌导游，他们坚定的跳出充满无奈而又冰冷的旅行社行业，只因为坚守自己的最初的梦想：让游客朋友”开开心心游玩，快快乐乐回家“！
        </div>
        <div class="about_us_info_img">
            <img src="./files/img46.jpg">
        </div>
        <div class="about_us_close">X</div>
    </div>
</div>
<div class="history">
    <div class="history_info">
        <div class="history_info_head">
            <img src="./files/bg2.jpg">
            <span>品牌故事</span>
            <img src="./files/bg2.jpg">
        </div>
        <div class="history_info_body">
            <p><span class="wxname"></span>作为贵州土生土长的本地人，对这里的每一种风俗、每一个故事、每一个景点都了如指掌，为了能让更多的人了解贵州，了解自己家乡的旅游特色，<span class="wxname"></span>偶尔会在网上发些关于贵州的旅游、景点、民俗信息，于是有人开始咨询<span class="wsex">他</span>关于贵州旅游的事项，还有些人提出来请<span class="wsex">他</span>当向导，这让<span class="wxname"></span>心里萌生了一种想法——以个人的名义去做贵州半自助游。</p>
            <p>2015年，<span class="wxname"></span>正式成立了<span class="wxname2"></span>团队，在这几年间，<span class="wxname"></span>带着游客奔波行走，<span class="wsex">他</span>始终坚持自己最初的理念：一对一品质旅游，用心服务好每一位游客，用品质、口碑说话。<span class="wsex">他</span>对贵州品质自由行的坚持得到了很多游客的信任与支持，同时也有越来越多的人加入到<span class="wxname2"></span>团队这个大家庭。</p>
            <p>贵州<span class="wxname2"></span>团队作为一家提供旅行和生活信息咨询的自助游管家，始终坚信每一位游客都应该得到最好的服务与最完美的旅游体验，以多元的旅游线路产品和贴心的服务，赢得了市场，也赢得了消费者的口碑。目前，<span class="wxname2"></span>团队在携程、艺龙、马蜂窝等网络旅游电商平台上顾客好评率在98.6%以上，旺季时期日招待量高达3400人/次。</p>
            <p><span class="wxname2"></span>团队作为贵州自由行服务行业的领头羊，<span class="wxname2"></span>始终铭记“倡导高品质管家式自助游”的初衷，致力于为每一个游客朋友提供自由、省心、实惠、有意义的管家式旅游生活服务。</p>

            <p>欢迎大家到贵州玩，<span class="wxname"></span>在贵州等你们哦!</p>
            <p style="text-align: center;margin-top: 10px;"><img src="./files/img47.jpg"></p>

        </div>
        <div class="history_close">X</div>
    </div>
</div>

<script src="./files/clipboard.min.js"></script>
<script>
    function goLink(){
        var $xc = $("#xctitle").offset().top;
        var $win = $(window).width();
        if($win>768){
            $("html,body").animate({scrollTop:$xc-70});
        }
    }
</script>
<script>
    var zsly = ['pc',91];
    function get_wx_callback(data) {
        $('#a_wx').attr({'data-wechat_code':data.info.wxnumber,'data-wechat_id':data.info.wechat_id});
    }
    var clipboard = new ClipboardJS('#a_wx');
    clipboard.on('success', function(e) {
        e.clearSelection();
        $("#side").hide();
        go($('#a_wx').data('wechat_code'),$('#a_wx').data('wechat_id'));
        layer.open({title:"提示",content:"复制成功,点击确定按钮立即跳转微信~",time:false,btn:['确认','取消'],shadeClose:true,yes:function(){window.location="weixin://";$('.m-contact-cover').css('top', '-100%')},btn2:function(){$('.m-contact-cover').css('top', '-100%')}});
    });
    clipboard.on("error",function(e){
        e.clearSelection();
        layer.msg("复制失败,请手动复制",{time:1000,shadeClose:true,end:function(){return false;}});
    });
</script>
{{--<script src="http://count.23lvxing.com/static/js/zslykernel.js"></script>--}}
{{--<script type="text/javascript" src="./files/jop1.js"></script>--}}
<script>
    var _scrollTop=0;
    var tipTime;
    var hasShow=false;
    var _windowHeight=$(window).height();
    $(window).scroll(function(){
        _scrollTop=$(window).scrollTop();
        clearTimeout(tipTime);
        var isInScreen=false;
        $("span.weixin img").each(function(index,element){
            var _that=this;
            if(_scrollTop+_windowHeight>$(this).offset().top&&_scrollTop<$(this).offset().top){
                isInScreen=true;
                if(!hasShow){
                    tipTime=setTimeout(function(){
                        layer.tips('哎哟~~发现点这里可查看微信二维码',_that,{tips:[1,'#0FA6D8'],area:'250px',time:5000});hasShow=true},1e3)
                }
                return false;
            }
        });
        if(isInScreen)hasShow=false;
    });
</script>
<div class="zhezhaocc" style="position: fixed;top:0;left:0;right:0;bottom:0;background-color: rgba(0,0,0,0.5);z-index:8888;display: none;cursor: pointer;"></div>
</body>
</html>
