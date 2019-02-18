1、优化MYSQL的方法
- 数据超过一定数量或者体积，请拆分表，垂直或者水平分（最有效果的优化）

- 务必有自增主键。通过自增主键来查数据是最快的。

- 常用的查询字段建立联合索引，写SQL一定要尊从最左原则，用到这个索引。

2、数据库中的事务是什么？
- 事务（transaction）是作为一个单元的一组有序的数据库操作。如果组中的所有操作都成功，则认为事务成功，即使只有一个操作失败，事务也不成功。如果所有操作完成，

- 事务则提交，其修改将作用于所有其他数据库进程。如果一个操作失败，则事务将回滚，该事务所有操作的影响都将取消。

3、mysql事务隔离是怎么实现的
- 通过各种行锁表锁，各种乐观锁悲观锁，排他锁实现的呀。

4、mysql中字段类型各占几个字节：smallint、int、bigint、datetime、varchar(8)
- smallint 2字节
- int 4字节
- bigint 8字节
- datetime 8字节
- varchar(8) 8*3字节

5.mysql中联合查询怎么给字段值为null 添加默认值

- ifnull(field,Default) as alias

6.编写一个 SQL 查询，来删除 Person 表中所有重复的电子邮箱，重复的邮箱里只保留 Id 最小 的那个。

| Id | Email            |
|----|------------------|
| 1  | john@example.com |
| 2  | bob@example.com  |
| 3  | john@example.com |

Id 是这个表的主键。
例如，在运行你的查询语句之后，上面的 Person 表应返回以下几行:

| Id | Email            |
|----|------------------|
| 1  | john@example.com |
| 2  | bob@example.com  |

` DELETE P1 FROM Person P1,Person p2, where P1.Email = P2.Email AND P1.Id > P2.id;`

7.某城市开了一家新的电影院，吸引了很多人过来看电影。该电影院特别注意用户体验，专门有个 LED显示板做电影推荐，上面公布着影评和相关电影描述。
作为该电影院的信息部主管，您需要编写一个 SQL查询，找出所有影片描述为非 boring (不无聊) 的并且 id 为奇数 的影片，结果请按等级 rating 排列。
例如，下表 cinema:

|   id    | movie     |  description |  rating   |
|---------|-----------|--------------|-----------|
|   1     | War       |   great 3D   |   8.9     |
|   2     | Science   |   fiction    |   8.5     |
|   3     | irish     |   boring     |   6.2     |
|   4     | Ice song  |   Fantacy    |   8.6     |
|   5     | House card|   Interesting|   9.1     |
对于上面的例子，则正确的输出是为：
|   id    | movie     |  description |  rating   |
|---------|-----------|--------------|-----------|
|   5     | House card|   Interesting|   9.1     |
|   1     | War       |   great 3D   |   8.9     |

` select id, movie,description,rating from cinema where description != 'boring' and id&1 order by rating desc; `
` select * from cinema where mod(id, 2) = 1 and description != 'boring' order by rating DESC; `

8.某网站包含两个表，Customers 表和 Orders 表。编写一个 SQL 查询，找出所有从不订购任何东西的客户。
Customers 表：
| Id | Name  |
|----|-------|
| 1  | Joe   |
| 2  | Henry |
| 3  | Sam   |
| 4  | Max   |
Orders 表：

| Id | CustomerId |
|----|------------|
| 1  | 3          |
| 2  | 1          |
例如给定上述表格，你的查询应返回：
| Customers |
|-----------|
| Henry     |
| Max       |

` select c.name as Customers from Customers as c where( select count(1) from Orders as o where c.id=o.CustomerId)=0 `
` select c.name as Customers from Customers as c left join Orders as o on o.CustomerId = c.id where o.CustomerId is null;