LinApi - app-tpl目录说明
======
是个空的app的代码文件/目录模板


## 说明
运行此目录的APP需要：
* （本目录）
* ../index.php文件（上一级主目录下的index）
* ../_lp/_lp目录（lp核心文件）
* ../static目录（静态文件）

并且只能用上一级目录的index.php来运行，否则页面引用static目录的js css将都是不对的文件。
或者把static挪到本目录的下面，这样就可以用本目录下的index.php来运行了。
