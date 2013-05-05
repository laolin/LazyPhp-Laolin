LinApi - api目录说明
======
是api.laolin.com的代码


## 说明
运行此目录的APP需要：
* api/目录（本目录）
* ../index.php文件（上一级主目录下的index）
* ../.htaccess文件（上一级主目录下的）
* ../_lp/_lp目录（lp核心文件）
* ../static目录（静态文件）

并且只能用上一级目录的index.php来运行，否则页面引用static目录的js css将都是不对的文件。
或者把static挪到本目录的下面，这样就可以用本目录下的index.php来运行了。

