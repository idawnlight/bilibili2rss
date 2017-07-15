# bilibili2rss

利用 RSS 订阅 B 站 UP主

（我知道代码写的很辣鸡

- 请求参数 :
  -  id : 所要订阅的 B 站 UP 主的 id，必需

# 示例

 - 请求 https://api.lim-light.com/bilibili/rss/?id=15359580
 - 返回
```
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0"
xmlns:content="http://purl.org/rss/1.0/modules/content/"
xmlns:dc="http://purl.org/dc/elements/1.1/"
xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
xmlns:atom="http://www.w3.org/2005/Atom"
xmlns:wfw="http://wellformedweb.org/CommentAPI/">
<channel>
<title>黎明余光 - Bilibili</title>
<link>https://space.bilibili.com/15359580#!/index</link>
<atom:link href="https://api.lim-light.com/bilibili/rss/?id=15359580" rel="self" type="application/rss+xml" />
<language>zh-CN</language>
<description>Blog : https://blog.lim-light.com</description>
<item>
<title>在虚拟机中体验 WannaCry</title>
<link>http://www.bilibili.com/video/av10540961/</link>
<guid>http://www.bilibili.com/video/av10540961/</guid>
<dc:creator>黎明余光</dc:creator>
<description><![CDATA[WannaCry 感觉还是蛮厉害的，另外 Windows 10 只是不会被感染，并非不能运行喔
用直播姬录制，感觉画质不是很好啊]]></description>
<content:encoded xml:lang="zh-CN"><![CDATA[WannaCry 感觉还是蛮厉害的，另外 Windows 10 只是不会被感染，并非不能运行喔
用直播姬录制，感觉画质不是很好啊]]></content:encoded>
<slash:comments>20</slash:comments>
<comments>http://www.bilibili.com/video/av10540961/#bbComment</comments>
</item>
</channel>
</rss>
```