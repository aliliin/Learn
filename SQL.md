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