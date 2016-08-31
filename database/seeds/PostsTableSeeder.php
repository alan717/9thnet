<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Post::create([
            'title' => '不安全的wifi',
            'cover' => '/storage/upload/wifi.jpg',
            'content' => <<<_HEREDOC
<p>作者：贺钧威（图片较多请耐心等待）</p>
<br>
<p>耐心是一切聪明才智的基础。<br> 
——柏拉图【古希腊】<br>
随着路由器的普遍，家家户户都有wifi，往往大家只知道输入密码连接，而细心点的人会发现当下的路由器后边都有个pin码，只要你输入和路由器pin码一样的数字使用wps也可以连接上去，这就是把双刃剑了，虽然密码花样百出但是pin码……呵呵,另一种办法是靠些软件跑字典跑出相匹配的密码。写这篇文章希望大家提高网络安全意识，而不是去偷邻居家的网（还不如厚着脸皮去问）
黑客不会手动一个一个去尝试，而是利用一个自动化的工具，下面讲解怎么做这样的工具：<br>
1.插上一个U盘，打开UItraIOS（试用就好）<a href="UltraISO_xp510.rar"><em>UItraIOS下载地址</em></a>在本地目录中找到镜像所在文件夹并打开镜像（所谓镜像指的是.iso文件）<a href="CDlinux0.9.6.1_SSE中文.iso"><em>CDlinux的镜像下载</em></a>之后在启动里写入，选中你的U盘点击写入就好（会被格式化，所以U盘里不要放东西）。
<img src="/storage/upload/1.png">
<img src="/storage/upload/2.png">
<br>
初步就完成了。
<br>
2.打开Grub4Dos（<a href="grub4dos-0.4.4.zip"><em>Grub4Dos下载</em></a>）选中磁盘和你的U盘（下拉菜单里可以看存储空间的大小来辨别你的U盘），
选中不保存原来的MBR，启动时不搜索软盘，不引导原来的MBR，点安装，弹出了黑框提示successfully按回车就行。
<img src="/storage/upload/3.png"><img src="/storage/upload/4.png">
<br>
3.将这四个文件放在U盘根目录下。（menu.lst/grub.exe/grldr/splash，<a href="wifi.rar"><em>下载后解压</em></a>）
你的U盘下现在应该是这个样子，共有六个文件，这样启动U盘就做成了。
<img src="/storage/upload/5.png">
<br>
最后就是设置开机启动项，这个在装系统的时候会经常用到，会装系统的一般都懂怎么设置开机启动，一般笔记本在开机一瞬间按F12能打开快速启动项，选中你的U盘按回车，进入一个选择语言的画面，建议大家选择繁体中文，简体的貌似有问题，进入U盘启动的系统后，PIN或抓包跑字典，具体如下：
<br>
1，打开水滴。<img src="/storage/upload/6.jpg">
<br>
2.  <img src="/storage/upload/7.jpg">     
<br>
     左边无线网卡，显示出你的无线网卡的名字，就可以点右边的扫描了，等扫描结束，然后看中间看见有wps的，就是能pin的，选择一个，点击下面的Reaver，就开始破解了（这个属于PIN破解法，要点如下：3-10 seconds/pin一般几个小时就能出密码了,有防pin的路由器会等待300秒，这种方法就不可行了。<br>
<img src="/storage/upload/8.jpg">
<img src="/storage/upload/9.jpg">
<br>出密码是这样子的：<br>
<img src="/storage/upload/10.jpg">
         <br>另一种方法是抓取数据包暴力猜解（跑字典）。<br>
 <img src="/storage/upload/11.jpg">
没有客户端的不能抓包
点击启动开始抓包。
<img src="/storage/upload/12.jpg">
<img src="/storage/upload/13.jpg">
<img src="/storage/upload/14.jpg">
<br>抓到了！ 强烈推荐你不要自己跑，要跑也回WINDOWS跑。<br>
<img src="/storage/upload/15.jpg">
<br>不建议自己跑，可以在淘宝找店家跑，也不是很贵，15元  0.0
 
<img src="/storage/upload/16.jpg">
  <br>这是跑出密码的样子。

<br>如果你点了否，那么就会出现如下：
<img src="/storage/upload/17.jpg">
<img src="/storage/upload/18.jpg">   

         
<br>这是选择要拷贝的文件别看错了，下面才是要存放的目录。
<img src="/storage/upload/19.jpg">      
<img src="/storage/upload/20.jpg">

<br>至此，握手包已经到手。

<br>windows下用EWSA可以跑字典<a href="EWSA.rar"><em>EWSA</em></a>
打开EWSA（option-中文）--打开项目--你抓到的wpk--开始测试（选中一个字典），这个很简单可以自己摸索。
<br>最后补充，握手包的形式是.cap跟.cap.wkp。如果PIN破解到一半，想关机，可以把进程复制到电脑里，进程在/tmp/minidwep里，文件是.wpc（容易出错，不推荐）<br><br>
<em>the quieter you become,the more you are able to hear</em>
</p>
<br>
_HEREDOC
        ]);

        \App\Post::create([
            'title' => '社会工程学',
            'cover' => '/storage/upload/social.png',
            'content' => <<<_HEREDOC
<p>作者：贺钧威</p>
<br>
<p>杯子的容积是有限的，将10盎司的的液体往8盎司的杯子里倒，会发生什么？当然是液体溢出，流的到处都是。如果强行向杯子中倒入超过其容积的液体，只会使杯子在压力作用下破碎。</p><br>
<p>同样的原理也适用于计算机程序。设想一个小程序，开发人员为用户名字段分配了一定数量的内存空间，刚好保存"admin"这个字符长度。如果你在该字段输入20个"A"然后点击确认键，会怎么样呢？程序会崩溃并弹出错误提示窗口。因为输入的字符比分配的内存空间长，并且没有正确的错误处理程序来抛出异常，所以程序崩溃了。</p><br>
<p>软件黑客的目的就是找到能引起程序崩溃的地址，并在该地址插入恶意代码。通过控制执行过程，黑客可以让程序“执行”他想要的任何程序。他能在程序的空间中注入任何的命令，因为他有完全的掌控权，没有什么比让程序按照其意愿执行更令人兴奋的事情了。</p><br>
<p>人类的思维也可以被看做一系列运行的“软件”，随着时间的累积，渐渐地你形成了自己特有的“软件包”，建立自己的指令集、缓冲区和内存长度。人类思维的运行模式亦如此。我们为特定数据集分配了空间，如果特定数据集不能放入申请的空间，会发生什么呢？不像计算机，大脑不会崩溃，但会出现短暂的空档期，这时就可以植入命令，通过额外的数据告诉大脑该如何做。社会工程学黑客的目的是识别出运行的“程序”，并向程序插入代码，使你能植入命令，从根本上控制思维导向。
</p><br>
<h3>案例解析(选自《社会工程安全体系中的人性漏洞》)</h3><br>
<p>1.       419骗局<br><br>419骗局又称尼日利亚骗局，已发展成为一种很流行的骗局。一般情况下，骗局开始于向目标发送一封邮件（近来是发送一条短信），告诉对方被选中进行一笔很赚钱的交易，但是需要他提供一个小小的帮助。如果目标愿意帮助发信人从一家外国银行提取一大笔钱，那么他也可以分到一部分。一旦目标相信了这件事，并且“愿意帮忙”，就会出现一个问题，二解决这个问题需要目标支付一定的费用。在付出费用之后，另外一个问题又会冒出来，需要支付另一笔费用。每个问题都是“最后一个问题”和“最后一笔费用”，但在几个月之后还会冒出新问题。整个过程中目标不仅看不到一分钱，而且还会付出1万到5万美元。该骗局的惊人之处在于，过去报道过的骗局，有的采用官方文档、论文、书信抬头甚至面对面的欺骗方式。<br><br>
最近此类骗局出现了一种变化，受害者会收到一张真实的支票。诈骗者承诺一大笔钱，谎称自己仅要其中的一部分。如果目标汇出一小笔钱（例如1万美元），当收到承诺的支票时，他就可以兑现支票，留下其中的差额。这些案例中，受害者汇出了钱，但拿到的支票时假的，当他兑现支票时，会因兑现假支票而被处罚金。<br><br>2.       黑市和斯普特林大师<br><br>
2009年，一则故事曝光了一个名为“黑市”的地下组织，“黑市”类似于罪犯的网络拍卖市场。该组织联系紧密，主要用于交易被盗的信用卡号，身份盗用工具和身份伪造工具等物品。<br><br>
穆拉斯基是美国联邦调查局的一名探员，他秘密打入了这个地下组织。一段时间以后，穆拉斯基探员成为了该网站的管理员。尽管该组织有很多人对他心存怀疑，但他还是管理这个网站长达三年之久。<br><br>
在这段时间里，穆拉斯基必须伪装成恶意黑客，说话，行动与思考的方式必须一致。他伪装成一名恶意垃圾邮件发送者，这方面丰富的知识也是他成功渗透的基础。他的伪装和社会工程技巧之所以大获成功，是因为他使用了不起眼的斯普特林大师的身份进入了黑市网站，三年之后整个身份盗用团伙被摧毁了。<br><br>
三年的社会工程渗透行动让59名罪犯落网，阻止了7000多万美元的银行欺诈。这仅是社会工程技巧具有积极意义的一个范例。</p>

_HEREDOC
        ]);

        \App\Post::create([
            'title' => 'windows系统安装',
            'cover' => '/storage/upload/windows.jpg',
            'content' => <<<_HEREDOC
<p>作者：董威</p>
<br>
<p>
用u盘安装系统总共可分为三个步骤,分别为:<br>
1:通过PE工具箱制作启动u盘<br>
2:用制作好的启动u盘安装系统<br>
3:驱动的安装以及系统激活<br>
以下为具体步骤：<br>
通用PE工具箱——启动U盘制作<br>
一、下载<br>
下载地址:<a href="http://down.tongyongpe.com/tongyongpe6.1.exe
"><em>通用PE工具箱</em></a>
二、安装<br>
1.双击上步中下载好的通用PE工具箱的安装文件"TonPE_6.0"，运行安装程序。<br>
2.单击界面上的"安装"按钮，开始工具的安装，如图：<br>
3.安装完成后，在电脑桌面上就会显示"通用PE工具箱"快捷方式，并自动运行工具，如图：<br>
三、制作<br>
1.双击运行电脑桌面上"通用PE工具箱"的快捷方式，开始制作过程。<br>
2.选择要制作的U盘盘符，然后根据个人情况，分别对相关参数进行设置，如图：
<br> 
3.设置完成后，即可单击"一键制作U盘启动盘"按钮，开始启动U盘的制作，如图：<br> 
4. 成功制作完成后下载镜像<br>
1成功制作完成后，会弹出一个新窗口，用户可以根据窗口中的提示，进行相应的操作、查看，如图：
 <br>
2制作完成后，打开U盘，可以看到几个重要的文件夹显示在U盘根目录，如图：
 <br>
启动U盘的制作就OK了，接下来就是第二个步骤，下载windows系统的镜像，以及破解工具，之后用U盘启动安装系统。<br>
用启动u盘安装系统<br>
一．进入winpe系统<br>
将U盘插上电脑，在电脑BIOS里面把电脑设置成从U盘启动电脑，每台电脑的BIOS启动都不一样，这里用DELL的电脑举个例子，法①、开机按F12进入启动项选择，然后选择USB启动；法②、调整电脑启动顺序（默认是从硬盘启动），将usb启动调到第一位。
 <br>
开机时右下角有提示，按F12后选择USB Storage Device后自动进入PE。<br>或者
按F2出现这个画面，将USB Storage Device 调到最高，按F6或F7调上下。
之后切换到Exit下保存并退出。
不同牌子的电脑BIOS不同所以以上操作需一定英语水平，不懂可以查字典。嘿嘿。<br>
之后就可以进入U盘菜单选择界面，选择【01】，进入WINPE系统，如图：<br>
二．磁盘分区<br>
1.进入界面中的分区工具，选择快速分区,如图:<br>
2.打开后根据个人需要,将磁盘进行分区,选择分区数目和设置各分区大小,如图:<br>
(左侧选择数目,右侧输入各分区大小)<br>
3.完成后点击确定,然后格式化磁盘.如图:<br>
4,注意每次更改完后点保存更改，完成后退出分区工具。<br>
三.系统安装<br>
1.进入pe下的计算机,选择启动U盘,如图:<br> 
2.选择镜像文件(选择你要安装的系统的镜像文件).如图:<br>
.ISO文件即为镜像文件，注意，X86是32位win7系统，X64是 64位，2G及以下内存建议装32位。<br>
3.进入之后系统会自动加载到虚拟光驱，然后退出这个文件夹就行了。<br>
4.进入桌面的windows安装器,如图<br>
5.选择安装类型,点击浏览,选择计算机,然后选中镜像文件,如图:<br>
6,这里新出来的DVD驱动器就是刚才加载的虚拟光驱，打开后继续选择里面的sources文件，然后继续选择sources里面的install.wim文件，然后选择相应的系统类型。如图：<br>
7，点击下一步后，选择c盘为安装盘，然后继续点击"将系统安装到这个分区上"和"将此分区作为引导分区"，点击下一步，如图<br>
8.点击下一步<br>
9.勾选"系统盘盘符指定为"，后面选为c，如图<br>
10，点击下一步<br>
11,点击确定后开始安装，完成后将计算机进行重启即可。<br>
到此系统安装即完成了，重启时需要把U盘拿下来了。<br>
驱动的安装<br>
系统安装好后需要自己设置，而且还需要给电脑打驱动，进入系统后右键计算机----属性----设备管理器，没有未知设备的话说明你的驱动都打好了（有时候一两个未知设备也不会影响大局）此处驱动的安装可借助驱动精灵万能网卡版进行安装。（下载地址：<a href="http://file.mydrivers.com/DG8Setup_1240E.exe
"><em>驱动万能精灵网卡</em></a>）
系统激活<br>
安装好的系统只有30天试用期，正版win7激活码需要我们花上千元买，所以只好另辟蹊径------小马工具！傻瓜式操作激活正版系统！


</p>
_HEREDOC
        ]);
    }
}
