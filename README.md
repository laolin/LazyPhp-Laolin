LinApi
======

Laolin 的 PHP网站框架。
基于easychen/LazyPHP

#主目录的组成结构

## _lp目录
是从LazyPHP fork来的，其中仅_lp/_lp目录是LazyPHP的核心，是所有APP需要的，其他文件和目录是原LazyPHP的一些示例页面，别的APP运行是不需要这些文件的。（因为它自带了static子目录，故不需要主目录下的static目录）

## api目录
是api.laolin.com的代码 （需要_lp/_lp目录和 static目录）

## linjianping目录
是linjianping.com的代码 （需要_lp/_lp目录和 static目录）


## py目录
是《查拼音》的代码 （需要_lp/_lp目录，因为它自带了static子目录，故不需要主目录下的static目录）


## static目录
静态文件目录(CSS/JS/IMG)，通常情况下是各子目录的APP所共用的。
