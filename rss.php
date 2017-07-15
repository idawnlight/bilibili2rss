<?php 
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        header("content-type:application/xml; charset=utf-8");
?>
<rss version="2.0"
xmlns:content="http://purl.org/rss/1.0/modules/content/"
xmlns:dc="http://purl.org/dc/elements/1.1/"
xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
xmlns:atom="http://www.w3.org/2005/Atom"
xmlns:wfw="http://wellformedweb.org/CommentAPI/">
<channel>
<title><?php echo $data["name"]; ?> - Bilibili</title>
<link>https://space.bilibili.com/<?php echo $data["id"]; ?>#!/index</link>
<atom:link href="https://api.lim-light.com/bilibili/rss/?id=<?php echo $data["id"]; ?>" rel="self" type="application/rss+xml" />
<language>zh-CN</language>
<description><?php echo $data["description"]; ?></description>
<?php
for ($x=0; $x<$count; $x++) {
        echo "<item>\n";
        echo "<title>".$videos[$x]->title."</title>\n";
        echo "<link>http://www.bilibili.com/video/av".$videos[$x]->aid."/</link>\n";
        echo "<guid>http://www.bilibili.com/video/av".$videos[$x]->aid."/</guid>\n";
        echo "<dc:creator>".$videos[$x]->author."</dc:creator>\n";
        echo "<description><![CDATA[".$videos[$x]->description."]]></description>\n";
        echo "<content:encoded xml:lang=\"zh-CN\"><![CDATA[".$videos[$x]->description."]]></content:encoded>\n";
        echo "<slash:comments>".$videos[$x]->comment."</slash:comments>\n";
        echo "<comments>http://www.bilibili.com/video/av".$videos[$x]->aid."/#bbComment</comments>\n";
        echo "</item>\n";
}
?>
</channel>
</rss>