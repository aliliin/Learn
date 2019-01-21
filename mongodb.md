
##### 1.使用Homebrew软件包管理工具安装

` brew install mongodb `

##### 2.安装完成会提示如下部分信息 (正确结果)

```
==> Downloading https://homebrew.bintray.com/bottles/mongodb-4.0.3_1.mojave.bottle.tar.gz
######################################################################## 100.0%
==> Pouring mongodb-4.0.3_1.mojave.bottle.tar.gz
==> Caveats
To have launchd start mongodb now and restart at login:
  brew services start mongodb
Or, if you don't want/need a background service you can just run:
  mongod --config /usr/local/etc/mongod.conf
==> Summary
🍺  /usr/local/Cellar/mongodb/4.0.3_1: 18 files, 258.1MB
```

##### 3. 启动 ` mongodb `

输入启动命令 `  brew services start mongodb ` 
看到 `Successfully started `mongodb` (label: homebrew.mxcl.mongodb) ` 代表启动成功了。

#### 4. 进入 `mongo`
输入命令 `  mongo `  进入 看到如下 提示 代表成功进入

```
MongoDB shell version v4.0.3
connecting to: mongodb://127.0.0.1:27017
Implicit session: session { "id" : UUID("da0b6394-7db8-4098-9a97-6f90bf63dc8c") }
MongoDB server version: 4.0.3
Welcome to the MongoDB shell.
For interactive help, type "help".
For more comprehensive documentation, see
	http://docs.mongodb.org/
Questions? Try the support group
	http://groups.google.com/group/mongodb-user
Server has startup warnings:

```